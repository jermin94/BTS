<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel='stylesheet' href='css/style.css'>
	<link rel="stylesheet" type="text/css" href="./style/custom.css">
    <script type="text/javascript" src="./style/gvg0bbo.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

</head>
                <style type="text/css">
                  #logo {
                          color: hsl(24,100%,50%);
                          .navbar-inverse {
                           color: white !important; 
                        }
                        .navbar-inverse .navbar-nav > li > a:hover {
                                color: orange !important;
                        }

           }
           body{ margin: 10px;

           }
   </style>
<?php
$connect_client = "ko" ;
if ( $_COOKIE["connection_ok"]!="" and $_COOKIE["connection_ok"]!="vide" )
{
        $identifiant_1=$_COOKIE["connection_ok"];

                ?>



   <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a class="navbar-brand" href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php">E- <span id="logo">courtier / Finances-Manager</span></a>
  </div>
  <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/dossiers.php"><span class=" glyphicon glyphicon-folder-open">   </span>  Mes dossiers</a></li>
            <li><a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/nouveau_pret_membre.php"><span class="glyphicon glyphicon-file"> </span>Demande de pret </a></li> 
			<li><a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/nouveau_dossier_tl_parrain.php"><span class="glyphicon glyphicon-file"> </span>Parrainage </a></li> 
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><span class=" glyphicon glyphicon-user">   </span>  Mon compte <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/bkpe_formulaire_modif_inscript.php">Modifier mon compte</a></li>
                <li><a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/profil.php">Modifier mon profil</a></li>
              </ul>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><?php echo $identifiant_1;?> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
<!--                 <li><a href="#">Aide</a></li>
                <li><a href="#">Option</a></li>
                <li class="divider"></li> -->
                <li><a href="disconnect.php">Se déconnecter</a></li>
                <li><a href="http://e-courtier.fr/">Retour au site e-courtier</a></li>
                 <li><a href="http://finances-manager.fr/">Retour au site Finances-Manager</a></li>
              </ul>
            </li>
    </ul>
</div>
</nav>

<div class="container">

      <div class="starter-template">
              <br>
              <br>

      </div>

</div>


                 

<br>

<?php



}

else
{
  
   ?>
                <form class="" name="login" action="/~ecourtie/bkpe/membre/index.php" enctype="multipart/form-data" method="post">

                    <fieldset>
                        <legend style="font-weight:bold;   color: hsl(24,100%,50%) ;" > Connexion Client </legend>

                        <span id="bkpe_a_footer" >&nbsp;&nbsp;Email :</span>
                        <input type="text" name="identifiant" value=""  />
                        <span id="bkpe_a_footer" >Mot de passe :</span>
                        <input type="password" name="mot_de_passe" value="" class="input"  />

                        &nbsp;&nbsp; 

                        <input align="absbottom"  type="image"  src="../images/bouton_connexion.png" name="login" />
                        
                    </fieldset>
                </form>




<?php


}

?>