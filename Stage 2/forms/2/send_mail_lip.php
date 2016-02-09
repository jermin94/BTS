
<?php



//$to = "tlemaire@e-courtier.fr"   ;  
$to = $e_mail ;  // envoi vers e-mail du client


$logo = "http://ssl14.ovh.net/~ecourtie/bkpe/admin_partenaire/logo.jpg";
$lien = "http://e-courtier.fr";

$e_mail_partenaire = $_COOKIE["myforum_pass_guides1"] ;
//$from = "tlemaire@e-courtier.fr" ; 
$from = $e_mail_partenaire ; 
   


$subject = "Un document vous attend"; 

$message = "
<div><a href=$lien><img src=$logo ></a>\n\n</br></div>

Bonjour&nbsp;".$prenom." ".$nom.",&nbsp;\n\n<div> &nbsp; </div>
<div>Vous avez fait appel à un professionnel reconnu par l'Orias. C'est pour cela que </div>

<div>".$prenom_11." ".$nom_11." vous a laissé un document dans votre espace membre accessible sur http://e-courtier.fr/espace-membres.html  </div>
<div> Vous pouvez aussi contacter votre interlocuteur  : </div>
<div>".$enseigne_11."  ".$prenom_11." ".$nom_11." </div>
<div>".$adresse_11." </div>
<div>".$code_postal_11."  ".$ville_11."</div>
<div>".$tel_11."
<div>&nbsp;\n\n</div>
<div>&nbsp;\n\n</div>
<div>Merci de ne pas répondre à cet email automatique\n\n</div>
<div>En cas de difficultés, vous pouvez contacter le standard au 09.72.48.23.08 appel non surtaxé \n\n</div>
\n\n
\n\n
<div>Restant à votre disposition</div>
\n\n
\n\n
<div>&nbsp;\n\n</div>
<div>l'équipe d'E-Courtier</div>
\n\n
<div>&nbsp;\n\n</div>
<div>En cas de difficultés avec votre interlocuteur ou pour un complément d’informations, \n\n</div>
<div>vous pouvez contacter serviceclients@e-courtier.fr\n\n</div>
\n\n<div> &nbsp; </div>

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