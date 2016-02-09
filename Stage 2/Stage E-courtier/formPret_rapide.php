<?php
//////////////////////////////////////////////////// récupérations des champs formulaires
include('../model/class.phpmailer.php');
// print_r($_POST);
// exit;

$id_partenaire = $_GET['pro'];

foreach( $_POST as $key => &$post ) {
    if( !$post ){
        $post = "";
    }

}
// pour les membre (cookie)
if (isset( $_POST['emailControle'])) {
    $email_controle = $_POST['emailControle'];
}
else{
    $email_controle="";
}
// Pour les non loggués (input)
if (isset( $_POST['email'])) {
    $email = $_POST['email'];
}
else{
    $email="";
}


//champ supllémentaire non loggué

if(isset($_POST['tel']) ){
$tel=$_POST['tel'];
} 
else{
$tel='';
}

if(isset($_POST['adresse']) ){
$adresse=$_POST['adresse'];
} 
else{
$adresse='';
}
if(isset($_POST['codePostal']) ){
$codePostal=$_POST['codePostal'];
} 
else{
$codePostal='';
}
if(isset($_POST['ville']) ){
$ville=$_POST['ville'];
} 
else{
$ville='';
}
if(isset($_POST['achat']) ){
$achat=$_POST['achat'];
} 
else{
$achat='';
}
if(isset($_POST['usage']) ){
$usage=$_POST['usage'];
} 
else{
$usage='';
}

$compromis = $_POST['compromis'];
$recherche = $_POST['recherche'];
$notaire = $_POST['notaire'];
if(isset($_POST['m_mme_mlle']) ){
$m_mme_mlle=$_POST['m_mme_mlle'];
} 
else{
$m_mme_mlle='';
}

