<?php

try{
// On se connecte à MySQL
$bdd = new PDO('mysql:host=localhost;dbname=facturation;charset=utf8', 'root', '');
} catch(Exception $e) {
// En cas d'erreur, on affiche un message et on arrête tout
  die('Erreur : '.$e->getMessage());
}


if( isset($_POST['data']) && !empty($_POST['data']) ) {

$json = json_decode($_POST['data']);

/* Pour débogage
echo "<pre>";
print_r($json);
echo "</pre>";
*/

$compteLigne = ( isset($json->compteLigue) && !empty($json->compteLigue) ) ? $json->compteLigue : false ;
$lignes = ( isset($json->lignes) && !empty($json->lignes) ) ? $json->lignes : false ;

if($compteLigne == false){
$html = "<h3 style='color:red'>ERREUR : Enregistrement impossible car il manque le Compte Ligue</h3>";
} else if($lignes == false){
$html = "<h3 style='color:red'>ERREUR : Enregistrement impossible car il manque les Prestations</h3>";
} else{
	   

	
ob_start(); 

 
 
       $content = ob_get_clean(); 
       require('html2pdf/html2pdf.class.php');

       try{
            $html2pdf = new Html2Pdf_Html2Pdf('P','A4','fr');
    $html2pdf->pdf->SetDisplayMode('real');
    $html2pdf->WriteHTML($content);
         
    $result = $html2pdf->Output("tests.pdf", true);
 
    $response = new Response();
    $response->setContent($result);
    $response->headers->set('Content-Type', 'application/force-download');
    $response->headers->set('Content-disposition', 'filename=test.pdf');     
    $html =  $response;
       }catch(HTML2PDF_exception $e) {
               die ($e);
       }

       

	/*Pour débogage
echo "<pre>";
print_r($json);
echo "</pre>";*/


$date = new DateTime();
$date=$date->format('d-m-Y');
$datE = date('d-m-Y', strtotime('+17 days'));

$bdd = $bdd->prepare('INSERT INTO facture(dateFact ,echeance ,numCompte) VALUES(:datnow,:echeance,:Code_client)');
$bdd->execute(array (':datnow' => $date, ':echeance' => $datE, ':Code_client' => $compteLigne));
$bdd->closeCursor(); 


$i = 1;
foreach($lignes as $obj){

/* Pour debogage
echo $i."<br>";
echo "Code presta : ". $obj->codePresta ."<br>";
echo "Quantité : ". $obj->qte ."<br><br>";
$i++; */

$codePresta = $obj->codePresta;
$quantite = $obj->qte;

/* Modifier le code PHP ci-dessous pour insertion SQL en fonction de la table pour le code presta et quantité
$bdd = $bdd->prepare('INSERT INTO facture(dateFact ,echeance ,numCompte) VALUES(:datnow,:echeance,:Code_client)');
$bdd->execute(array (':datnow' => $date, ':echeance' => $datE, ':Code_client' => $compteLigne));
$bdd->closeCursor(); 
*/
}

$html = 	$pdf->Output('tests.pdf');
}

echo $html;

}

?>


