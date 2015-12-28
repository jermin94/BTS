<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
        <title> Lafaune </title>
    </head>

<?php
include("connexion.php");
session_start();

$total = 0;

echo '<h1>Récapitulatif des articles commandés</h1>';

if ($_SESSION['panier']) {
    $produits = $bdd->query('SELECT * FROM produit WHERE pdt_ref IN(' . implode(', ', array_map(array($bdd, 'quote'), array_keys($_SESSION['panier']))) . ')', PDO::FETCH_ASSOC);
	echo '<table>
				<tr>
                    <th> Référence </th>
                    <th>Désignation</th>
                    <th>Prix Unitaire</th>
					<th>Quantité</th>
					<th>Montant</th>
                </tr>';
    foreach ($produits as $p) {
        echo '
                <tr>
                    <td>', htmlspecialchars($p['pdt_ref']),'</td>
                    <td>', htmlspecialchars($p['pdt_designation']),'</td>
                    <td>',$p['pdt_prix'],' €</td>
					<td>',$_SESSION['panier'][$p['pdt_ref']]['qte'],'</td>
					<td>',$_SESSION['panier'][$p['pdt_ref']]['qte']*$p['pdt_prix'],' €</td>
                </tr>';
        $total = $total + $_SESSION['panier'][$p['pdt_ref']]['qte']*$p['pdt_prix'];
    }
	echo 		'<tr>
					<td></td>
                    <td></td>
                    <td></td>
					<td>Total :</td>
                    <td>',$total,' €</td>
				</tr>	
		</table>';
} else {
    echo 'Votre panier est vide';
}

?>
&nbsp&nbsp&nbsp
<form action="envoyer.php" method="get">
Code Client : <input type="text" name="codeClient" value="<?php if (isset($_POST['codeClient'])) echo htmlentities(trim($_POST['codeClient'])); ?>">&nbsp;&nbsp;&nbsp;
Mot de passe : <input type="password" name="motPasse" value="<?php if (isset($_POST['motPasse'])) echo htmlentities(trim($_POST['motPasse'])); ?>"><br /><br />
<input type="submit" name="connexion" value="Envoyer la commande">
</form>
</html>