  <?php
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=facturation;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }
                                
                
                 $bdd->query("INSERT INTO ligue(nomlig ) VALUES('test_recup_incremt')");/* j'insere un element factice pour pouvoir recuperer son numero que je vais affecter au nouveau client en cours*/
                 $reponse = $bdd->query("SELECT numCompte FROM ligue  WHERE nomlig = 'test_recup_incremt'");
                 while ($donnees = $reponse->fetch()){
                    $tableau = $donnees['numCompte'];   /* on stock le numero du client  dans une variable */
                }

            ?>
        <?php include("CROSL.php"); ?> <!-- ce bout de code me permet d'afficher ma page d'acceuil -->
        
<!DOCTYPE html>
<html>
    <head>

        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styles.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <!-- Inclure la librairie Jquery -->
        <script src="http://code.jquery.com/jquery-2.1.3.min.js" type="text/javascript"></script>
    

        <title> Ligue</title>
        
    </head>
    <body>  <!-- debut de la page  -->

    <script>
            /*  cette  fonction JavaScript   exécute le code jQuery pour transmettre les donnees de maniere serialize () cela permet de facilite la  transmise au serveur. */
        function submitForm() {
            $.ajax({type:'POST', url: 'liguee.php', data:$('#ContactForm').serialize(), success: function(response) {
            $('#ContactForm').find('.form_result').html(response);
        }});

        return false; /* ce false permet de signaler la fin de la requette et arret de regenerer la page*/
    }

    </script>


   
<form autocomplete="off" method="post" action="liguee.php" id="ContactForm" onsubmit="return submitForm();">
    <!--  lorsque on appui sur enregistrer le formulaire appel la fonction submitForm() pour executer la requete ajaxs -->

                <label for="compt_cli"> Code Client </label>
                <input type="number " value="<?php echo $tableau ;?>" id="compt_cli" name =" compt_cli" /><br/><br/>
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

        <div class="form_result"> </div>  <!--  j'ai inclus un élément div à laquelle que je vais  mettre à jour dynamiquement la réponse du serveur -->
    </form>
    
    </body>
</html>
