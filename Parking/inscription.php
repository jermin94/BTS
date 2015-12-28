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
session_start();
include("connexion.php");

if(empty($_POST['nom']))
{
echo '<div id="webcontainer2">
			<h1>Inscription</h1>
			<p>Inscription au Parking de la M2L !<br/>
			<form action="inscription.php" method="post" name="Inscription">
					<label for="nom" class="float">Nom :</label> <input type="text" name="nom" id="nom" size="30" /><br><br>
					<label for="prenom" class="float">Prenom :</label> <input type="text" name="prenom" id="prenom" size="30" /><br><br>
					<label for="mdp" class="float">Mot de passe :</label> <input type="password" name="mdp" id="mdp" size="30" /><br><br>
					<label for="mdp_verif" class="float">Mot de passe a nouveau :</label> <input type="password" name="mdp_verif" id="mdp_verif" size="30" /><br><br>
					<label for="mail_util" class="float">Mail :</label> <input type="text" name="mail_util" id="mail_util" size="30" /> <br><br>
					<div class="center"><input type="submit" value="Inscription" /></div>
			</form>
		</div>';
}


else
{
    $i=0;
    $id=$_POST['nom'];
	$id2=$_POST['prenom'];
    $mail = $_POST['mail_util'];
    $mdp = $_POST['mdp'];
    $mdp_confirm = $_POST['mdp_verif'];
	
    if ($mdp != $mdp_confirm || empty($mdp_confirm) || empty($mdp))
    {
        $i++;
    }
	
	$reponse1 = $bdd->query('select nom_perso, prenom_perso from personnel where nom_perso="'.$id.'" and prenom_perso="'.$id2.'"');
	 if ($reponse1->fetch() == false)
    {
        $i++;
    }
	$reponse1->CloseCursor();
	
	if ($i==0)
   {
	echo'<div id="webcontainer2"><h1>Inscription terminée</h1>';
        echo'<p>Bienvenue vous êtes maintenant inscrit sur le site</p>
	<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p></div>';
        $query=$bdd->prepare('INSERT INTO utilisateur (nom_util, prenom_util, mdp_util, mail_util, valid_util, grade_util)  VALUES (:nom_util, :prenom_util, :mdp, :mail, "0", "1")');
        $query->execute(array(
						'nom_util' => $id,
						'prenom_util' => $id2,
						'mdp' => $mdp,
						'mail' => $mail));
        $query->CloseCursor();
    }
    else
    {
        echo'<div id="webcontainer2"><h1>Inscription interrompue</h1>';
        echo'<p>Cliquez <a href="./inscription.php">ici</a> pour recommencer</p></div>';
    }
}


?>
</body>
</html>