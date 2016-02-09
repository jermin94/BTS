<?php


require('fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    //$this->Image('./images/e_courtier.jpg',10,4,35);
	$this->Image('./images/e_courtier.jpg',10,4,35);
    // Police Arial gras 15
    //$this->SetFont('Arial','B',15);
	$this->SetFont('Arial','',10);
	
	//$this->SetTextColor( 0 ,  110,  33) ;
	
    // Décalage à droite
    $this->Cell(80);
    // Titre
   
	$this->Ln(3);
	$this->Cell(80);
	
	$this->Ln(3);
	$this->Cell(80);
	
	$this->Ln(7);
	$this->Cell(100);
	
	$titytime = time() ;
	$titatatime = date("d m Y", "$titytime");
	$this->Cell(0,0,' ',0,0,'L');
	
	
	
	
}



// Tableau amélioré
function ImprovedTable($header, $data)
{
    // Largeurs des colonnes
    $w = array(40, 35, 45, 40, 40, 40);
    // En-tête
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2],0,',',' '),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3],0,',',' '),'LR',0,'R');
        $this->Ln();
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}




// Tableau amélioré bkpe
function ImprovedTableBkpe($header, $data)
{
    // Largeurs des colonnes
    $w = array(80, 80);
	// En-tête
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],'LTR',0,'L');
    $this->Ln();
    // Données
    foreach($data as $row)
    {
	$this->Cell(10);
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        
        $this->Ln();
    }
    // Trait de terminaison
	$this->Cell(10);
    $this->Cell(array_sum($w),0,'','T');
}
//******
}






// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->SetTextColor( 0 ,  0,  0) ;
//for($i=1;$i<=40;$i++)
 //   $pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 $pdf->SetFont('Arial','',15);
 $pdf->Ln(0);
 $pdf->Cell(0,0,"Lettre d'Entree en Relation - Informations Préalable",0,0,'L');
  $pdf->SetFont('Arial','',10);
 $pdf->Ln(4);
 $pdf->Cell(0,0," ",0,0,'L');
  
  
  
  
  $pdf->SetFont('Arial','B',8);
 $pdf->Ln(5);
 $pdf->Cell(0,0,"Présentation de la société",0,0,'L');
  
  
   $pdf->SetFont('Arial','',8);
 $pdf->Ln(5);
 $pdf->Cell(0,0,"SARL au capital de 5000 € enregistrée au registre du commerce et des sociétés de Douai sous le numéro 539 330 480.
100% du capital appartient",0,0,'L');
 $pdf->Ln(5);
 $pdf->Cell(0,0,"à E-Courtier, aucune autre entreprise d'assurance et de crédit ne détient des parts de participation du capital de E-Courtier. 
 ",0,0,'L');
 
  $pdf->Ln(5);
 $pdf->Cell(0,0,"De même, E-Courtier ne détient pas de parts de participation d'une entreprise d'assurances ou de crédit.
 ",0,0,'L');
 
  $pdf->Ln(5);
 $pdf->Cell(3,0,"E-Courtier n'est pas soumis à un lien d'exclusivité avec une ou plusieurs sociétés d'assurances et établissements de crédits.
E-Courtier déclare fonder ",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(0,0,"ses conseils sur une analyse des différents produits commercialisés. Le client peut demander à connaître le ou les noms des sociétés.
N°TVA  ",0,0,'L');
 $pdf->Ln(5);
 $pdf->Cell(3,0,"intracommunautaire : FR24539330480. 
Siège social : 22 bis rue d'Arras 59400 CAMBRAI. Tél. 09.50.45.28.98
Gérant : Thierry Lemaire. ",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"CIF, membre de l'Association Nationale des Conseils Financiers (ANACOFI) sous le n°E002953
Carte professionnelle Préfecture de Lille n°2258T",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"Enregistrée auprès de l'Autorité des Marchés Financiers (AMF)
ORIAS : courtier en opérations de banque et services de paiement & en assurance,",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"immatriculé sous le N°ORIAS 12 065 429. Vous pouvez consulter nos informations sur le site www.orias.fr.
La société est soumise au contrôle de ",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(3,0,"l'Autorité de Contrôle Prudentiel et de Résolution (ACPR), 61 rue Taitbout, 75436 Paris Cédex 09 - Téléphone : 01 49 95 40 00 - Site internet : 
",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(3,0,"www.acpr.banque-france.fr.  
RCP Assurances Chartis : 2.401.395 pour un montant de 2.000.000 euros
  ",0,0,'L'); 


$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);
 $pdf->Cell(3,0,"
LOI INFORMATIQUE ET LIBERTE ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);
$pdf->Ln(5);
 $pdf->Cell(3,0,"Conformément aux dispositions de la loi n°78-17 du 6 janvier 1978 (loi relative à l’informatique, aux fichiers et aux libertés), vos données  ",0,0,'L'); 

$pdf->Ln(5);
 $pdf->Cell(3,0,"feront l'objet d’un traitement informatique nécessaire et indispensable pour l’étude de votre dossier et la mise en place d’un financement.
  ",0,0,'L'); 
  
 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous disposez d’un droit d’accès, de rectification, de suppression sur les données vous concernant dont E-Courtier et ses partenaires sont destinataires. 
 ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez également vous opposer, sans frais, à l’utilisation de vos données à des fins de prospection commerciale.
Pour cela, il vous

 ",0,0,'L'); 
 
  $pdf->Ln(5);
 $pdf->Cell(3,0,"suffit de nous écrire à l'adresse : E-COURTIER, 22 bis rue d'Arras 59400 CAMBRAI, ou d’envoyer un mail sur l'adresse : serviceclient@e-courtier.fr

  ",0,0,'L'); 
 
	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
SERVICE CLIENT ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez adresser vos remarques et réclamations par courrier à l’adresse suivante : E-COURTIER SARL, 22 bis rue d'Arras 59400 CAMBRAI. Vous
  ",0,0,'L'); 

 $pdf->Ln(5);
 $pdf->Cell(3,0,"recevrez un accusé de réception sous 10 jours à compter de la réception de votre courrier.
Une réponse vous sera apportée dans un délai de deux mois.

	  ",0,0,'L'); 
	  
	  
	 	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
INFORMATIONS COMPLEMENTAIRES ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Seuls nos partenaires bancaires peuvent décider de l’octroi d’un financement après l’étude et l’acceptation définitive de votre dossier.
 ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Seuls nos  partenaires assureurs peuvent décider de l'octroi d'une assurance après acception définitive de votre dossier.
Dans le cadre d'une
 ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"opération de regroupement de crédits, la diminution du montant des mensualités entraîne l'allongement de la durée de remboursement et majore
 ",0,0,'L'); 
 
 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"le coût total du crédit. La réduction dépend de la durée restante des prêts rachetés.
Pour tout financement relevant du régime de la loi n°2010-737 du ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"1er juillet 2010, vous disposez d’un délai de rétractation de 14 jours à compter de la signature du contrat de crédit. Pour un financement relevant du  ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"régime de la loi n°79- 596 du 13 juillet 1979, vous disposez d’un délai de réflexion de 10 jours à compter de la réception du contrat de crédit.  ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Nous vous rappelons qu’une lecture attentive des conditions générales et particulières de crédit et de l’assurance est indispensable. 
 
	  
 ",0,0,'L'); 	  
	 
	 	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
RÉMUNÉRATION DU PROFESSIONNEL ",0,0,'L'); 

 
	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l'Assurance-vie et les Placements financiers : 
",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller est rémunéré par la totalité des frais d’entrée déduction faite de la part acquise à la société qui l’autorise à commercialiser le produit,
",0,0,'L'); 

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"auxquels s’ajoutent une fraction des frais de gestion. La fraction des frais de gestion dont le professionnel est le bénéficiaire est de 50% de ceux-ci.
",0,0,'L'); 

	
	$pdf->SetFont('Arial','B',8);
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l’activité Intermédiaire en Opérations de Banque :
",0,0,'L'); 

	$pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller perçoit une commission de 1% plafonnée généralement à 1.500 euros par les établissements bancaires. Des honoraires plafonnés à
",0,0,'L'); 

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"2.000€ HT sont à verser par le client pour les dossiers d'acquisition, de rachats, réaménagements et pour les dossiers de prêts en investissements locatifs,
",0,0,'L'); 

	 $pdf->Ln(5);
 $pdf->Cell(3,0,"prêt pour un professionnel et TNS. Ces dossiers complexes et ou en SCI nécessitent un devis préalable sur-mesure.
En cas de renonciation sans",0,0,'L'); 

	 $pdf->Ln(5);
 $pdf->Cell(3,0,"motif ou si la banque du client propose une offre à coût identique à l'offre obtenue par E-Courtier.fr, le client s'expose à 1.500 euros d'honoraires.
	  
	",0,0,'L'); 
	
	$pdf->SetFont('Arial','B',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l’activité de mandataire en acquisition d’immobilier ou de parts de SCI :
",0,0,'L'); 

 
 
 $pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller perçoit une rémunération comprise entre 2.5 et 8% du prix d’acquisition hors frais de notaire. Montant inclus dans le prix d’achat. Le détail",0,0,'L'); 
	 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"de la rémunération du conseiller par commissions, agissant en tant qu’intermédiaire, peut être obtenu par le client en s’adressant à la société qui 
	 ",0,0,'L'); 
	 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"autorise la commercialisation par le conseiller de ses produits. Le conseiller s'engage à assister le client dans l’obtention de ces informations. 
	 
	 ",0,0,'L'); 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
	 
	 
	 
	 	$pdf->SetFont('Arial','B',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
Assurance : ",0,0,'L'); 

	 	$pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Nous sommes Intermédiaires en Assurances, immatriculés auprès de l'Orias et exerçant sous le statuts de Courtier. Vous pouvez
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"retrouver ces informations sur le site de l'Orias à l'adresse : www.orias.fr. Notre Cabinet exerce selon les dispositions prévues à
 
 ",0,0,'L'); 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"l'article L 520-1-II b du code des Assurances, c'est à dire que nos propositions sont issues du catalogue produits des organismes assureurs partenaires
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"de notre cabinet. Vous pouvez obtenir leur nom sur simple demande. Notre Cabinet exerce selon les dispositions prévues à l'article L 520-1-II c du
 
 ",0,0,'L'); 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"code des Assurances, c'est à dire que notre proposition est issue d'une étude comparative des contrats proposés sur le marché. 
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez obtenir leur nom sur simple demande.
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Notre Cabinet ne détient pas d'actions, de parts de capital social ou de droits de vote d'une compagnie d'assurance ou de ses filiales.
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
	 	$pdf->SetFont('Arial','B',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
	PARTENAIRES",0,0,'L'); 
	
	 	$pdf->SetFont('Arial','',7);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Bouygues Immobilier*, Cérénicimo, cédif, Direct Produit*, Vinci Immobilier, Axa Théma*, Générali, Swisslife*, Primonial*, Vie Plus, Aerios , Axa Banque,

",0,0,'L'); 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"BNP*, Caisse d’Epargne*, CIC*, Crédit du Nord*, April*, Autofirst, Groupama PJ, Groupe Zephir, Insured, Solly Azar*, Calao, Inocap*, OTC",0,0,'L'); 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"*Liste des Partenaires et fournisseurs représentant au moins 10% du Chiffre d’Affaires. liste complète sur demande

	",0,0,'L'); 
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
	",0,0,'L'); 
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
	",0,0,'L'); 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
	",0,0,'L'); 
	
	$pdf->SetFont('Arial','B',9);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"UN CREDIT VOUS ENGAGE ET DOIT ETRE REMBOURSE.",0,0,'L'); 
	
	$pdf->SetFont('Arial','B',9);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"VERIFIEZ VOS CAPACITES DE REMBOURSEMENT AVANT DE VOUS ENGAGER.",0,0,'L'); 
	
	$pdf->SetFont('Arial','B',9);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"AUCUN VERSEMENT, DE QUELQUE NATURE QUE CE SOIT, NE PEUT ÊTRE EXIGÉ D'UN PARTICULIER,",0,0,'L'); 

$pdf->SetFont('Arial','B',9);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"AVANT L'OBTENTION DEFINITIVE D'UN OU PLUSIEURS PRÊTS D'ARGENT. ",0,0,'L'); 
	
	
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 	


$titime = time() ;
$tititime = date("dmY", "$titime");
$titatime = date("d m Y", "$titime");
//$nom_fichier = "./output/".$tititime."-".$numero_visite_calcule.$titime.".pdf" ;


	
//******* tableau de fin de page  début ******
//********************************************


$pdf->SetFont('Arial','',12);
$pdf->Ln(15);
$pdf->Cell(10);
$header= array(' Le client / Mandant', ' Le conseiller / E-courtier.fr');	
$data= array(array(' Date : '.$titatatime,' Date : '.$titatatime), array(' Signature : ',' Signature : '), '','','');	
	 
$pdf->ImprovedTableBkpe($header,$data);	
	
//******* tableau de fin de page  fin ******
//********************************************	
	

 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 
 

	   $pdf->SetFont('Arial','',8);
 $pdf->Ln(4);
 $pdf->Cell(0,0,"Document 
 établi pour : $m_mme_mlle $nom $prenom - Id :$id par $nom_11 "
 
 ,0,0,'L');
 
//******* tableau de fin de page  fin ******
//********************************************	
	


$nom_fichier = "../membre/upload_france_fr/".$tititime."-".$numero_visite_calcule.$titime.".pdf" ;
	
$pdf->Output($nom_fichier, 'F');

sleep(2);
//$pdf->Output($nom_fichier, 'D');
//$pdf->Output($nom_fichier, 'I');

?>
<!-- <IFRAME src="http://www.guides1815.org/admin_guides_bkpe/output/<?php echo  $nom_fichier  ;  ?>" 
width=800 height=500 scrolling=yes frameborder=1 > </IFRAME> -->

<IFRAME src="<?php echo  $nom_fichier  ;  ?>" 
width=800 height=1200 scrolling=yes frameborder=1 > </IFRAME>
<br/>
<br/>
<?php
	
//$pdf->Output();

//exit() ;

?>