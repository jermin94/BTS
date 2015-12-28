<!DOCTYPE html>
<html>
<head>
	<!-- PAGE -->
	<meta charset="utf-8"/>
	<title>Administration</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/style.css"/>
	<link rel="stylesheet" type="text/css" href="./css/body.css"/>
</head>
<body>
<?php
include("connexion.php");
session_start();


	if (empty($_SESSION))
	{
		echo'<p>Accees non autorisee</p>';
	}
	else {
		$message='';
		$identif=$_SESSION['id'];
		$reponse = $bdd->query('SELECT id_util, mail_util, mdp_util, valid_util, grade_util FROM utilisateur WHERE mail_util ="'.$identif.'"');
	
		while ($donnees = $reponse->fetch())
		{
			if ($_SESSION['level'] == 0 || $_SESSION['level'] == 1)
			{
				echo'<p>Accees non autorisee</p>';
			}
				else if ($donnees['grade_util'] == 2)
				{	
					include("./sidebar.php");
					echo '<div id="webcontainer">
							<h1>Ajout de compte</h1>';
					if (empty($_GET['p']))
					{
						echo '<p>Pas de compte selectionne.</p>';
					}
					else
					{
						$id_suppr=$_GET['p'];
						function genererMDP ($longueur = 8){
						// initialiser la variable $mdp
						$mdp = "";
					 
						// Définir tout les caractères possibles dans le mot de passe, 
						// Il est possible de rajouter des voyelles ou bien des caractères spéciaux
						$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
					 
						// obtenir le nombre de caractères dans la chaîne précédente
						// cette valeur sera utilisé plus tard
						$longueurMax = strlen($possible);
					 
						if ($longueur > $longueurMax) {
							$longueur = $longueurMax;
						}
					 
						// initialiser le compteur
						$i = 0;
					 
						// ajouter un caractère aléatoire à $mdp jusqu'à ce que $longueur soit atteint
						while ($i < $longueur) {
							// prendre un caractère aléatoire
							$caractere = substr($possible, mt_rand(0, $longueurMax-1), 1);
					 
							// vérifier si le caractère est déjà utilisé dans $mdp
							if (!strstr($mdp, $caractere)) {
								// Si non, ajouter le caractère à $mdp et augmenter le compteur
								$mdp .= $caractere;
								$i++;
							}
						}
 
							// retourner le résultat final
							return $mdp;
						}
						
						$mdp=genererMDP();
						$reponse1 = $bdd->query('UPDATE utilisateur SET mdp_util ="'.$mdp.'" WHERE id_util ="'.$id_suppr.'"');
						$reponse1->CloseCursor();
						echo '<p>Changement du mot de passe de ', $id_suppr ,' bien effectu&#233;</p>' ;
					}
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>