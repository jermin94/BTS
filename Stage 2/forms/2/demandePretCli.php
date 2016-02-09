<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

</head>

<!-- <link rel="stylesheet" href="../style/site.css" type="text/css"> -->
</head>

<body >



    <style type="text/css">
		.meter { 
			height: 20px;  /* Can be anything */
			position: relative;
			margin: 60px 0 20px 0; /* Just for demo spacing */
			background: #555;
			-moz-border-radius: 25px;
			-webkit-border-radius: 25px;
			border-radius: 25px;
			padding: 10px;
			-webkit-box-shadow: inset 0 -1px 1px rgba(255,255,255,0.3);
			-moz-box-shadow   : inset 0 -1px 1px rgba(255,255,255,0.3);
			box-shadow        : inset 0 -1px 1px rgba(255,255,255,0.3);
		}
		.meter > span {
			display: block;
			height: 100%;
			   -webkit-border-top-right-radius: 8px;
			-webkit-border-bottom-right-radius: 8px;
			       -moz-border-radius-topright: 8px;
			    -moz-border-radius-bottomright: 8px;
			           border-top-right-radius: 8px;
			        border-bottom-right-radius: 8px;
			    -webkit-border-top-left-radius: 20px;
			 -webkit-border-bottom-left-radius: 20px;
			        -moz-border-radius-topleft: 20px;
			     -moz-border-radius-bottomleft: 20px;
			            border-top-left-radius: 20px;
			         border-bottom-left-radius: 20px;
			background-color: rgb(43,194,83);
			background-image: -webkit-gradient(
			  linear,
			  left bottom,
			  left top,
			  color-stop(0, rgb(43,194,83)),
			  color-stop(1, rgb(84,240,84))
			 );
			background-image: -moz-linear-gradient(
			  center bottom,
			  rgb(43,194,83) 37%,
			  rgb(84,240,84) 69%
			 );
			-webkit-box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			-moz-box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			box-shadow: 
			  inset 0 2px 9px  rgba(255,255,255,0.3),
			  inset 0 -2px 6px rgba(0,0,0,0.4);
			position: relative;
			overflow: hidden;
		}
		.meter > span:after, .animate > span > span {
			content: "";
			position: absolute;
			top: 0; left: 0; bottom: 0; right: 0;
			background-image: 
			   -webkit-gradient(linear, 0 0, 100% 100%, 
			      color-stop(.25, rgba(255, 255, 255, .2)), 
			      color-stop(.25, transparent), color-stop(.5, transparent), 
			      color-stop(.5, rgba(255, 255, 255, .2)), 
			      color-stop(.75, rgba(255, 255, 255, .2)), 
			      color-stop(.75, transparent), to(transparent)
			   );
			background-image: 
				-moz-linear-gradient(
				  -45deg, 
			      rgba(255, 255, 255, .2) 25%, 
			      transparent 25%, 
			      transparent 50%, 
			      rgba(255, 255, 255, .2) 50%, 
			      rgba(255, 255, 255, .2) 75%, 
			      transparent 75%, 
			      transparent
			   );
			z-index: 1;
			-webkit-background-size: 50px 50px;
			-moz-background-size: 50px 50px;
			-webkit-animation: move 2s linear infinite;
			   -webkit-border-top-right-radius: 8px;
			-webkit-border-bottom-right-radius: 8px;
			       -moz-border-radius-topright: 8px;
			    -moz-border-radius-bottomright: 8px;
			           border-top-right-radius: 8px;
			        border-bottom-right-radius: 8px;
			    -webkit-border-top-left-radius: 20px;
			 -webkit-border-bottom-left-radius: 20px;
			        -moz-border-radius-topleft: 20px;
			     -moz-border-radius-bottomleft: 20px;
			            border-top-left-radius: 20px;
			         border-bottom-left-radius: 20px;
			overflow: hidden;
		}
		
		.animate > span:after {
			display: none;
		}
		
		@-webkit-keyframes move {
		    0% {
		       background-position: 0 0;
		    }
		    100% {
		       background-position: 50px 50px;
		    }
		}
		
		.orange > span {
			background-color: #f1a165;
			background-image: -moz-linear-gradient(top, #f1a165, #f36d0a);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f1a165),color-stop(1, #f36d0a));
			background-image: -webkit-linear-gradient(#f1a165, #f36d0a); 
		}
		
		.red > span {
			background-color: #f0a3a3;
			background-image: -moz-linear-gradient(top, #f0a3a3, #f42323);
			background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, #f0a3a3),color-stop(1, #f42323));
			background-image: -webkit-linear-gradient(#f0a3a3, #f42323);
		}
		
		.nostripes > span > span, .nostripes > span:after {
			-webkit-animation: none;
			background-image: none;
		}
        fieldset { border:none; width:400px;}
        legend { font-size:18px; margin:0px; padding:10px 0px; font-weight:bold;}
        label { display:block; margin:15px 0 5px;}
        input[type=text], input[type=password] { width:300px; padding:5px; }
        .prev, .next {  padding:5px 10px;  text-decoration:none;}
        .prev:hover, .next:hover {  text-decoration:none;}
        .prev { float:left;}
        .next { float:right;}
        #makeWizard { background-color:#b0232a; color:#fff; padding:5px 10px; text-decoration:none; font-size:18px;}
        #makeWizard:hover { background-color:#000;}
        .conjoint{border:1px solid black; padding: 5px;}
        .error{
            border:1px solid red;
        }
        #container{
            margin: 15px;
        }
    </style>
    <div id="container">
        <form id="SignupForm" action="formPret.php" class="form-horizontal" method="post">

            <fieldset>
                <legend> Objet</legend>
                <label for="compromis">Quel type de prêt recherchez-vous ? </label>
                <input type="radio"value="signé"name="compromis" class="aaa">Compromis signé</input><br>
                <input type="radio"value="sous 30 jours"name="compromis"class="aaa">Non, signature sous 30 jours</input><br>
                <input type="radio"value="sous 3 mois"name="compromis" class="aaa">Non, signature sous 3 mois</input><br>
                <input type="radio"value="rachat pret immobilier"name="compromis"class="aaa">Rachat de son prêt immobilier</input><br>
                <input type="radio"value="rachat pret consommation"name="compromis"class="aaa">Rachat de ses prêt consommation</input>
            </select>
            <br>

            <div class="recherche" style="display: none;">
                <div class="bs-example">
                    <p><br><b>Voulez-vous une aide sans engagement de nos partenaires dans la recherche de votre bien ?</b><br>

                        <button class="btn btn-success" type="button" id="yep" >
                            Oui
                        </button>
                        <button class="btn btn-warning" type="button"  id="nop">
                            non
                        </button>
                    </p>

                    <div id="rechercheInput" style="display:none;">
                        <label for="recherche">Merci de nous indiquer votre zone de recherche, le nom de la ville par exemple :</label>
                        <input id="recherche" class="chaine" name="recherche" type="text" />
                    </div>

                </div>
            </div>


        </fieldset>
        <fieldset>
            <legend>Budget</legend>
            <div id="budget">
                <label for="investissement">Quel est le montant de l'achat hors frais ?</label>
                <input id="investissement" class="nombre" name="investissement" type="text" /> €
                <label for="fraisAgence">Montant frais d'agence (sans frais, mettre 0) :</label>
                <input id="fraisAgence" class="nombre" type="text" name="fraisAgence" /> €
                <label for="montantTravaux">Montant des travaux :</label>
                <input id="montantTravaux" class="nombre" type="text" name="montantTravaux"/> €

                <label for="apport">Montant de votre apport éventuel :</label>
                <input id="apport" class="nombre" type="text" name="apport" /> €
                <label for="notaire">Montant de vos frais notaire:</label>
                <input id="notaire" class="nombre" type="text" name="notaire" /> €

                <label for="achat">Vous achetez :</label>
                <select class="selecteur" name="achat" id="achat">
                    <option value="" selected="">Merci de préciser</option>
                    <option value="Terrain seul">Terrain seul</option>
                    <option value="Ancien Maison ou Appartement">Ancien Maison ou Appartement</option>
                    <option value="Construction">Construction</option>
                    <option value="Revente de votre logement + Achat Maison ou Appart">Revente de votre logement + Achat Maison ou Appart</option>
                    <option value="Travaux Uniquement">Travaux Uniquement</option>

                </select>
                <!--usage-->
                <label for="CreditcardMonth">Usage de l'achat :</label>
                <select id="usage" class="selecteur"name="usage" >
                    <option value="" selected="">Merci de préciser</option>
                    <option value="Principale">Principale</option>
                    <option value="Secondaire">Secondaire</option>
                    <option value="Locatif">Locatif</option>
                </select>        
            </div>
            <div class="rachatPret" style="display: none;">
                <p> vous n'avez pas à renseigner votre budget pour un prêt à consommation, cliquez sur suivant pour continuer.</P>
                    <label for="valeurBienActu">Si déjà propriétaire, valeur de votre bien actuel :</label>
                    <input id="valeurBienActu" class="nombre" name="valeurBienActu" type="text" /> €
                </div>
            </fieldset>
            <fieldset>
                <legend>Etat civil</legend>
                <label for="email">Email</label>
                <input type="mail" id="email" name="email" type="text" onblur="verifMail()" />
                <label for="nom">Nom</label>
                <input id="nom" name="nom" value="<?php echo $nom; ?>" class="chaine" type="text" />
                <label for="prenom">Prénom</label>
                <input id="prenom" value="<?php echo $prenom; ?>"class="chaine" type="text" name="prenom" class="chaine"/>
                <label for="dateNaissance">Date de naissance</label>
                <input id="dateNaissance" type="date" name="dateNaissance"/>                




                <label for="situation">Situation matrimoniale</label>
                <select id="situation" class="selecteur" name="situation">
                    <option value="" selected="">Merci de préciser</option>
                    <option value="celibataire">Celibataire</option>
                    <option value='marie sans contrat'>Maries sans contrat</option>
                    <option value="Maries separation Biens">Maries separation Biens</option>
                    <option value='Pacs'>Pacs</option>
                    <option value="Union libre">Union libre</option>
                    <option value="Divorce">Divorce</option>
                    <option value="Veuf">Veuf</option>
                </select>    


                <label for="enfants">Nombre enfants à chagres</label>
                <select id="enfants" name="enfants" class="selecteur">
                    <option value=""selected="" >Merci de préciser</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
                <br> <br> 
                <div class="conjoint" style="display:none;">
                    <span> <b>Votre conjoint</b></span>
                    <label for="civiliteConjoint">Civilité</label>
                    <select id="civiliteConjoint" name="conjointmrmme">
                        <option value="sans" selected="">Merci de préciser</option>
                        <option value="monsieur">Monsieur</option>
                        <option value="madame">Madame</option>
                        <option value="mlle">Mlle</option>
                        <option value="SCI">SCI</option>
                    </select>
                    <br>

                    <div id="jeuneFille" style="display:none;">
                        <label for="nomJeuneFille" >Nom jeune fille </label>
                        <input id="nomJeuneFille" class="chaine" type="text" name="nomJeuneFille" />
                    </div>
                    <label for="nomConjoint" >Nom </label>
                    <input id="nomConjoint" name="nomConjoint" class="chaine" type="text" />
                    <label for="prenomConjoint"> Prénom</label>
                    <input id="prenomConjoint" name="prenomConjoint"  class="chaine" type="text" />
                    <label for="dateNaissanceConjoint">Date de naissance</label>
                    <input id="dateNaissanceConjoint" type="date" name="dateNaissanceConjoint" />
                </div>
            </fieldset>
            <fieldset>
            <legend>Coordonnées</legend>
                <label for="tel">Téléphone portable</label>
                <input id="tel" name="tel" type="text"  class="nombre" />

                <label for="adresse">Adresse</label>
                <input id="adresse" name="adresse"  class="chaine" type="text" />


                <label for="codePostal">Code postal</label>
                <input id="codePostal" class="chaine" type="text" name="codePostal"/>


                <label for="ville">Ville</label>
                <input id="ville" name="ville"  class="chaine" type="text" />

            </fieldset>


            <fieldset>
                <legend>Profession</legend>
                <label for="contrat">Type de contrat</label>
                <select id="contrat" name="contrat">
                    <option value="">Merci de précisez</option>
                    <option value="CDI prive">CDI secteur prive</option>
                    <option value="CDI public">CDI secteur public</option>
                    <option value="CDD prive">CDD secteur prive</option>
                    <option value="CDD public">CDD secteur public</option>
                    <option value="profession liberale">Profession liberale</option>
                    <option value="Gerant societe">Gerant societe</option>
                    <option value="Interim">Interim</option>
                    <option value="Militaire - Police">Militaire - Police</option>
                    <option value="Invalidite">Invalidité</option>
                    <option value="conges maladie">Congés maladie</option>
                    <option value="conges formation">Congés formation</option>
                    <option value="conges maternite">Congés maternite</option>
                    <option value="sans emploi">Sans Emploi</option>
                    <option value="retraite">Retraite</option>
                    <option value="agriculteur">Agriculteur</option>
                    <option value="en formation">En formation</option>
                    <option value="etudiant">Etudiant</option>
                </select>                
                <label for="revenus">Revenus mensuel</label>
                <input id="revenus" class="nombre" type="text" name="revenus" />€

                <label for="anciennete">Votre ancienneté</label>
                <input id="anciennete" class="nombre" type="text" name="anciennete"/>mois 


                <label for="revenusImposable">Revenus imposable</label>
                <input id="revenusImposable" class="nombre" type="text"name="revenusImposable" />€ 
                <br />    
                <br />    
                <button  type="button" id="creerReven">Ajouter un autre revenus</button>

                <div id="AddRevenus">

                </div>

                <br> <br> <br>
                <div class="conjoint" style="display:none;">
                    <span> <b>Votre conjoint</b></span>

                    <label for="contratConjoint">Type de contrat</label>
                    <select id="contratConjoint" name="contratConjoint">
                        <option value="">Merci de préciser</option>
                        <option value="CDI secteur prive">CDI secteur prive</option>
                        <option value="CDI secteur public">CDI secteur public</option>
                        <option value="CDD secteur prive">CDD secteur prive</option>
                        <option value="CDD secteur public">CDD secteur public</option>
                        <option value="Profession liberale">Profession liberale</option>
                        <option value="Gerant societe">Gerant societe</option>
                        <option value="Interim">Interim</option>
                        <option value="Militaire - Police">Militaire - Police</option>
                        <option value="Invalidite">Invalidite</option>
                        <option value="Conges maladie">Conges maladie</option>
                        <option value="Conges formation">Conges formation</option>
                        <option value="Conges maternite">Conges maternite</option>
                        <option value="Sans Emploi">Sans Emploi</option>
                        <option value="Retraite">Retraite</option>
                        <option value="Agriculteur">Agriculteur</option>
                        <option value="En formation">En formation</option>
                        <option value="Etudiant">Etudiant</option>
                    </select>                
                    <label for="revenusConjoint">Revenus mensuel</label>
                    <input id="revenusConjoint" type="text" name="revenusConjoint"/>

                    <label for="ancienneteConjoint">Votre ancienneté</label>
                    <input id="ancienneteConjoint" type="text" name="ancienneteConjoint" /> 

                    <label for="revenusConjoint">Revenus imposable</label>
                    <input id="revenusConjoint" class="nombre" type="text" name="revenusConjoint" /> 
                </div>
            </fieldset>


            <fieldset>
                <legend>Banque</legend>
                <label for="banque">Banque</label>
                <select id="banque" name="banque">  
                    <option selected="" value="">Merci de préciser</option>
                    <option value="BNP Paribas">BNP Paribas</option>
                    <option value="Banque populaire">Banque Populaire</option>
                    <option value="Banque Postale">Banque Postale</option>
                    <option value="Caisse Epargne">Caisse d'Epargne</option>
                    <option value="Credit Agricole">Credit Agricole</option>
                    <option value="Credit du Nord">Credit du Nord</option>
                    <option value="Credit Mutuel">Credit Mutuel</option>
                    <option value="CIC">CIC</option>
                    <option value="LCL">LCL</option>
                    <option value="HSBC">HSBC</option>
                    <option value="Societe Generale">Societe Generale</option>
                    <option value="Autres">Autres</option>
                </select>


                <label for="banque2">Autres banques</label>
                <select id="banque2" name="banque2">  
                    <option selected="" value="sans">Sans</option>
                    <option value="BNP Paribas">BNP Paribas</option>
                    <option value="Banque populaire">Banque Populaire</option>
                    <option value="Banque Postale">Banque Postale</option>
                    <option value="Caisse Epargne">Caisse d'Epargne</option>
                    <option value="Credit Agricole">Credit Agricole</option>
                    <option value="Credit du Nord">Credit du Nord</option>
                    <option value="Credit Mutuel">Credit Mutuel</option>
                    <option value="CIC">CIC</option>
                    <option value="LCL">LCL</option>
                    <option value="HSBC">HSBC</option>
                    <option value="Societe Generale">Societe Generale</option>
                    <option value="Autres">Autres</option>
                </select>                          
            </fieldset>


            <fieldset>
                <legend>Charges</legend>
                <label for="charges1"> Charges en cours </label>

                <select  id="charges" name="charges">
                    <option selected="">Merci de preciser</option>
                    <option>Pret Res Principale</option>
                    <option>Pensions alimentaires</option>
                    <option>Pret automobile</option>
                    <option>Pret automobile 2</option>
                    <option>Pret conso 3</option>
                    <option>Pret immobilier </option>
                    <option>Loyer</option>
                    <option>Autre Pret</option>
                </select>
                <label for="mensualite">Mensualié:</label>
                <input id="mensualite"name="mensualite" class="nombre" type="text" /> €                

                <label for="dureeRest">Date de fin</label>
                <input id="dureeRest"  class="nombre" name="dureeRest" type="text" />mois  

                <div class="rachatPretConso">
                    <label for="capitalRestDu">capital restant du:</label>
                    <input id="capitalRestDu"name="capitalRestDu" class="nombre" type="text" /> €  
                </div>

                <div class="autresCharges">
                </div>

                <br> <br>
                <button type="button" id="creerCharges">Ajouter une autre charges</button>*

                <div id="addCharges"></div>
            </fieldset>
            <div id='charges' style="display:none; position: absolute;margin-left: 590px; margin-top: -266px;">
                <div id='charge'> Charges:</div>
                <div id='Mensualite'> Mensualité:</div>
                <div id='Duree'> Durée restante:</div>
            </div>

            <p>
                <input id="SaveAccount" type="submit" value="Envoyer votre demande "/>
            </p>
        </form>
        <div id="erreurEmail" class="alert alert-warning alert-dismissible fade in" role="alert" style="width:100%; display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

            <p>Cette adresse mail existe déjà, veuillez vous connecter à votre compte en cliquant<a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php" target="_blank"> ici</a> </p>

        </div>
        <div id="erreurNonRemplie" class="alert alert-danger alert-dismissible fade in" role="alert" style="width:100%; display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

            <p>Champ obligatoire non remplie. :</p>

        </div>
        <div id="erreurNombre" class="alert alert-danger alert-dismissible fade in" role="alert" style="width:100%; display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

            <p>Ceci n'est pas un nombre</p>

        </div>

    </body>
    </html>
</div>
</div>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="formulairePret.js"></script>
<script type="text/javascript" src="formTowi.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#SignupForm").formToWizard({submitButton: 'SaveAccount'});
    });




    function verifMail() {
        var email = document.getElementById("email").value;
        $.post("testEmail.php", {email: email}, function(data) {
            var emailValid = data;
            var johnny = JSON.parse(emailValid);
            emailValid= johnny[0];
            console.log(emailValid);

            if( typeof emailValid !== 'undefined'){
               $('#erreurEmail').show();
               $('#step2Next').hide();


           }
           else{
               $('#step2Next').show();
               $('#erreurEmail').hide();


           }
       });


    }

</script>                




<?php
// include('../footer.php');

?>

</body>
</html>