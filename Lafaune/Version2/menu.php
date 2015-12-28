<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
        <title> Lafaune </title>
    </head>

<body style="background-color:#E6F8E0;">
	<div id="menu">
		<a href="accueil.html" target="framed">Accueil</a><br>
			<h3> Nos produits </h3>
<?php
include("connexion.php");

$reponse = $bdd->query('SELECT * FROM categorie');


// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>	
				<a href="listPdt.php?categ=<?php echo $donnees['cat_libelle']; ?>" target="framed"><?php echo $donnees['cat_libelle']; ?></a><br>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
	</div>
</body>
</html>