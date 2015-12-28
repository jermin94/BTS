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
session_start();
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
			<a href="mailto:commercial@lafaune.com">contact</a> 
	</div>
</br>
<form action="panier.php" target="framed" method="get">
<input type="submit" name="supprimer" value="Vider le panier" />
</form>

<form action="commande.php" target="framed" method="get">
<p><input type="submit" value="Commander" />
</form>
</body>
</html>