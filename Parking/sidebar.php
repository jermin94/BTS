<div id="sidebar">
	<div class="title">
		Accueil
	</div>
	<div class="content">
		<a href="./home.php">&raquo; Accueil</a><br/>
		<a href="./compte.php">&raquo; Changer mon mot de passe</a><br/>
		<a href="./parking.php">&raquo; Places de Parking</a><br/>
		<a href="./disconnect.php">&raquo; Déconnexion</a>
	</div>
	<?php if($donnees['grade_util'] == 2){ ?>
	<div class="title">
		Administration
	</div>
	<div class="content">
		<a href="./ligue.php">&raquo; Ajouter une ligue</a><br/>
		<a href="./utilisateur.php">&raquo; Validation des utilisateurs</a><br/>
		<a href="./place.php">&raquo; Gestion des places</a><br/>
		<a href="./duree-reservation.php">&raquo; Dur&#233;e de reservation</a><br/>
		<a href="./historique.php">&raquo; Historique</a><br/>
		<a href="./liste-utilisateur.php">&raquo; Utilisateurs</a><br/>
		<a href="./date-fin.php">&raquo; Fin d'autorisation</a><br/>
		<a href="./attente.php">&raquo; Liste d'attente</a>
	</div>
	<?php } ?>
</div>