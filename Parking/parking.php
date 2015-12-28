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
							<h1>Ma place dans le parking</h1>';
					
					$reponse1 = $bdd->query('SELECT * FROM historique WHERE id_util ="'.$identif.'"');
					if ($donnees = $reponse1->fetch())
					{
						echo '<h3>Historique des place(s) attribu&#233;(s)</h3>';
						echo '<table bgcolor="#FFFFFF">'."\n";
						echo '<tr>';
						echo '<td bgcolor="#669999"><b><u>Place(s)</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>D&#233;but Attribution</u></b></td>';
						echo '<td bgcolor="#669999"><b><u>Fin Attribution</u></b></td>';
						echo '</tr>'."\n";
						$reponse2 = $bdd->query('SELECT * FROM historique WHERE id_util ="'.$identif.'"');
						while ($donnees = $reponse2->fetch())
						{
							echo '<tr>';
							echo '<td bgcolor="#CCCCCC">'.$donnees['id_place'].'</td>';
							echo '<td bgcolor="#CCCCCC">'.$donnees['debut_attrib'].'</td>';
							echo '<td bgcolor="#CCCCCC">'.$donnees['fin_attrib'].'</td>';
							echo '</tr>'."\n";
						}
						$reponse2->CloseCursor();
						echo '</table>'."\n";
					}
					
					$reponse1->CloseCursor();
					
					$reponse1 = $bdd->query('SELECT * FROM liste_attente WHERE id_util ="'.$identif.'"');
					if ($donnees = $reponse1->fetch())
					{
						echo '<h3>File d\'attente</h3>';
						$reponse2 = $bdd->query('SELECT * FROM liste_attente WHERE id_util ="'.$identif.'" order by ID_liste ');
						while ($donnees = $reponse2->fetch())
						{
							echo '<p>Rang dans la file d\'attente :'.$donnees['ID_liste'].'</p>';
						}
						$reponse2->CloseCursor();
					}
					
					$reponse1->CloseCursor();
					
					$reponse1 = $bdd->query('SELECT id_place FROM place_occupe WHERE id_util ="'.$identif.'"');
					if ($donnees = $reponse1->fetch())
					{
						echo '<h3>Place(s) attribu&#233;(s)</h3>';
						echo '<table bgcolor="#FFFFFF">'."\n";
						echo '<tr>';
						echo '<td bgcolor="#669999"><b><u>Place(s)</u></b></td>';
						echo '</tr>'."\n";
						$reponse2 = $bdd->query('SELECT id_place FROM place_occupe WHERE id_util ="'.$identif.'"');
						while ($donnees = $reponse2->fetch())
						{
							echo '<tr>';
							echo '<td bgcolor="#CCCCCC">'.$donnees['id_place'].'</td>';
							echo '</tr>'."\n";
						}
						$reponse2->CloseCursor();
						echo '</table>'."\n";
					}
					
					
					
					elseif (empty($_GET['p']))
					{
						echo'<h3>Demander une place</h3>';
						echo '<a href="./parking.php?p='.$identif.'"><input type="submit" value="Demander" /></a>';
					}
						else 
						{
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
								echo '<p>Vous avez la place numero ', $numero ,'</p>';
								echo'<p>Cliquez <a href="./parking.php">ici</a> pour revenir.</p>';
							}
							else
							{
								$query=$bdd->prepare('INSERT INTO liste_attente (id_util, date_demande)  VALUES (:id_util, :date_demande)');
								$query->execute(array(
												'id_util' => $id_util,
												'date_demande' => date("YmdHis")));
								$query->CloseCursor();
								echo '<p>Vous avez etez mis en liste d\'attente</p>';
								echo'<p>Cliquez <a href="./parking.php">ici</a> pour revenir.</p>';
							}
							
							$reponse1->CloseCursor();
							
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