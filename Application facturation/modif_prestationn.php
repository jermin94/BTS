<?php

try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=facturation;charset=utf8', 'root', '');
} catch(Exception $e) {
// En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}

/* on verifie si on a bien le code prestation */
if( isset($_POST['id_presta'])  && !empty($_POST['id_presta'])) {

     /* On récupère le numcompte de la table ligue et on affect le resultat dans la variable $reponse*/
$reponse = $bdd->query("SELECT codePresta FROM prestation ");

/* On affiche chaque entrée une à une, la boucle se repete tant qu'on a pas fini de parcourir le tableau $reponse*/
while ($donnees = $reponse->fetch()){
$tableau[] = $donnees['codePresta'];   /* on stock chaque resultat dans une variable tableau */

}
 /* on verifie si le code  prestation  saisi est bien referencé dans notre base de donnée si c'est p le cas ion affecte 1 à $trouver*/
$trouver=0;
for ($i=0; $i <count($tableau) && $trouver!==1  ; $i++) { 

  if ($tableau[$i] == $_POST['id_presta'])
            $trouver=1;
      else  $trouver=0;
}

      /* ici on va enregistrer les informations des prestation s'il n'existe pas  et s'il a rempli tous les champs */
 if(!$trouver)
      $html = "<h3 style='color:red'>ERREUR : Enregistrement impossible le Code Prestation est  erronné </h3>";
  else if(in_array($_POST['cod_presta'], $tableau))
         $html = "<h3 style='color:red'>ERREUR : Enregistrement impossible le Code Prestation existe déja </h3>";

 else if (($_POST['nom_prest']!=='') && ($_POST['cod_presta']!=='') && ($_POST['pu']!=='')  ) {

            $val=$_POST['nom_prest']; $val1=$_POST['cod_presta'];$val2=$_POST['pu']; $val3= $_POST['id_presta'];

               /* On ajoute les information des nouvelles prestation  dans la table prestation*/
               $bdd->exec("UPDATE prestation  SET nomPresta='$val',codePresta = '$val1',puPresta =$val2  WHERE codePresta = '$val3'  ");

                $reponse->closeCursor(); // Termine le traitement de la requête

       $html = "<h3 style='color:green'>BRAVO : Enregistrement Effectué </h3>"; 


 }else $html = "<h3 style='color:red'>ERREUR : Enregistrement impossible car il manque un ou plusieurs champs non renseignés </h3>";

 echo $html;

}else echo "<h3 style='color:red'>ERREUR : Enregistrement impossible le code Prestation n'est pas renseigné </h3>";


?>


