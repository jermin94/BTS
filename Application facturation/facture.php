
	<?php
// 1 toujours mettre le PHP avant le HTML surtout pour les fonctions et la connexion à la BDD
try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=facturation;charset=utf8', 'root', '');
} catch(Exception $e) {
// En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT codePresta FROM prestation');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch()){
$tableau[] = $donnees['codePresta'];   
}

$reponse->closeCursor(); // Termine le traitement de la requête


function liste_deroulant($tableau) {

	foreach ($tableau  as $element) {
		# code...
	
  echo "<option value=".$element.">".$element."</option>";
}

}

?>
        <?php include("CROSL.php"); ?> <!-- ce bout de code me permet d'afficher ma page d'acceuil -->


<!DOCTYPE html>
<html>
    <head>

        <!-- En-tête de la page -->
        <meta charset="utf-8" />
		<link rel="stylesheet" href="styles.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <title>Nouvelle Facture</title>

<body> 
      
      <div id="ContactForm">
  
  
          <label for="compte_ligue" > Compte Ligue</label>
          <input type="text" id="compte_ligue" name ="compte_ligue"/> <br/><br/>

      <form method="post" action="dli.php">

      <fieldset style="width:390px;">
      <legend>Prestation</legend>

     
      <label for="code_presta">Code prestation</label>
      <select name="code_presta" id="code_presta">

      <?php liste_deroulant($tableau); ?>   
               
      </select><br/><br/>

      <label for="qte"> quantité</label>
      <input type="number" name="qte" id="qte" />
      <input autocomplete="off" type="button" onclick="ajouterLigne();" value="Ajouter" />
      

      <table id="tableau" name="tableau" >
      <thead>
      <tr>
      <th>code prestation</th>
      <th>quantité</th>
      <th>Supprimer</th>
      </tr>
      </thead>

      <tbody>

      </tbody>

      </table>

      </fieldset><br/><br/>

      <input type="button" value="envoyer" id="enregistre"/>
 
      </form>
</div>

<!-- 2. Mettre toujours les script avant la fermeture du body -->
<!-- Inclure la librairie Jquery -->
    <script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
    <!-- Plugin pour la conversion JSON -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.5.1/jquery.json.min.js" type="text/javascript"></script>  
<script>

function supprimerLigne(num){
document.getElementById("tableau").deleteRow(num);
}

function ajouterLigne(){
var codePresta = $("#code_presta").val();
var qte = $("#qte").val();
var tableau = $("#tableau tbody");
var ligne = "<tr>";
ligne += "<td>"+codePresta+"</td>";
ligne += "<td>"+qte+"</td>";
ligne += '<td><input type="button" value="supprimer" onclick="supprimerLigne(this.parentNode.parentNode.rowIndex);"/></td>';
ligne += "</tr>";
tableau.append(ligne);
}

$("#enregistre").click(function(e) {
var form = new Object();
var tabLigne = new Array();
form.compteLigue = $("#compte_ligue").val();

$.each( $("#tableau tbody tr"), function( ) {
var ligne = new Object();
ligne.codePresta = $(this).children().eq(0).text();
ligne.qte = $(this).children().eq(1).text();
tabLigne.push(ligne);
});
form.lignes = tabLigne;
 /*Pour debogage

console.log(form);*/

var json = $.toJSON(form);
$.post("dli.php",{data:json}).always(function(html){
            // code si retour du post en html
$('body').append(html);
        });
});

</script>

  </body>
</html>﻿

