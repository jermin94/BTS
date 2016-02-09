<?php


$idDossier =$_POST["idDossier"];

try {
    $bdd = new PDO('',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : '. $e->getMessage('erreur'));
}


        $req = $bdd->prepare("UPDATE dossiers_bkpe SET statut='Devis accepte'  WHERE timekape=$idDossier");
        $req->execute();
        
        
       $req2 = $bdd->query("SELECT id_client ,id_partenaire FROM dossiers_bkpe   WHERE timekape='$idDossier'");
        $rslt = $req2->fetch();
        $idClient= $rslt[0];
        $idPartenaire= $rslt[1];

        
        $req1 = $bdd->query("SELECT nom, prenom, portable, email FROM clients  WHERE id='$idClient'");
        $mail = $req1->fetch();  
		$nomClient=$mail[0];
		$prenomClient=$mail[1];
		$telClient=$mail[2];
        $mailClient=$mail[3];
		
		
		$req3 = $bdd->query("SELECT nom ,prenom ,adresse, ville, tel1, tel2, e_mail FROM partenaires  WHERE id='$idPartenaire'");
        $resultat = $req3->fetch(); 
		$nom = $resultat[0];
		$prenom = $resultat[1];
		$adresse = $resultat[2];
		$ville = $resultat[3];
		$tel1 = $resultat[4];
		$tel2 = $resultat[5];
		$mailPartenaire = $resultat[6];
		
    

$to = $mailClient;
$lien = "http://e-courtier.fr";
$logo = "http://ssl14.ovh.net/~ecourtie/bkpe/admin_partenaire/logo.jpg";
$subject = "Acceptation de votre devis";
$subject2 = "Acceptation devis";
$txt = "
Nous vous remercions de votre souscription. Votre Conseiller, ".$nom."  ".$prenom." ".$tel2." va se mettre en rapport avec vous dans les plus brefs délais. En cas de difficultés, veuillez contacter le siège E-Courtier.fr au 09.50.45.28.98 appel non surtaxé ou via un email à l’adresse serviceclients@e-courtier.fr,
";

$txt2 = "le client ".$nomClient."  ".$prenomClient." a accepté le devis concernant le dossier ".$idDossier."
Voici son numéro de telephone ".$telClient." et son email ".$mailClient."
";



// a random hash will be necessary to send mixed content
$separator = md5(time());
$from = "contact@e-courtier.fr" ; 
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;


// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;

// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;

// attachment
$headers .= "--".$separator.$eol;
$headers .= "--".$separator."--";

mail($to,$subject,$txt,$headers);
mail($mailPartenaire,$subject2,$txt2,$headers);

        
        
        