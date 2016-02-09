
<?php



//$to = "tlemaire@e-courtier.fr"   ;  
$to = $e_mail ;  // envoi vers e-mail du client


$from = $e_mail_partenaire ; 

$logo = "http://ssl14.ovh.net/~ecourtie/bkpe/admin_partenaire/logo.jpg";

$subject = "Modification de votre dossier"; 

$message = "Bonjour,&nbsp;&nbsp;".$titre."&nbsp;&nbsp;".$prenom."&nbsp;".$nom."\n\n<div> &nbsp; </div>
<div>".$from."&nbsp;a r&eacute;pondu sur le dossier ".$categorie." \n\n</div>
<div>&nbsp;\n\n</div>Identifiez-vous sur http://e-courtier.fr 
<div>&nbsp;\n\n</div>
<div>".$message_dossier."\n\n</div>
<div>&nbsp;\n\n</div>
<div>&nbsp;\n\n</div>
<div>Retrouvez le fil de cette conversation, ainsi que d &eacute;ventuellement fichiers joints dans votre espace membre\n\n</div>
<div>Faites une nouvelle demande Assurances, Pret, Epargne sur http://e-courtier.fr \n\n</div>
<div><img src="$logo" /></div><div> &nbsp; </div>
<div>-----------------------</div>

\n\n";


// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;


// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;

// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;

// attachment
$headers .= "--".$separator.$eol;
$headers .= "--".$separator."--";

// send message


 mail($to, $subject, "", $headers);
 









?>