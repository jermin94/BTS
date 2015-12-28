<!DOCTYPE html>
<html>
<head>
	<!-- PAGE -->
	<meta charset="utf-8"/>
	<title>Administration</title>
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="./css/body.css"/>
</head>
<body bgcolor="#ECE9D8">
<?php
include("connexion.php");
session_start();
if (!isset($_POST['nom']))
{
	echo '<div id="webcontainer2">';
	echo '<form method="post" action="lost.php">
	<label for="nom">Nom :</label><input name="nom" type="text" id="nom" /><br><br>
	<label for="prenom">Prenom :</label><input name="prenom" type="text" id="prenom" /><br><br>
	<label for="mail">Mail :</label><input type="text" name="mail" id="mail" />
	<p><input type="submit" value="R&#233;initialiser" /></p></form>
	<a href="./index.php">Connexion</a></div>';
	
}

else
{
	$message='';
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$mail=$_POST['mail'];
	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']))
	{
		echo '<div id="webcontainer2"><p>Nom, prenom ou mail manquant</p></div>';
	}
	else
	{
		$reponse = $bdd->query('SELECT id_util, nom_util, prenom_util mail_util, mdp_util, valid_util, grade_util FROM utilisateur WHERE mail_util ="'.$mail.'"');
		while ($donnees = $reponse->fetch())
		{
		
		if ($donnees['mail_util'] == $mail || $donnees['nom_util'] == $nom || $donnees['prenom_util'] == $prenom)
		{
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
						$reponse1 = $bdd->query('UPDATE utilisateur SET mdp_util ="'.$mdp.'" WHERE mail_util ="'.$mail.'"');
						$reponse1->CloseCursor();
						echo '<p>Changement du mot de passe de ', $prenom ,' ', $nom ,' bien effectu&#233;</p>' ;
						
						// Le message
						$message = "Bonjour,\r\Voici votre nouveau mot de passe pour le parking de la m2L : " .$mdp. " 2\r\Cordialement, l'administration";

						// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
						$message = wordwrap($message, 70, "\r\n");

						// Envoi du mail
						mail($mail, 'Mot de passe administration m2L', $message);
		}
		else
		{
			echo'<div id="webcontainer2"><p>Erreur au niveau de votre identiifant ou du mail lors de la saisie, Veuillez resaisir ces données.</p></div>';
		}
		}
		$reponse->CloseCursor();
	}
	echo $message.'</div></body></html>';
}

?>
</body>
</html>