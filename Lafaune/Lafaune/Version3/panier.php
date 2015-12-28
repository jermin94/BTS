<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" /> <!-- On insère le css -->
        <title> Lafaune </title>
    </head>
<?php 
session_start();
if (! isset($_SESSION['panier'])) $_SESSION['panier'] = array();

$pdt_ref = isset($_GET['pdt_ref']) ? $_GET['pdt_ref'] : null;
$quantite = isset($_GET['quantite']) ? $_GET['quantite'] : 1;

if ($pdt_ref == null) echo 'Veuillez sélectionner un article pour le mettre dans le panier!';
else
if (isset($_GET['ajouter'])){ 
$_SESSION['panier'][$pdt_ref]['qte'] = $quantite;
} ;
if (isset($_GET['supprimer'])) unset($_SESSION['panier']);

echo '<h1>Contenu de votre panier</h1><ul>';
if (isset($_SESSION['panier']) && count($_SESSION['panier'])>0){
echo '<table>
		<tr>
			<th>Référence</th>
			<th>Quantité</th>
		</tr>';
foreach($_SESSION['panier'] as $pdt_ref=>$article_acheté){
if (isset($article_acheté['qte'])){
echo '	<tr>
			<td>', $pdt_ref ,'</td>
			<td>', $article_acheté['qte'] , '</td>
		</tr>';
}
}
echo '</table>';
}
else { echo 'Votre panier est vide'; }
echo "</ul>";
?>
<a href="javascript:history.back()">Retourner sur le catalogue</a>
</html>