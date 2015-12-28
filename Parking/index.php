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
if (!isset($_POST['id']))
{
	echo '<div id="webcontainer2">';
	echo '<form method="post" action="index.php">
	<label for="id">Mail :</label><input name="id" type="text" id="id" /><br><br>
	<label for="mdp">Mot de Passe :</label><input type="password" name="mdp" id="mdp" />
	<p><input type="submit" value="Connexion" /></p></form>
	<a href="./lost.php">Mot de passe perdu ?</a>
	<a href="./inscription.php">Inscription</a></div>';
	
}

else
{
	$message='';
	$identif=$_POST['id'];
	if (empty($_POST['id']) || empty($_POST['mdp']))
	{
		echo '<div id="webcontainer2"><p>Mail ou mot de passe manquant</p></div>';
	}
	else
	{
		$reponse = $bdd->query('SELECT id_util, mail_util, mdp_util, valid_util, grade_util FROM utilisateur WHERE mail_util ="'.$identif.'"');
		while ($donnees = $reponse->fetch())
		{
		
		if ($donnees['valid_util'] == 1 && $donnees['mdp_util'] == $_POST['mdp'])
		{
			$_SESSION['valid_util'] = $donnees['valid_util'];
			$_SESSION['level'] = $donnees['grade_util'];
			$_SESSION['id'] = $donnees['mail_util'];
			header('Location: ./home.php'); 
		}
		else if ($donnees['valid_util'] != 1)
		{
			echo'<div id="webcontainer2"><p>Notre administrateur doit vous valider votre inscription.</p></div>';
		}
		else
		{
			echo'<div id="webcontainer2"><p>Erreur au niveau de votre identiifant ou du mot de passe lors de la saisie, Veuillez resaisir ces données.</p></div>';
		}
		}
		$reponse->CloseCursor();
	}
	echo $message.'</div></body></html>';
}

?>
</body>
</html>