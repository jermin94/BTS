$idd=<?php echo $id ?> - 
 <a href="./gestion_dossier.php"> &nbsp;&nbsp;&nbsp;&nbsp;
 
 <img  class="cli4" src='../images/logo_header_petit.gif'>&nbsp;Gerer les Dossier en cours</a><br><br>
 
 
	<?php
//////////////////////////////////////////////////////////////////////connexion   
try{
    $bdd = new PDO('', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


///////////////////////////////////////récupération id_client par email controle
try {
    $req = $bdd->prepare("SELECT * FROM dossiers_bkpe WHERE ( id = '$id' ) ");
    $req->bindParam(':email', $email_controle);
    $req->execute();
    $reslt1 = $req->fetch();
    $id_client = $reslt1['id_client'];
    $idc = $reslt1['id_client'];
	$id_Partenaire = $reslt1['id_partenaire'];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

try {
    $req = $bdd->prepare("SELECT * FROM partenaires WHERE ( id = '$id_Partenaire' ) ");
    $req->execute();
    $reslt3 = $req->fetch();
    $NomPartenaire = $reslt3['nom'];
    $PrenomPartenaire = $reslt3['prenom'];
	$TelPartenaire = $reslt3['tel1'];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

try {
    $req = $bdd->prepare(" SELECT * FROM clients  WHERE (id= '$idc') ");
    $req->bindParam(':email', $email_controle);
    $req->execute();
    $reslt = $req->fetch();
    $id_partenaire =$reslt['id_partenaire'];
    $prenom =$reslt['prenom'];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}


try {
    $req = $bdd->prepare(" SELECT * FROM clients_profil_bkpe WHERE (id_client= '$idc') ");
    $req->bindParam(':email', $email_controle);
    $req->execute();
    $reslt2 = $req->fetch();
    $id_partenaire =$reslt['id_partenaire'];
} catch (Exception $ex) {
    die('Erreur : ' . $ex->getMessage());
}

$dat_jour = date('d/m/Y');

?>



<style type="text/css">
	#text_ifr {
    height : 1000px !important;
}


</style>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>

<script type="text/javascript">
tinymce.init({
    selector: "textarea"
    // plugins:"table"
 });
</script>

<!-- Place this in the body of the page content -->
<div id="bombi">
<form id="form" method="post" action="../controler/rachatMail.php">
	
		<textarea name="text"><div id="div1">
<div> <p class="MsoNormal"><span style="font-size:7.5pt">
<br />Demande de Simulation du <?php echo $dat_jour ?> realisee par <?php echo $PrenomPartenaire ?> 
<?php echo $NomPartenaire ?>  <?php echo $TelPartenaire ?>  <br />
E-Courtier.fr siege :  09.50.45.28.98 </div></br>
<div> </div>

<div> </div>Demande <b>  <?php echo $reslt1['achat'] ?> </b>pour :

<span style="font-size:16.0pt;color:#ff6a00">  <?php echo $reslt['nom'].' '.$reslt['prenom'] ?> </span>

<div> </div><div> </div>

<div><p class="MsoNormal">Urgence du dossier : <?php echo $reslt1['delai'] ?></p></div>

<div><p class="MsoNormal">Montant des frais de courtage : <?php echo $reslt1['prix'] ?></p></div>

<div><p class="MsoNormal">Duree du financement :</p></div>

<div><p class="MsoNormal">ADI :</p></div>

<div><p class="MsoNormal">Apport : <?php echo $reslt1['apport'] ?></p></div>

<div><p class="MsoNormal"><span style="font-size:9.5pt">Banque principale =  <?php echo $reslt2['banque1'] ?>  </span></p></div>

<div><p class="MsoNormal"><span style="font-size:9.5pt">Banque secondaire = <?php echo $reslt2['banque2'] ?></span></p></div>

<div><p class="MsoNormal"><span style="font-size:9.5pt">Si proprietaire, valeur actuelle du bien : <?php echo $reslt2['estimationBienActuel'] ?></span></p></div>

<div><p class="MsoNormal"><span style="font-size:9.5pt">Acceptation changement domiciliation : oui</span></p></div>
<div> </div><div> </div>

<span style="font-size:16.0pt;color:#ff6a00"><b>Etat civil </span>

<table>
   <tr> <p class="MsoNormal"><span style="font-size:9.5pt">
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Titre</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['m_mme_mlle'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['titre2'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Nom</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['nom'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['Nom2'] ?> <?php echo $reslt2['nomJeuneFille'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Prenom</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['prenom'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['Prenom2'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Date Naissance&nbsp;</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['date_naissance_mr'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['date_naissance_mme'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Adresse</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['adresse'] ?> <?php echo $reslt['code_postal'].' '.$reslt['ville'] ?></td>
       <td></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Telephone</th>
       <td><p class="MsoNormal"><span style="font-size:11pt">&nbsp;<?php echo $reslt['tel'].' '.$reslt['portable'] ?></td>
       <td></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">E-mail</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['email'] ?></td>
       <td></td>
   </tr>
</table>

<div><p class="MsoNormal">R&eacute;gime Matrimonial : <?php echo $reslt2['sit_patrimoniale'] ?></p></div>

<div><p class="MsoNormal">Nombre enfants : <?php echo $reslt2['enfant'] ?></p></div>
<div><p class="MsoNormal">&nbsp;</p></div>




<div><p class="MsoNormal"><b>

<span style="font-size:16.0pt;color:#ff6a00">Profession et Revenus</span></b></p></div>
<div><p class="MsoNormal">&nbsp;</p></div><div>
<table>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Titre</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['m_mme_mlle'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['titre2'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['nom'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['Nom2'] ?> <?php echo $reslt2['nomJeuneFille'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Pr&eacute;nom</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt['prenom'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['Prenom2'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type Contrat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['type_revenu_mr'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['type_revenu_mme'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Anciennet&eacute;</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['ancien1'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['ancien2'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Salaire</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['montant_revenu_mr'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['montant_revenu_mme'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">IR d&eacute;clar&eacute;</th>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['impot1'] ?></td>
       <td><p class="MsoNormal"><span style="font-size:9.5pt">&nbsp;<?php echo $reslt2['impot2'] ?></td>
   </tr>
   <tr>
       <th><p class="MsoNormal"><span style="font-size:9.5pt">Fonction</th>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
   </tr>
</table> 

<div><p class="MsoNormal"><p class="MsoNormal"><span style="font-size:9.5pt">Autres Revenus = <?php echo $reslt2['autresRevenus1'] ?> - <?php echo $reslt2['autresRevenus2'] ?>  - <?php echo $reslt2['autresRevenus3'] ?> - <?php echo $reslt2['autresRevenus4'] ?> </p></div>

<div><p class="MsoNormal">&nbsp;</p></div>
<div><p class="MsoNormal"><b><span style="font-size:14.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#1f497d">
<span style="font-size:16.0pt;color:#ff6a00"><b>
Charges :</span></b></p></div>

<div><p class="MsoNormal"> <?php echo $reslt2['chargesIntitule'] ?> : <?php echo $reslt2['chargesMontant'] ?> &nbsp;&nbsp;&nbsp; CRD : <?php echo $reslt2['ChargesCrd'] ?> &nbsp;&nbsp; &nbsp; Date de fin : <?php echo $reslt2['ChargesFin'] ?><span style="font-size:9.5pt"> </span></a></p></div>
<div><p class="MsoNormal"> Autres charges : <?php echo $reslt2['autresCharges1'] ?><span style="font-size:9.5pt"> </span></a></p></div>
<div><p class="MsoNormal"> <?php echo $reslt2['autresCharges2'] ?><span style="font-size:9.5pt"> </span></a></p></div>
<div><p class="MsoNormal"><?php echo $reslt2['autresCharges3'] ?> <?php echo $reslt2['autresCharges4'] ?> <?php echo $reslt2['autresCharges5'] ?><span style="font-size:9.5pt"> </span></a><u></u><u></u></p></div>



<div><p class="MsoNormal"><u></u>&nbsp;<u></u></p></div><div><p class="MsoNormal"><b>
<span style="font-size:16.0pt;color:#ff6a00"><b>Montage financier</span></b><u></u><u></u></p></div><div><p class="MsoNormal"><u></u>&nbsp;<u></u></p></div><div><p class="MsoNormal">
<table border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;border:none;width:400px">
<tbody><tr style="height:15.0pt"><td nowrap="" colspan="3" style="border:solid gray 1.0pt;border-right:inset 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="center" style="text-align:center"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#ff6600">Depenses du Projet :
<u></u><u></u></span></p></td></tr>
<tr style="height:15.0pt"><td nowrap="" colspan="2" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:white">Acquisition :<u></u><u></u></span></p></td>
<td nowrap="" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:white"><?php echo $reslt1['invest'] ?> e <u></u><u></u></span></p></td></tr><tr style="height:15.0pt">
<td nowrap="" colspan="2" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">Agence<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right">
<span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696"><?php echo $reslt1['agence'] ?> e<u></u><u></u></span></p></td></tr>
<tr style="height:15.0pt"><td nowrap="" colspan="2" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">Travaux / Construction</span></p></td>
<td nowrap="" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696"><?php echo $reslt1['travaux'] ?> e<u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td nowrap="" colspan="2" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right">
<span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">Frais notaire :<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696"><?php echo $reslt1['notaire'] ?> e <u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:solid gray 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-right-color:transparent"></td>
<td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:white">Autres :<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:white">- e <u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:solid gray 1.0pt;border-right:inset 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:black">sous total :<u></u><u></u></span></p></td>
<td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;background:#969696;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:black"> e <u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:inset 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td valign="bottom" style="border-top:none;border-left:none;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td valign="bottom" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"></td></tr><tr style="height:15.0pt"><td colspan="2" valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td valign="bottom" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"></td></tr><tr style="height:15.0pt"><td nowrap="" colspan="2" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">
Frais de garantie :<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696"> e <u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td nowrap="" colspan="2" style="border:solid gray 1.0pt;border-top:none;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">
Frais de courtage :<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:#969696">900 e<u></u><u></u></span></p></td></tr><tr style="height:15.0pt"><td valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:inset 1.0pt;border-right:inset 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td valign="bottom" style="border-top:none;border-left:none;border-bottom:inset 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td valign="bottom" style="border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt;border-bottom-color:transparent"></td></tr><tr style="height:15.0pt"><td valign="bottom" style="border-top:none;border-left:solid gray 1.0pt;border-bottom:solid gray 1.0pt;border-right:inset 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="right" style="text-align:right"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;color:black">
Total operation :<u></u><u></u></span></p></td><td nowrap="" style="border-top:none;border-left:none;border-bottom:solid gray 1.0pt;border-right:solid gray 1.0pt;background:silver;padding:0cm 2.25pt 0cm 2.25pt;height:15.0pt"><p class="MsoNormal" align="center" style="text-align:center"><span style="font-size:11.0pt;font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"> e<u></u><u></u></span></p></td></tr></tbody></table></div><div><div><div><div><p class="MsoNormal"><u></u>&nbsp;<u></u></p></div>


<div><p class="MsoNormal"><span style="font-size:9.5pt">Dans l'attente de votre proposition,</span></p></div></div>
</div></div></div></div><div class="yj6qo"></div><div id=":q2" class="ii gt undefined" style="display:none"><div id=":ma" class="a3s" style="overflow: hidden;"></div></div><div class="hi"></div><div class="ajx"></div>
    </textarea>

	<input id="SaveAccount" type="submit" value="Envoyer" class="btn btn-success" />
	
	<button onclick="printContent('form')">Imprimer le document</button>
	
</form>
</div>