  
<!DOCTYPE html>
<html>
    <head>
    <title>Administration</title>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
		<link rel="stylesheet" type="text/css" href="./css/body.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!-- Inclure la librairie Jquery -->
        <script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>     
    </head>
    <body>  <!-- debut de la page  -->

	<?php
	session_start();
	include("connexion.php");
	
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
							<h1>Ajouter une ligue</h1>';
					echo "<script>
						function submitForm() {
						$.ajax({type:'POST', url: 'liguee.php', data:$('#ContactForm').serialize(), success: function(response) {
						$('#ContactForm').find('.form_result').html(response);
						}});
						return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
						}
					</script>";

					echo'<form autocomplete="off" method="post" action="liguee.php" id="ContactForm" onsubmit="return submitForm();">
					<!--  lorsque on appui sur enregistrer le formulaire appel la fonction submitForm() pour executer la requete ajaxs -->
							<br/>

								<label for="nom_ligue"> Nom de la ligue</label>
								<input type="text"  id="nom_ligue" name =" nom_ligue"/> <br/><br/>
							<!-- les differentes information du nouveau client -->
							<fieldset style="width:360px;">
								<legend>Les informations sur le trésorier</legend>
									<label for="nom_tresorier">  Nom </label>
									<input type="text" id="nom_tresorier"  name ="nom_tresorier"/> <br/>
									<label for="rue"> Rue</label>
									<input type="text" id="rue " name ="rue" /> <br/>
									<label for="cp"> CP</label>
									<input type="number" id="cp" name ="cp" /> <br/>
									<label for="ville"> Ville</label>
									<input type="text" id="ville" name ="ville" /> <br/>

							</fieldset><br/><br/>
						   
							 <input type="submit" name="submit" value="Enregistrer" />

						<div class="form_result"> </div>
					</form>';
					echo '</div>';
				}
		}
		$reponse->CloseCursor();
	}
   ?>
  </body>
</html>