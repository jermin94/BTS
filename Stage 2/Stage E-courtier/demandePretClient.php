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
	<script>
		$(function() {
			$(".meter > span").each(function() {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});
		});
	</script>
	
	<style>
		.meter { 
			height: 20px;  /* Can be anything */
			position: relative;
			background: #555;
			-moz-border-radius: 25px;
			-webkit-border-radius: 25px;
			border-radius: 25px;
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
			background-color: #000397;
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
		fieldset { border:none;}
        legend { font-size:18px; margin:0px; padding:10px 0px; font-weight:bold;}
        label { margin:15px 0 5px;}
        input[type=text], input[type=password] { padding:5px; }
        .prev, .next {  padding:5px 10px;  text-decoration:none;}
        .prev:hover, .next:hover {  text-decoration:none;}
        .prev { float:left;}
        .next { float:right;}
        #steps { list-style:none; width:100%; overflow:hidden; margin:0px; padding:0px;}
        #steps li {font-size:24px; float:left; padding:10px; }
        #steps li span {font-size:11px; display:block;}
        #steps li.current { color:#ff6600; }
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

</head>

<!-- <link rel="stylesheet" href="../style/site.css" type="text/css"> -->
</head>

<body >
<?php
$id_partenaire = $_GET['pro'];
?>
    <div id="container">
        <form id="SignupForm" action="../bkpe/controler/formPret_rapide.php?pro=<?php echo $id_partenaire; ?>" class="form-horizontal" method="post">

            <fieldset>
                <legend> Objet</legend><hr>
                <label for="compromis">Quel type de prêt recherchez-vous ? </br></br></label>
                    <span>
                        <input name="compromis" id="radio1" type="radio" value="signé" class="aaa">
                        <label for="radio1">Compromis signé</label>
                    </span>
                    <span>
                        <input name="compromis" id="radio2" type="radio" value="sous 30 jours" class="aaa">
                        <label for="radio2">Non, signature sous 30 jours</label>
                    </span>
                    <span>
                        <input name="compromis" id="radio3" type="radio" value="sous 3 mois" class="aaa">
                        <label for="radio3">Non, signature sous 3 mois</label>
                    </span>
                    <span>
                        <input name="compromis" id="radio4" type="radio" value="rachat pret immobilier" class="aaa">
                        <label for="radio4">Rachat de son prêt immobilier</label>
                    </span>
                    <span>
                        <input name="compromis" id="radio5" type="radio" value="rachat pret consommation" class="aaa">
                        <label for="radio5">Rachat de ses prêt consommation</label>
                    </span>
            <br>

            <div class="recherche" style="display: none;">
                <div class="bs-example">
                    <p><br><b>Voulez-vous une aide sans engagement de nos partenaires dans la recherche de votre bien ?</b><br>

                        <button class="monBouton" type="button" id="yep" >
                            Oui
                        </button>
                        <button class="monBouton" type="button"  id="nop">
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
				<div id="remplir">
					<label for="investissement">Quel est le montant de l'achat hors frais ?</label>
					<input id="investissement" class="nombre" name="investissement" type="text" /> €
				</div>
				<div id="remplir">
					<label for="fraisAgence">Montant frais d'agence (sans frais, mettre 0) :</label>
					<input id="fraisAgence" class="nombre" type="text" name="fraisAgence" value="0" onclick="fraisAgence.value=''" /> €
				</div>
				<div id="remplir">
					<label for="montantTravaux">Montant des travaux :</label>
					<input id="montantTravaux" class="nombre" type="text" name="montantTravaux" value="Pas de Travaux" onclick="montantTravaux.value=''" /> €
				</div>
				<div id="remplir">
					<label for="apport">Montant de votre apport éventuel :</label>
					<input id="apport" class="nombre" type="text" name="apport" value="0 - A déterminer" onclick="apport.value=''" /> €
				</div>
				<div id="remplir">
					<label for="notaire">Montant de vos frais notaire:</label>
					<input id="notaire" class="nombre" type="text" name="notaire" value="Ne sais pas" onclick="notaire.value=''" /> €
				</div>
				<div id="remplir">
					<label for="achat">Vous achetez :</label>
						<span>
							<input name="achat" id="radio12" type="radio" value="Terrain seul" class="aaa">
							<label for="radio12">Terrain seul</label>
						</span>
						<span>
							<input name="achat" id="radio22" type="radio" value="Construction" class="aaa">
							<label for="radio22">Construction</label>
						</span>
						<span>
							<input name="achat" id="radio32" type="radio" value="Ancien maison ou appartement" class="aaa">
							<label for="radio32">Ancien maison ou appartement</label>
						</span>
						<span>
							<input name="achat" id="radio42" type="radio" value="Revente de votre logement + Achat Maison ou Appart" class="aaa">
							<label for="radio42">Revente de votre logement + Achat Maison ou Appart</label>
						</span>
						<span>
							<input name="achat" id="radio52" type="radio" value="Travaux Uniquement" class="aaa">
							<label for="radio52">Travaux Uniquement</label>
						</span>
				</div>
                <!--usage-->
				<div id="remplir">
					<label for="CreditcardMonth">Usage de l'achat :</label>
						<span>
							<input name="usage" id="radio13" type="radio" value="Principale" class="selecteur">
							<label for="radio13">Principale</label>
						</span>
						<span>
							<input name="usage" id="radio23" type="radio" value="Secondaire" class="selecteur">
							<label for="radio23">Secondaire</label>
						</span>
						<span>
							<input name="usage" id="radio33" type="radio" value="Locatif" class="selecteur">
							<label for="radio33">Locatif</label>
						</span>
				</div>
            </div>
            <div class="rachatPret" style="display: none;">
                <p> vous n'avez pas à renseigner votre budget pour un prêt à consommation, cliquez sur suivant pour continuer.</P>
				<div id="remplir">
                    <label for="valeurBienActu">Si déjà propriétaire, valeur de votre bien actuel :</label>
                    <input id="valeurBienActu" class="nombre" name="valeurBienActu" type="text" /> €
                </div>
			</div>
            </fieldset>
            <fieldset>
                <legend>Etat civil</legend>
				<div id="remplir">
					<label for="Titre2">Titre :</label>
					<span>
						<input name="m_mme_mlle" id="radio17" type="radio" value="Monsieur" class="selecteur">
						<label for="radio17">Monsieur</label>
					</span>
					<span>  
						<input name="m_mme_mlle" id="radio27" type="radio" value="Madame" class="selecteur">
						<label for="radio27">Madame</label>
					</span>
					<span>  
						<input name="m_mme_mlle" id="radio37" type="radio" value="Mademoiselle" class="selecteur">
						<label for="radio37">Mademoiselle</label>
					</span>
					<span>  
						<input name="m_mme_mlle" id="radio47" type="radio" value="Societe" class="selecteur">
						<label for="radio47">Societe</label>
					</span>
				</div>
				<div id="remplir">
					<label for="email">Email</label>
					<input type="mail" id="email" name="email" type="text" class="nombre" onblur="verifMail()" />
				</div>
				<div id="remplir">
					<label for="nom">Nom</label>
					<input id="nom" name="nom" value="<?php echo $nom; ?>" class="chaine" type="text" />
				</div>
				<div id="remplir">
					<label for="prenom">Prénom</label>
					<input id="prenom" value="<?php echo $prenom; ?>"class="chaine" type="text" name="prenom" class="chaine"/>
				</div>
				<div id="remplir">
					<label for="dateNaissance">Date de naissance</label>
					<input id="dateNaissance" type="date" name="dateNaissance"/>                
				</div>


				<div id="remplir">
					<label for="situation">Situation matrimoniale</label>
						<span>
							<input name="situation" id="radio14" type="radio" value="Celibataire" class="selecteur">
							<label for="radio14">Celibataire</label>
						</span>
						<span>
							<input name="situation" id="radio24" type="radio" value="Maries sans contrat" class="selecteur">
							<label for="radio24">Maries sans contrat</label>
						</span>
						<span>
							<input name="situation" id="radio34" type="radio" value="Maries separation Biens" class="selecteur">
							<label for="radio34">Maries separation Biens</label>
						</span>
						<span>
							<input name="situation" id="radio44" type="radio" value="Pacs" class="selecteur">
							<label for="radio44">Pacs</label>
						</span>
						<span>
							<input name="situation" id="radio54" type="radio" value="Union libre" class="selecteur">
							<label for="radio54">Union libre</label>
						</span>
						<span>
							<input name="situation" id="radio64" type="radio" value="Divorce" class="selecteur">
							<label for="radio64">Divorce</label>
						</span>
						<span>
							<input name="situation" id="radio74" type="radio" value="Veuf" class="selecteur">
							<label for="radio74">Veuf</label>
						</span>
				</div>

				<div id="remplir">
					<label for="enfants">Nombre enfants à charges</label>
						<span>
							<input name="enfants" id="radio15" type="radio" value="0" class="selecteur">
							<label for="radio15">0</label>
						</span>
						<span>
							<input name="enfants" id="radio25" type="radio" value="1" class="selecteur">
							<label for="radio25">1</label>
						</span>
						<span>
							<input name="enfants" id="radio35" type="radio" value="2" class="selecteur">
							<label for="radio35">2</label>
						</span>
						<span>
							<input name="enfants" id="radio45" type="radio" value="3" class="selecteur">
							<label for="radio45">3</label>
						</span>
						<span>
							<input name="enfants" id="radio55" type="radio" value="4" class="selecteur">
							<label for="radio55">4</label>
						</span>
						<span>
							<input name="enfants" id="radio65" type="radio" value="5" class="selecteur">
							<label for="radio65">5</label>
						</span>
						<span>
							<input name="enfants" id="radio75" type="radio" value="6 et +" class="selecteur">
							<label for="radio75">6 et +</label>
						</span>
				</div>
                <br><br> 
                <div class="conjoint" style="display:none;">
                    <span> <b>Votre conjoint</b><br></span>
                    <label for="civiliteConjoint">Civilité </label>
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
					<br>
                    <label for="prenomConjoint"> Prénom</label>
                    <input id="prenomConjoint" name="prenomConjoint"  class="chaine" type="text" />
					<br>
                    <label for="dateNaissanceConjoint">Date de naissance</label>
                    <input id="dateNaissanceConjoint" type="date" name="dateNaissanceConjoint" />
                </div>
            </fieldset>
            <fieldset>
            <legend>Coordonnées</legend>
			<div id="remplir">
                <label for="tel">Téléphone portable</label>
                <input id="tel" name="tel" type="text"  class="nombre" />
			</div>
			<div id="remplir">
                <label for="adresse">Adresse</label>
                <input id="adresse" name="adresse"  class="chaine" type="text" />
			</div>
			<div id="remplir">
                <label for="codePostal">Code postal</label>
                <input id="codePostal" class="chaine" type="text" name="codePostal"/>
			</div>
			<div id="remplir">
                <label for="ville">Ville</label>
                <input id="ville" name="ville"  class="chaine" type="text" />
			</div>
            </fieldset>


            <fieldset>
                <legend>Profession</legend>
				<div id="remplir">
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
				</div>
				<div id="remplir">
					<label for="revenus">Revenus mensuel</label>
					<input id="revenus" class="nombre" type="text" name="revenus" />€
				</div>
				<div id="remplir">
					<label for="anciennete">Votre ancienneté</label>
					<input id="anciennete" class="nombre" type="text" name="anciennete"/>mois 
				</div>
				<div id="remplir">
					<label for="revenusImposable">Revenus imposable</label>
					<input id="revenusImposable" class="nombre" type="text"name="revenusImposable" />€ 
				</div>
                <br />    
                <br />    
                <button  type="button" id="creerReven">Ajouter un autre revenus</button>

                <div id="AddRevenus">

                </div>

                <br> <br> <br>
                <div class="conjoint" style="display:none;">
                <span> <b>Votre conjoint</b><br></span>
					<div id="remplir">
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
					</div>
					<br>
					<div id="remplir">
						<label for="revenusConjoint">Revenus mensuel</label>
						<input id="revenusConjoint" type="text" name="revenusConjoint"/>
					</div>
					<br>
					<div id="remplir">
						<label for="ancienneteConjoint">Votre ancienneté</label>
						<input id="ancienneteConjoint" type="text" name="ancienneteConjoint" />
					</div>
					<br>
					<div id="remplir">
						<label for="revenusImpConjoint">Revenus imposable</label>
						<input id="revenusImpConjoint" class="nombre" type="text" name="revenusImpConjoint" />
					</div>
                </div>
            </fieldset>


            <fieldset>
            <legend>Banque</legend>
			<div id="remplir">
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
			</div>
			<div id="remplir">
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
			</div>
            </fieldset>


            <fieldset>
			
                <legend>Charges</legend>
				<div id="remplir">
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
				</div>
				<div id="remplir">
					<label for="mensualite">Mensualié:</label>
					<input id="mensualite"name="mensualite" class="nombre" type="text" /> €                
				</div>
				<div id="remplir">
					<label for="dureeRest">Date de fin</label>
					<input id="dureeRest"  class="nombre" name="dureeRest" type="text" />mois  
				</div>
				<div id="remplir">
					<div class="rachatPretConso">
						<label for="capitalRestDu">capital restant du:</label>
						<input id="capitalRestDu"name="capitalRestDu" class="nombre" type="text" /> €  
					</div>
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
            <p>Cette adresse mail existe déjà, veuillez vous connecter à votre compte en cliquant<a href="https://ssl14.ovh.net/~ecourtie/bkpe/membre/index.php" target="_blank"> ici</a> </p>
        </div>
        <div id="erreurNonRemplie" class="alert alert-danger alert-dismissible fade in" role="alert" style="width:100%; display: none;">
          <p>Champ obligatoire non remplie. :</p>
        </div>
        <div id="erreurNombre" class="alert alert-danger alert-dismissible fade in" role="alert" style="width:100%; display: none;">
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
<script type="text/javascript" src="formTowizard.js"></script>
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