$investissement = $_POST['investissement'];
$fraisAgence = $_POST['fraisAgence'];
$montantTravaux = $_POST['montantTravaux'];
$apport = $_POST['apport'];
if (isset  ($_POST['valeurBienActu']) ){
$valeurBienActu = $_POST['valeurBienActu'];
}
else{
    $valeurBienActu='';
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$dateNaissance = $_POST['dateNaissance'];
$situation = $_POST['situation'];
$enfants = $_POST['enfants'];

$conjointmrmme = $_POST['conjointmrmme'];
$nomJeuneFille = $_POST['nomJeuneFille'];
$nomConjoint = $_POST['nomConjoint'];
$prenomConjoint = $_POST['prenomConjoint'];
$dateNaissanceConjoint = $_POST['dateNaissanceConjoint'];

$contrat = $_POST['contrat'];
$revenus = $_POST['revenus'];
$anciennete = $_POST['anciennete'];
$revenusImposable = $_POST['revenusImposable'];

$contratConjoint = $_POST['contratConjoint'];
$revenusConjoint = $_POST['revenusConjoint'];
$ancienneteConjoint = $_POST['ancienneteConjoint'];

if(isset($_POST['revenusImpConjoint']) ){
$revenusImpConjoint=$_POST['revenusImpConjoint'];
} 
else{
$revenusImpConjoint='';
}

$banque = $_POST['banque'];
$banque2 = $_POST['banque2'];
$charges = $_POST['charges'];
$mensualite = $_POST['mensualite'];
$dureeRest = $_POST['dureeRest'];
$capitalRestDu = $_POST['capitalRestDu'];

if (isset( $_POST['autresCharges1'])) {
    $autresCharges1 = $_POST['autresCharges1'];
}
else{
    $autresCharges1="";
}
if (isset( $_POST['autresCharges2'])) {
    $autresCharges2 = $_POST['autresCharges2'];
}else{
    $autresCharges2="";
}
if (isset( $_POST['autresCharges3'])) {
    $autresCharges3 = $_POST['autresCharges3'];
}
else{
    $autresCharges3="";
}
if (isset( $_POST['autresCharges4'])) {
    $autresCharges4 = $_POST['autresCharges4'];
}
else{
    $autresCharges4="";
}
if (isset( $_POST['autresCharges5'])) {
    $autresCharges5 = $_POST['autresCharges5'];
}
else{
    $autresCharges5="";
}
$autresCharges = $autresCharges1 . ' ' . $autresCharges2 . ' ' . $autresCharges3 . ' ' . $autresCharges4 . ' ' . $autresCharges5;


if (isset($_POST['autresRevenus1'])) {
    $autresRevenus1 = $_POST['autresRevenus1'];
}
else{
    $autresRevenus1= " ";
}
if (isset($_POST['autresRevenus2'])) {
    $autresRevenus2 = $_POST['autresRevenus2'];
}
else{
    $autresRevenus2= " ";
}
if (isset($_POST['autresRevenus3'])) {
    $autresRevenus3 = $_POST['autresRevenus3'];
}
else{
    $autresRevenus3= " ";
}
if (isset($_POST['autresRevenus4'])) {
    $autresRevenus4 = $_POST['autresRevenus4'];
}
else{
    $autresRevenus4= " ";
}
if (isset($_POST['autresRevenus5'])) {
    $autresRevenus5 = $_POST['autresRevenus5'];
}
else{
    $autresRevenus5= " ";
}


$autresRevenus = $autresRevenus1 . ' ' . $autresRevenus2 . ' ' . $autresRevenus3 . ' ' . $autresRevenus4 . ' ' . $autresRevenus5;





//////////////////////////////////////////////////////////////////////connexion   
try {
    $bdd = new PDO('', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


///////////////////////////////////////récupération id_client par email controle
try {
    $req = $bdd->prepare(' SELECT id, id_partenaire FROM clients WHERE email=:email');
    $req->bindParam(':email', $email_controle);
    $req->execute();
    $reslt = $req->fetch();
    $id_client = $reslt[0];
    // echo $id_client;
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

$timekape = time();
if ( $compromis ==='rachat pret consommation'){
$categorie= 'pret_conso';
}
else{
$categorie = 'pret';
    
}
$statut = 'prise_de_contact';
$provenance = 'site';


/////////////////////////////////////////////////////// Si email_controle update
if ($email_controle !=="") {
    try {
        $sql = "UPDATE `clients_profil_bkpe` SET    
        `timekape_last_modif` = :timekape_last_modif,
		`id_partenaire` = :id_partenaire,
        `date_naissance_mr` = :date_naissance_mr,
        `sit_patrimoniale` = :sit_patrimoniale,
        `nbre_enfants` = :nbre_enfants, 
        `type_revenu_mr` = :type_revenu_mr, 
        `montant_revenu_mr` = :montant_revenu_mr, 
        `ancien1` = :ancien1, 
        `impot1` = :impot1, 
		`impot2` = :impot2, 
        `banque1` = :banque1, 
        `banque2` = :banque2,       
        `titre2` = :titre2, 
        `nom2` = :nom2, 
        `prenom2` = :prenom2, 
        `nomJeuneFille` = :nomJeuneFille, 
        `date_naissance_mme` = :date_naissance_mme, 
        `type_revenu_mme` = :type_revenu_mme, 
        `montant_revenu_mme` = :montant_revenu_mme, 
        `montant_revenu_mme` = :montant_revenu_mme, 
		`chargesIntitule` = :charges,
		`chargesMontant` = :mensualite,
		`ChargesFin` = :dureeRest,
		`ChargesCrd` = :capitalRestDu,
        `autresCharges1` = :autresCharges1,
		`autresCharges2` = :autresCharges2,
		`autresCharges3` = :autresCharges3, 
		`autresCharges4` = :autresCharges4, 
		`autresCharges5` = :autresCharges5, 
        `estimationBienActuel` = :estimationBienActuel, 
        `autresRevenus1` = :autresRevenus1,
		`autresRevenus2` = :autresRevenus2,
		`autresRevenus3` = :autresRevenus3,
		`autresRevenus4` = :autresRevenus4,
		`autresRevenus5` = :autresRevenus5
        WHERE `id_client` = :id_client ";


        $statement = $bdd->prepare($sql);
        $statement->bindValue(":timekape_last_modif", $timekape);
		$statement->bindValue(":id_partenaire", $id_partenaire);
        $statement->bindValue(":date_naissance_mr", $dateNaissance);
        $statement->bindValue(":sit_patrimoniale", $situation);
        $statement->bindValue(":nbre_enfants", $enfants);
        $statement->bindValue(":type_revenu_mr", $contrat);
        $statement->bindValue(":montant_revenu_mr", $revenus);
        $statement->bindValue(":ancien1", $anciennete);
        $statement->bindValue(":impot1", $revenusImposable);
		$statement->bindValue(":impot2", $revenusImpConjoint);
        $statement->bindValue(":banque1", $banque);
        $statement->bindValue(":banque2", $banque2);
        $statement->bindValue(":titre2", $conjointmrmme);
        $statement->bindValue(":nom2", $nomConjoint);
        $statement->bindValue(":prenom2", $prenomConjoint);
        $statement->bindValue(":nomJeuneFille", $nomJeuneFille);
        $statement->bindValue(":date_naissance_mme", $dateNaissanceConjoint);
        $statement->bindValue(":type_revenu_mme", $contratConjoint);
        $statement->bindValue(":montant_revenu_mme", $revenusConjoint);
        $statement->bindValue(":ancien2", $ancienneteConjoint);
		$statement->bindValue(':charges', $charges);
        $statement->bindValue(':mensualite', $mensualite);	
        $statement->bindValue(':dureeRest', $dureeRest);
        $statement->bindValue(':capitalRestDu', $capitalRestDu);			
        $statement->bindValue(':autresCharges1', $autresCharges1);
		$statement->bindValue(':autresCharges2', $autresCharges2);
		$statement->bindValue(':autresCharges3', $autresCharges3);
		$statement->bindValue(':autresCharges4', $autresCharges4);
		$statement->bindValue(':autresCharges5', $autresCharges5);
		$statement->bindValue(':autresRevenus1', $autresRevenus1);
		$statement->bindValue(':autresRevenus2', $autresRevenus2);
		$statement->bindValue(':autresRevenus3', $autresRevenus3);
		$statement->bindValue(':autresRevenus4', $autresRevenus4);
		$statement->bindValue(':autresRevenus5', $autresRevenus5);
        $statement->bindValue(":estimationBienActuel", $valeurBienActu);
        $statement->bindValue(":id_client", $id_client);
//        print_r($statement);
//        exit;
        $statement->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


///////////////////////////////////////////////php mailer
try {
    $req2 = $bdd->prepare(' SELECT e_mail FROM partenaires WHERE id=:id_partenaire');
    $req2->bindParam(':id_partenaire', $id_partenaire);
    $req2->execute();
    $reslt2 = $req2->fetch();
    $emailPartenaire = $reslt2[0];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}


$mail = new PHPMailer();
$mail->From = "contact@e-courtier.fr";
$mail->FromName = "Ecourtier";
$mail->Subject = "Nouvelle demande de pret";

$texteMail='';

foreach ($_POST as $key => $value) {
    $texteMail= $texteMail.' '.$key.' : '.$value."\r\n";

}

$mail->Body = $texteMail;
$mail->AddAddress($emailPartenaire, "wuut");
$mail->AddAddress( 'contact@e-courtier.fr', "wuut");
$mail->send();


////////////////////////////////////////////////////////////// controle non logé     
} else {
    $mdp =$timekape;
    try{
      $save = $bdd->prepare("INSERT INTO clients "
        . "(timekape, timekape_last_modif, m_mme_mlle, nom, prenom, email, portable, adresse,code_postal,ville,mdp,id_partenaire )"
        . " VALUES(:timekape, :timekape_last_modif, :m_mme_mlle, :nom,:prenom,:email,:portable,:adresse,:code_postal,:ville,:mdp,:id_partenaire)");
      $save->bindParam(':timekape', $timekape);
      $save->bindParam(':timekape_last_modif', $timekape);
      $save->bindValue(':m_mme_mlle', $m_mme_mlle);
      $save->bindParam(':nom', $nom);
      $save->bindParam(':prenom', $prenom);
      $save->bindParam(':email', $email);
      $save->bindParam(':portable', $tel);
      $save->bindParam(':adresse', $adresse);
      $save->bindParam(':code_postal', $codePostal);
      $save->bindParam(':ville', $ville);
      $save->bindParam(':mdp', $mdp);
	  $save->bindParam(':id_partenaire', $id_partenaire);

      $save->execute();
  } catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}  


try {
    $req2 = $bdd->prepare(' SELECT id FROM clients WHERE email=:email');
    $req2->bindParam(':email', $email);
    $req2->execute();
    $reslt2 = $req2->fetch();
    $id_clientNonlog = $reslt2[0];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}


		

try {
    $save = $bdd->prepare("INSERT INTO clients_profil_bkpe "
        . "(timekape,timekape_last_modif, id_partenaire, date_naissance_mr, sit_patrimoniale, nbre_enfants, type_revenu_mr, montant_revenu_mr, ancien1,impot1,impot2,banque1,banque2,titre2,nom2,prenom2,nomJeuneFille,date_naissance_mme,type_revenu_mme,montant_revenu_mme,ancien2,chargesIntitule,chargesMontant,autresCharges1,autresCharges2,autresCharges3,autresCharges4,autresCharges5,autresRevenus1,autresRevenus2,autresRevenus3,autresRevenus4,autresRevenus5,id_client,estimationBienActuel,ChargesCrd,ChargesFin )"
        . " VALUES(:timekape,:timekape_last_modif,:id_partenaire,:date_naissance_mr,:sit_patrimoniale,:nbre_enfants,:type_revenu_mr,:montant_revenu_mr,:ancien1,:impot1,:impot2,:banque1,:banque2,:titre2,:nom2,:prenom2,:nomJeuneFille,:date_naissance_mme,:type_revenu_mme,:montant_revenu_mme,:ancien2,:charges,:mensualite,:autresCharges1,:autresCharges2,:autresCharges3,:autresCharges4,:autresCharges5,:autresRevenus1,:autresRevenus2,:autresRevenus3,:autresRevenus4,:autresRevenus5,:id_client,:estimationBienActuel,:capitalRestDu,:dureeRest)");
   
    $save->bindParam(':id_client', $id_clientNonlog);
    $save->bindParam(':timekape', $timekape);
    $save->bindParam(':timekape_last_modif', $timekape);
	$save->bindParam(':id_partenaire', $id_partenaire);
    $save->bindParam(':date_naissance_mr', $dateNaissance);
    $save->bindParam(':sit_patrimoniale', $situation);
    $save->bindParam(':nbre_enfants', $enfants);
    $save->bindParam(':type_revenu_mr', $contrat);
    $save->bindParam(':montant_revenu_mr', $revenus);
    $save->bindParam(':ancien1', $anciennete);
    $save->bindParam(':impot1', $revenusImposable);
	$save->bindParam(":impot2", $revenusImpConjoint);
    $save->bindParam(':banque1', $banque);
    $save->bindParam(':banque2', $banque2);
//Conjoint
    $save->bindParam(':titre2', $conjointmrmme);
    $save->bindParam(':nom2', $nomConjoint);
    $save->bindParam(':prenom2', $prenomConjoint);
    $save->bindParam(':nomJeuneFille', $nomJeuneFille);
    $save->bindParam(':date_naissance_mme', $dateNaissanceConjoint);
    $save->bindParam(':type_revenu_mme', $contratConjoint);
    $save->bindParam(':montant_revenu_mme', $revenusConjoint);
    $save->bindParam(':ancien2', $ancienneteConjoint);
	$save->bindParam(':charges', $charges);
    $save->bindParam(':mensualite', $mensualite);	
    $save->bindParam(':dureeRest', $dureeRest);
    $save->bindParam(':capitalRestDu', $capitalRestDu);
    $save->bindParam(':autresCharges1', $autresCharges1);
	$save->bindParam(':autresCharges2', $autresCharges2);
	$save->bindParam(':autresCharges3', $autresCharges3);
	$save->bindParam(':autresCharges4', $autresCharges4);
	$save->bindParam(':autresCharges5', $autresCharges5);
    $save->bindParam(':autresRevenus1', $autresRevenus1);
	$save->bindParam(':autresRevenus2', $autresRevenus2);
	$save->bindParam(':autresRevenus3', $autresRevenus3);
	$save->bindParam(':autresRevenus4', $autresRevenus4);
	$save->bindParam(':autresRevenus5', $autresRevenus5);
    $save->bindParam(':estimationBienActuel', $valeurBienActu);
    $save->execute();
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}





///////////////////////////////////////////////php mailer pour le mdp client


$mail = new PHPMailer();
$lien = "http://e-courtier.fr";
$mail->From = "contact@e-courtier.fr";
$mail->FromName = "Ecourtier";
$logo = "http://ssl14.ovh.net/~ecourtie/bkpe/admin_partenaire/logo.jpg";
// Définition du sujet/objet
$mail->Subject = "Votre demande de pret";

$mail->Body = "
<a href=".$lien."><img src=".$logo." ></a>


Bienvenue   
".$m_mme_mlle." ".$nom."  ".$prenom.",

Tout d’abord, je vous remercie de votre demande. 

Vous serez mis en relation avec des banques se situant dans un rayon de 15 kilomètres autour de votre domicile.

Afin de respecter la réglementation en vigueur, nous vous envoyons dans votre espace membre une fiche d'information préalable.

Votre espace membre est accessible en vous identifiant à la page http://e-courtier.fr/espace-membres.html.

Votre identifiant est votre adresse email et voici votre mot de passe pour vous connecter : ".$mdp."

Avec e-courtier.fr, c’est pour vous la certitude de travailler avec un expert en financement, tenu au secret
professionnel, référencé par de nombreuses banques.

Votre interlocuteur privilégié va très prochainement se mettre en contact avec vous.
Je reste à votre disposition

Cordialement,
E-Courtier.fr 

En cas de difficultés avec votre interlocuteur ou pour un complément d’informations, vous pouvez contacter
le serviceclients@e-courtier.fr ou par téléphone au 09.50.45.28.98

RCS 539330480 - Numero Orias : 12065429 - Membre de l Anacofi IOBSP

";




$mail->AddAddress( $email, "wuut");
$mail->send();


///////////////////////////////////////////// php amiler pour Admin

$mail = new PHPMailer();
$mail->From = "contact@e-courtier.fr";
$mail->FromName = "Ecourtier";
// Définition du sujet/objet
$mail->Subject = "Nouvelle demande de pret";

$texteMail='';

foreach ($_POST as $key => $value) {
    $texteMail= $texteMail.' '.$key.' : '.$value."\r\n";
}

$mail->Body = $texteMail;

$mail->AddAddress($emailPartenaire, "wuut");
$mail->AddAddress( 'contact@e-courtier.fr', "wuut");
$mail->send();


}



try {
    $save2 = $bdd->prepare("INSERT INTO dossiers_bkpe  (id_client, timekape,timekape_last_modif,id_partenaire, categorie, statut, delai, achat, invest, travaux, apport,fin_pret,notaire,agence,provenance )"
        . " VALUES(:id_client, :timekape, :timekape_last_modif,:id_partenaire, :categorie,:statut,:delai,:achat,:invest,:travaux,:apport,:fin_pret,:notaire,:agence,:provenance)");
    if ( $email_controle !==""){
    $save2->bindParam(':id_client', $id_client);

    }
    else
    {
    $save2->bindParam(':id_client', $id_clientNonlog);
        
    }
    $save2->bindParam(':timekape', $timekape);
    $save2->bindParam(':timekape_last_modif', $timekape);
	$save2->bindParam(':id_partenaire', $id_partenaire);
    $save2->bindParam(':categorie', $categorie);
    $save2->bindParam(':statut', $statut);
	$save2->bindParam(':delai', $compromis);
    $save2->bindParam(':achat', $achat);
    $save2->bindParam(':invest', $investissement);
    $save2->bindParam(':travaux', $montantTravaux);
    $save2->bindParam(':apport', $apport);
    $save2->bindParam(':fin_pret', $dureeRest);
    $save2->bindParam(':notaire', $notaire);
    $save2->bindParam(':agence', $fraisAgence);
    $save2->bindParam(':provenance', $provenance); 
    


    $save2->execute();
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}


 

$_POST['Operation_creer'] = null ;

$erreur_1 = "" ;

include('mysql.php');

include('simple_pdf_lip_signature.php'); 

$timekape_new = time() ;
$origine = "Lettre Infos Prealable" ;
$fichier_1 = $tititime."-".$numero_visite_calcule.$titime.".pdf"  ;

$query_11="INSERT INTO fichiers_dossiers_bkpe
(id,timekape,timekape_last_modif,timekape_dossier,id_client,origine,message)
VALUES ('NULL','".$timekape_new."','".$timekape_new."','".$timekape."','".$id_client."','".$origine."','".$fichier_1."')" ;
  
 mysql_query($query_11) or die('Error 2 : '.mysql_error());
 
 include('send_mail_lip.php');


if( $email_controle !==""){

	echo "<script type='text/javascript'>document.location.replace('https://ssl14.ovh.net/~ecourtie/bkpe/membre/dossiers.php?success=1');</script>";
    
}
else{

    echo '<script type="text/javascript"> window.top.location.href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php?success=1" </script>' ;
}
?>