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
							<h1>Dur&#233;e reservation d\'une place de parking</h1>';
					$reponse2 = $bdd->query('SELECT id_reservation FROM reservation');
								while ($donnees = $reponse2->fetch())
								{
									echo '<h3>Dur&#233;e de r&#233;servation actuel d\'une place de parking : ', $donnees['id_reservation'] ,' jours</h3>';
								}
								$reponse2->CloseCursor();
								if(empty($_POST['id_reservation']))
								{
									echo '<div id="contenu">
											<br/>
											<form action="duree-reservation.php" method="post" name="Ajouter">
												<fieldset><legend>Modification</legend>
													<label for="id_place" class="float">Nouvelle dur&#233;e (en nombres de jours) :</label> <input type="text" name="id_reservation" id="id_reservation" size="30" /><br />
													<div class="center"><input type="submit" value="Modifier" /></div>
												</fieldset>
											</form>
										</div>';
								}
								else 
								{
									$id_reservation=$_POST['id_reservation'];
									
									echo'<h1>Modification termin&#233;e</h1>';
									$reponse1 = $bdd->query('UPDATE reservation SET id_reservation = "'.$id_reservation.'"');
									$reponse1->CloseCursor();
									echo'<p>Cliquez <a href="./duree-reservation.php">ici</a> pour recommencer</p>';
								}
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>