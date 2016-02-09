
<?php



$to = $e_mail_partenaire   ; 
//$to = "tlemaire@e-courtier.fr"   ;   
  



$from = $e_mail_partenaire ; 
//$from = "tlemaire@e-courtier.fr" ; 


$subject = "Modification de dossier sur le site e-courtier"; 

$message = "&nbsp;&nbsp;Bonjour,\n\n<div> &nbsp; </div>
<div>Une modification de dossier a &eacute;t&eacute; envoy&eacute; par ".$e_mail." \n\n</div>
<div>nom : ".$nom."\n\n</div>
<div>prenom : ".$prenom."\n\n</div>
<div>code_postal : ".$code_postal."\n\n</div>
<div>categorie : ".$categorie."\n\n</div>
<div>message : ".$message_dossier."\n\n</div>
<div>statut : ".$statut."\n\n</div>
\n\n
<div>Cordialement</div>
\n\n
<div>Le site de e-courtier.fr</div>
<div><div> &nbsp; </div>
\n\n<div> &nbsp; </div>
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