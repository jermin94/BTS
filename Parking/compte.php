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
			if ($_SESSION['level'] == 0)
			{
				echo'<p>Accees non autorisee</p>';
			}
				else
				{
					include("./sidebar.php");
					echo '<div id="webcontainer">
							<h1>Modification du mot de passe</h1>';
					if(empty($_POST['mdp']))
					{
						echo '<div id="contenu">
							<form action="compte.php" method="post" name="Modifier">
								<fieldset><legend>Mot de passe</legend>
									<label for="old_mdp" class="float">Ancien mot de passe :</label> <input type="text" name="old_mdp" id="old_mdp" size="30" /><br />
									<label for="mdp" class="float">Nouveau Mot de passe :</label> <input type="password" name="mdp" id="mdp" size="30" /><br />
									<label for="mdp_verif" class="float">Nouveau Mot de passe a nouveau :</label> <input type="password" name="mdp_verif" id="mdp_verif" size="30" /><br />
									<div class="center"><input type="submit" value="Modifier" /></div>
								</fieldset>
								</form>
							</div>';
					}
					else
					{
					$i=0;
					$old_mdp=$_POST['old_mdp'];
					$mdp = $_POST['mdp'];
					$mdp_confirm = $_POST['mdp_verif'];
					
					if ($mdp != $mdp_confirm || empty($mdp_confirm) || empty($mdp))
					{
						$i++;
					}
					
					$reponse1 = $bdd->query('select mdp_util from utilisateur where mail_util="'.$identif.'" and mdp_util="'.$old_mdp.'"');

					 if ($reponse1->fetch() == false)
					{
						$i++;
					}
					$reponse1->CloseCursor();
					
					if ($i==0)
				   {
					echo'<h1>Modification termin&#233;e</h1>';
						$reponse1 = $bdd->query('UPDATE utilisateur SET mdp_util = "'.$mdp.'" where mail_util = "'.$identif.'"');
						$reponse1->CloseCursor();
						echo'<p>Cliquez <a href="./accueil.php">ici</a> pour revenir &agrave; la page d accueil</p>';
					}
					else
					{
						echo'<h1>Modification interrompue</h1>';
						echo'<p>Cliquez <a href="./compte.php">ici</a> pour recommencer</p>';
					}
					}
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>