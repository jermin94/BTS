<?php 
include("connexion.php");

$pseudo = $_GET['codeClient'];
$pass = $_GET['motPasse'];

// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM clientconnu WHERE clt_code = :pseudo AND clt_motPasse = :pass');
$req->execute(array(
    'pseudo' => $pseudo,
    'pass' => $pass));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais code client ou mot de passe !';
}
else
{
    session_start();
	$nbLignes=count($_SESSION['panier']);
            if ($nbLignes>0)
            {
                $moment=time();
					$req = $bdd->prepare('INSERT INTO commande(cde_moment, cde_client, cde_date) VALUES(:cde_moment, :cde_client, :cde_date)');
					$req->execute(array(
						'cde_moment' => $moment,
						'cde_client' => $_GET["codeClient"],
						'cde_date' => date("Y-m-d")));
				$produits = $bdd->query('SELECT * FROM produit WHERE pdt_ref IN(' . implode(', ', array_map(array($bdd, 'quote'), array_keys($_SESSION['panier']))) . ')', PDO::FETCH_ASSOC);
                foreach ($produits as $p) {
					$ref=htmlspecialchars($p['pdt_ref']);
                    $qte=$_SESSION['panier'][$p['pdt_ref']]['qte'];

					$req = $bdd->prepare('INSERT INTO contenir(cde_moment, cde_client, produit, quantite) VALUES(:cde_moment, :cde_client, :produit, :quantite)');
					$req->execute(array(
						'cde_moment' => $moment,
						'cde_client' => $_GET["codeClient"],
						'produit' => $ref,
						'quantite' => $qte));
                    
                }
                echo "Votre commande a bien été enregistrée sous la référence ".$_GET["codeClient"]."/".$moment.".";
                $_SESSION["panier"]=array();
            }
            else
            {
                echo "Commande non enregistrée, aucun produit commandé<br>";
            }
}
?>