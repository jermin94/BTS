<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
    </head>
        <?php
include("connexion.php");

$categ = $_GET['categ'];

$reponse = $bdd->query('SELECT * FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle="'.$categ.'"');

echo "<h1>$categ</h1>";

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>	
<table>
                <tr>
                    <td> 
                        <img src="../Images/<?php echo $donnees['pdt_image']; ?>" class="<?php echo $donnees['pdt_dimension']; ?>" /> <!-- On insère une image -->
                     </td>
                    <td> <p><?php echo $donnees['pdt_ref']; ?></p> </td>
                    <td> <p> <?php echo $donnees['pdt_designation']; ?> </p> </td>
                    <td> <p> <?php echo $donnees['pdt_prix']; ?> <p> </td>
                </tr>

</table>                
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
</br></br>
<?php
include("connexion.php");
?>
<form action="panier.php" target="framed" method="get">

<select name="pdt_ref" id="pdt_ref">
 
<?php
 
$reponse = $bdd->query('SELECT * FROM produit, categorie WHERE categorie.cat_code = produit.pdt_categorie AND cat_libelle="'.$categ.'"');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['pdt_ref']; ?>"><?php echo $donnees['pdt_designation']; ?></option>
<?php
}
 
?>



</select>
 <?php 
		   	echo '&nbsp&nbsp&nbsp';
			echo 'Quantité : ';
        	echo '<input type="text" name="quantite" size="5" value="1" />';
        	echo '<p><input type="submit" name="ajouter" value="Ajouter au panier" /></p>';
 ?>
</form>
</html>