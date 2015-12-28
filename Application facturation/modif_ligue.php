<?php

try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=facturation;charset=utf8', 'root', '');
} catch(Exception $e) {
// En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}

/* on verifie si on a bien le code du client */
if( isset($_POST['compt_cli'])  && !empty($_POST['compt_cli'])) {

     /* On récupère le numcompte de la table ligue et on affect le resultat dans la variable $reponse*/
$reponse = $bdd->query("SELECT numCompte FROM ligue ");

/* On affiche chaque entrée une à une, la boucle se repete tant qu'on a pas fini de parcourir le tableau $reponse*/
while ($donnees = $reponse->fetch()){
$tableau[] = $donnees['numCompte'];   /* on stock chaque resultat dans une variable tableau */
}

 /* on verifie si le code  client  saisi est bien referencé dans notre base de donnée si ce n'est pas le cas ion affecte 0 à $trouver*/
$trouver=0;
for ($i=0; $i <count($tableau) && $trouver!==1  ; $i++) { 

  if ($tableau[$i] == $_POST['compt_cli'])
            $trouver=1;
      else  $trouver=0;
}

      /* ici on va enregistrer les informations du client s'il existe et s'il a rempli tous les champs */
 if( !$trouver)
      $html = "<h3 style='color:red'>ERREUR : Enregistrement impossible le Code Client est erronné </h3>";
 

 else if (($_POST['nom_tresorier']!=='') && ($_POST['rue']!=='') && ($_POST['cp']!=='') && ($_POST['ville']!=='')&&($_POST['nom_ligue'] !== '') ) {
            $val=$_POST['nom_ligue']; $val1=$_POST['nom_tresorier'];$val2=$_POST['rue'];$val3=$_POST['cp'];$val4= $_POST['ville']; $val5=$_POST['compt_cli'];  

               /* On ajoute les information du client  dans la table ligue*/
               $bdd->exec("UPDATE ligue  SET nomlig='$val' ,nomtres = '$val1',rue ='$val2' ,cp ='$val3' ,ville = '$val4' WHERE numCompte =$val5 ");

                $reponse->closeCursor(); // Termine le traitement de la requête

       $html = "<h3 style='color:green'>BRAVO : Enregistrement Effectué </h3>"; 


 }else $html = "<h3 style='color:red'>ERREUR : Enregistrement impossible car il manque un ou plusieurs champs non renseignés </h3>";

 echo $html;

}else echo "<h3 style='color:red'>ERREUR : Enregistrement impossible le code client n'est pas renseigné </h3>";

?>


