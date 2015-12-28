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
</html>