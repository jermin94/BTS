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
							<h1>Attribuer une place</h1>';
							$id_util=$_GET['p'];
							$reponse1 = $bdd->query('SELECT id_place FROM parking WHERE dispo_place = 1');
							
							if ($donnees = $reponse1->fetch())
							{
								$reponse4 = $bdd->query('SELECT id_reservation FROM reservation');
								while ($donnees = $reponse4->fetch())
								{
									$duree = $donnees['id_reservation'];
								}
								$reponse4->CloseCursor();
								$reponse2 = $bdd->query('SELECT id_place FROM parking WHERE dispo_place = 1');
								$i=1;
								$now = new DateTime('now');
								// On ajoute 15 jours
								$now->add(new DateInterval('P'.$duree.'D'));
					 
								while ($donnees = $reponse2->fetch())
								{
									$Tabplace[$i]=$donnees['id_place'];
									$i++;
								}
								$reponse2->CloseCursor();
								$dimension = $i-1;
								$place= array_rand($Tabplace);
								$numero = $Tabplace[$place];
								$reponse3 = $bdd->query('UPDATE parking SET dispo_place = "0" WHERE id_place ="'.$numero.'"');
								$reponse3->CloseCursor();
								$query=$bdd->prepare('INSERT INTO place_occupe  VALUES (:id_place, :id_util, :debut_attrib, :fin_attrib)');
								$query->execute(array(
												'id_place' => $numero,
												'id_util' => $id_util,
												'debut_attrib' => date("Ymd"),
												'fin_attrib' => $now->format('Ymd')));
								$query->CloseCursor();
								$query=$bdd->prepare('INSERT INTO historique (id_util, id_place, debut_attrib, fin_attrib)  VALUES (:id_util, :id_place, :debut_attrib, :fin_attrib)');
								$query->execute(array(
												'id_util' => $id_util,
												'id_place' => $numero,
												'debut_attrib' => date("d-m-Y"),
												'fin_attrib' => $now->format('d-m-Y')));
								$query->CloseCursor();
								$reponse3 = $bdd->query('DELETE FROM liste_attente WHERE id_util ="'.$id_util.'"');
								$reponse3->CloseCursor();
								echo '<p>Vous avez attribue la place numero ', $numero ,'</p>';
								echo'<p>Cliquez <a href="./attente.php">ici</a> pour revenir.</p>';
							}
							else
							{
								echo '<p>Pas de place disponible</p>';
								echo'<p>Cliquez <a href="./attente.php">ici</a> pour revenir.</p>';
							}
							
							$reponse1->CloseCursor();
							
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}

?>
</body>
</html>