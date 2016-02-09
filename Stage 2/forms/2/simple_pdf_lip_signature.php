<?php


require('fpdf.php');

class PDF extends FPDF
{
// En-t�te
function Header()
{
    // Logo
    //$this->Image('./images/e_courtier.jpg',10,4,35);
	$this->Image('./images/e_courtier.jpg',10,4,35);
    // Police Arial gras 15
    //$this->SetFont('Arial','B',15);
	$this->SetFont('Arial','',10);
	
	//$this->SetTextColor( 0 ,  110,  33) ;
	
    // D�calage � droite
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



// Tableau am�lior�
function ImprovedTable($header, $data)
{
    // Largeurs des colonnes
    $w = array(40, 35, 45, 40, 40, 40);
    // En-t�te
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Donn�es
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




// Tableau am�lior� bkpe
function ImprovedTableBkpe($header, $data)
{
    // Largeurs des colonnes
    $w = array(80, 80);
	// En-t�te
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],'LTR',0,'L');
    $this->Ln();
    // Donn�es
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






// Instanciation de la classe d�riv�e
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->SetTextColor( 0 ,  0,  0) ;
//for($i=1;$i<=40;$i++)
 //   $pdf->Cell(0,10,'Impression de la ligne num�ro '.$i,0,1);
 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
 
 $pdf->SetFont('Arial','',15);
 $pdf->Ln(0);
 $pdf->Cell(0,0,"Lettre d'Entree en Relation - Informations Pr�alable",0,0,'L');
  $pdf->SetFont('Arial','',10);
 $pdf->Ln(4);
 $pdf->Cell(0,0," ",0,0,'L');
  
  
  
  
  $pdf->SetFont('Arial','B',8);
 $pdf->Ln(5);
 $pdf->Cell(0,0,"Pr�sentation de la soci�t�",0,0,'L');
  
  
   $pdf->SetFont('Arial','',8);
 $pdf->Ln(5);
 $pdf->Cell(0,0,"SARL au capital de 5000 � enregistr�e au registre du commerce et des soci�t�s de Douai sous le num�ro 539 330 480.
100% du capital appartient",0,0,'L');
 $pdf->Ln(5);
 $pdf->Cell(0,0,"� E-Courtier, aucune autre entreprise d'assurance et de cr�dit ne d�tient des parts de participation du capital de E-Courtier. 
 ",0,0,'L');
 
  $pdf->Ln(5);
 $pdf->Cell(0,0,"De m�me, E-Courtier ne d�tient pas de parts de participation d'une entreprise d'assurances ou de cr�dit.
 ",0,0,'L');
 
  $pdf->Ln(5);
 $pdf->Cell(3,0,"E-Courtier n'est pas soumis � un lien d'exclusivit� avec une ou plusieurs soci�t�s d'assurances et �tablissements de cr�dits.
E-Courtier d�clare fonder ",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(0,0,"ses conseils sur une analyse des diff�rents produits commercialis�s. Le client peut demander � conna�tre le ou les noms des soci�t�s.
N�TVA  ",0,0,'L');
 $pdf->Ln(5);
 $pdf->Cell(3,0,"intracommunautaire�: FR24539330480. 
Si�ge social : 22 bis rue d'Arras 59400 CAMBRAI. T�l. 09.50.45.28.98
G�rant�: Thierry Lemaire. ",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"CIF, membre de l'Association Nationale des Conseils Financiers (ANACOFI) sous le n�E002953
Carte professionnelle Pr�fecture de Lille n�2258T",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"Enregistr�e aupr�s de l'Autorit� des March�s Financiers (AMF)
ORIAS : courtier en op�rations de banque et services de paiement & en assurance,",0,0,'L');

 $pdf->Ln(5);
 $pdf->Cell(3,0,"immatricul� sous le N�ORIAS 12 065 429. Vous pouvez consulter nos informations sur le site www.orias.fr.
La soci�t� est soumise au contr�le de ",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(3,0,"l'Autorit� de Contr�le Prudentiel et de R�solution (ACPR), 61 rue Taitbout, 75436 Paris C�dex 09 - T�l�phone : 01 49 95 40 00 - Site internet : 
",0,0,'L');

$pdf->Ln(5);
 $pdf->Cell(3,0,"www.acpr.banque-france.fr.  
RCP Assurances Chartis�: 2.401.395 pour un montant de 2.000.000 euros
  ",0,0,'L'); 


$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);
 $pdf->Cell(3,0,"
LOI INFORMATIQUE ET LIBERTE ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);
$pdf->Ln(5);
 $pdf->Cell(3,0,"Conform�ment aux dispositions de la loi n�78-17 du 6 janvier 1978 (loi relative � l�informatique, aux fichiers et aux libert�s), vos donn�es  ",0,0,'L'); 

$pdf->Ln(5);
 $pdf->Cell(3,0,"feront l'objet d�un traitement informatique n�cessaire et indispensable pour l��tude de votre dossier et la mise en place d�un financement.
  ",0,0,'L'); 
  
 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous disposez d�un droit d�acc�s, de rectification, de suppression sur les donn�es vous concernant dont E-Courtier et ses partenaires sont destinataires. 
 ",0,0,'L'); 
 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez �galement vous opposer, sans frais, � l�utilisation de vos donn�es � des fins de prospection commerciale.
Pour cela, il vous

 ",0,0,'L'); 
 
  $pdf->Ln(5);
 $pdf->Cell(3,0,"suffit de nous �crire � l'adresse : E-COURTIER, 22 bis rue d'Arras 59400 CAMBRAI, ou d�envoyer un mail sur l'adresse : serviceclient@e-courtier.fr

  ",0,0,'L'); 
 
	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
SERVICE CLIENT ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez adresser vos remarques et r�clamations par courrier � l�adresse suivante : E-COURTIER SARL, 22 bis rue d'Arras 59400 CAMBRAI. Vous
  ",0,0,'L'); 

 $pdf->Ln(5);
 $pdf->Cell(3,0,"recevrez un accus� de r�ception sous 10 jours � compter de la r�ception de votre courrier.
Une r�ponse vous sera apport�e dans un d�lai de deux mois.

	  ",0,0,'L'); 
	  
	  
	 	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
INFORMATIONS COMPLEMENTAIRES ",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Seuls nos partenaires bancaires peuvent d�cider de l�octroi d�un financement apr�s l��tude et l�acceptation d�finitive de votre dossier.
 ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Seuls nos  partenaires assureurs peuvent d�cider de l'octroi d'une assurance apr�s acception d�finitive de votre dossier.
Dans le cadre d'une
 ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"op�ration de regroupement de cr�dits, la diminution du montant des mensualit�s entra�ne l'allongement de la dur�e de remboursement et majore
 ",0,0,'L'); 
 
 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"le co�t total du cr�dit. La r�duction d�pend de la dur�e restante des pr�ts rachet�s.
Pour tout financement relevant du r�gime de la loi n�2010-737 du ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"1er juillet 2010, vous disposez d�un d�lai de r�tractation de 14 jours � compter de la signature du contrat de cr�dit. Pour un financement relevant du  ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"r�gime de la loi n�79- 596 du 13 juillet 1979, vous disposez d�un d�lai de r�flexion de 10 jours � compter de la r�ception du contrat de cr�dit.  ",0,0,'L'); 


	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Nous vous rappelons qu�une lecture attentive des conditions g�n�rales et particuli�res de cr�dit et de l�assurance est indispensable. 
 
	  
 ",0,0,'L'); 	  
	 
	 	
	
$pdf->Ln(5);
 $pdf->Cell(3,0," ",0,0,'L'); 


  $pdf->SetFont('Arial','B',8);
$pdf->Ln(5);

 $pdf->Cell(3,0,"
R�MUN�RATION DU PROFESSIONNEL ",0,0,'L'); 

 
	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l'Assurance-vie et les Placements financiers : 
",0,0,'L'); 

  $pdf->SetFont('Arial','',8);

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller est r�mun�r� par la totalit� des frais d�entr�e d�duction faite de la part acquise � la soci�t� qui l�autorise � commercialiser le produit,
",0,0,'L'); 

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"auxquels s�ajoutent une fraction des frais de gestion. La fraction des frais de gestion dont le professionnel est le b�n�ficiaire est de 50% de ceux-ci.
",0,0,'L'); 

	
	$pdf->SetFont('Arial','B',8);
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l�activit� Interm�diaire en Op�rations de Banque :
",0,0,'L'); 

	$pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller per�oit une commission de 1% plafonn�e g�n�ralement � 1.500 euros par les �tablissements bancaires. Des honoraires plafonn�s �
",0,0,'L'); 

	
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"2.000� HT sont � verser par le client pour les dossiers d'acquisition, de rachats, r�am�nagements et pour les dossiers de pr�ts en investissements locatifs,
",0,0,'L'); 

	 $pdf->Ln(5);
 $pdf->Cell(3,0,"pr�t pour un professionnel et TNS. Ces dossiers complexes et ou en SCI n�cessitent un devis pr�alable sur-mesure.
En cas de renonciation sans",0,0,'L'); 

	 $pdf->Ln(5);
 $pdf->Cell(3,0,"motif ou si la banque du client propose une offre � co�t identique � l'offre obtenue par E-Courtier.fr, le client s'expose � 1.500 euros d'honoraires.
	  
	",0,0,'L'); 
	
	$pdf->SetFont('Arial','B',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 Pour l�activit� de mandataire en acquisition d�immobilier ou de parts de SCI :
",0,0,'L'); 

 
 
 $pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Le conseiller per�oit une r�mun�ration comprise entre 2.5 et 8% du prix d�acquisition hors frais de notaire. Montant inclus dans le prix d�achat. Le d�tail",0,0,'L'); 
	 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"de la r�mun�ration du conseiller par commissions, agissant en tant qu�interm�diaire, peut �tre obtenu par le client en s�adressant � la soci�t� qui 
	 ",0,0,'L'); 
	 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"autorise la commercialisation par le conseiller de ses produits. Le conseiller s'engage � assister le client dans l�obtention de ces informations. 
	 
	 ",0,0,'L'); 
	 
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); $pdf->Ln(5);
 $pdf->Cell(3,0,"
 
 ",0,0,'L'); 
	 
	 
	 
	 	$pdf->SetFont('Arial','B',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"
Assurance�: ",0,0,'L'); 

	 	$pdf->SetFont('Arial','',8);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Nous sommes Interm�diaires en Assurances, immatricul�s aupr�s de l'Orias et exer�ant sous le statuts de Courtier. Vous pouvez
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"retrouver ces informations sur le site de l'Orias � l'adresse : www.orias.fr. Notre Cabinet exerce selon les dispositions pr�vues �
 
 ",0,0,'L'); 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"l'article L 520-1-II b du code des Assurances, c'est � dire que nos propositions sont issues du catalogue produits des organismes assureurs partenaires
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"de notre cabinet. Vous pouvez obtenir leur nom sur simple demande. Notre Cabinet exerce selon les dispositions pr�vues � l'article L 520-1-II c du
 
 ",0,0,'L'); 
 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"code des Assurances, c'est � dire que notre proposition est issue d'une �tude comparative des contrats propos�s sur le march�. 
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Vous pouvez obtenir leur nom sur simple demande.
 
 ",0,0,'L'); 
 
 	 $pdf->Ln(5);
 $pdf->Cell(3,0,"Notre Cabinet ne d�tient pas d'actions, de parts de capital social ou de droits de vote d'une compagnie d'assurance ou de ses filiales.
 
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
 $pdf->Cell(3,0,"Bouygues Immobilier*, C�r�nicimo, c�dif, Direct Produit*, Vinci Immobilier, Axa Th�ma*, G�n�rali, Swisslife*, Primonial*, Vie Plus, Aerios , Axa Banque,

",0,0,'L'); 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"BNP*, Caisse d�Epargne*, CIC*, Cr�dit du Nord*, April*, Autofirst, Groupama PJ, Groupe Zephir, Insured, Solly Azar*, Calao, Inocap*, OTC",0,0,'L'); 
 $pdf->Ln(5);
 $pdf->Cell(3,0,"*Liste des Partenaires et fournisseurs repr�sentant au moins 10% du Chiffre d�Affaires. liste compl�te sur demande

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
 $pdf->Cell(3,0,"AUCUN VERSEMENT, DE QUELQUE NATURE QUE CE SOIT, NE PEUT �TRE EXIG� D'UN PARTICULIER,",0,0,'L'); 

$pdf->SetFont('Arial','B',9);
	
	 $pdf->Ln(5);
 $pdf->Cell(3,0,"AVANT L'OBTENTION DEFINITIVE D'UN OU PLUSIEURS PR�TS D'ARGENT. ",0,0,'L'); 
	
	
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


	
//******* tableau de fin de page  d�but ******
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
 �tabli pour : $m_mme_mlle $nom $prenom - Id :$id par $nom_11 "
 
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