<?php
session_start();

//$to = "tlemaire@e-courtier.fr"   ;  
$to = $e_mail ;  // envoi vers e-mail du client

$logo = "http://ssl14.ovh.net/~ecourtie/bkpe/admin_partenaire/logo.jpg";
$lien = "http://e-courtier.fr";

$e_mail_partenaire = $_COOKIE["myforum_pass_guides1"] ;
//$from = "tlemaire@e-courtier.fr" ; 
$from = $e_mail_partenaire ; 


$subject = "Votre Recherche de financement"; 



$message =
"
<div><a href=$lien><img src=$logo ></a>\n\n</br></div>

Bonjour&nbsp;&nbsp; 
$m_mme_mlle ".$m_mme_mlle." ".$nom."  ".$prenom.",\n\n<div> &nbsp; </div>


<div>\nTout d’abord, je vous remercie de votre demande. \n\n</div>
<div><br>
Vous serez mis en relation avec des banques se situant dans un rayon de 15 kilomètres autour de votre domicile.\n\n

</div>
<div>&nbsp;\n\n</div>
<div>Afin de respecter la réglementation en vigueur, nous vous envoyons dans votre espace membre le mandat \n\n</div>
<div>ainsi que la fiche d'information préalable.</div>

<div>&nbsp;\n\n</div>
<div>Votre espace membre est accessible en vous identifiant à la page http://e-courtier.fr/espace-membres.html.\n\n</div>

<div>&nbsp;\n\n</div>
<div>C’est pour vous la certitude de travailler avec un expert en financement, tenu au secret\n\n</div>
<div>professionnel, référencé par de nombreuses banques.\n\n</div>

<div>&nbsp;\n\n</div>
<div>Nous vous remercions de nous retourner les pièces constituant votre dossier de prêt :</div>
\n\n
<div>  -              Lettre de mission et lettre d’information signées (situées dans votre espace membre)</div>
\n\n
<div>  -              Copie des pièces d’identité (de vous et du Co-emprunteur)</div>
\n\n
<div>  -              Si vous avez un enfant, Copie du livret de famille</div>
\n\n
<div>  -              Quittance de moins de 3 mois </div>
\n\n
<div>  -              3 derniers releves de tous les comptes bancaires</div>
\n\n
<div>  -              3 derniers bulletins de paie </div>
\n\n
<div>  -              Dernier avis d’imposition </div>
\n\n
<div>  -              Tableau d’amortissement de vos prêts en cours</div>
\n\n
<div>  -              Compromis si celui ci est déjà signé </div>
\n\n
<div>&nbsp;\n\n</div>

\n\n
<div>Par mail en répondant à cet email.</div>
\n\n
<div>Ou via notre site http://e-courtier.fr puis espace membres dossier en cours</div>
\n\n
<div>Ou lors de notre rendez-vous</div>
\n\n
<div>&nbsp;\n\n</div>
<div>Je reste à votre disposition</div>
\n\n
<div>Cordialement,</div>
\n\n
<div>".$prenom_11."  ".$nom_11."  ".$tel_11."</div>
\n\n
<div>&nbsp;\n\n</div>
<div>En cas de difficultés avec votre interlocuteur ou pour un complément d’informations, \n\n</div>
<div>vous pouvez contacter serviceclients@e-courtier.fr\n\n</div>
\n\n<div>


 &nbsp; </div> 
<div>-----------------------</div>


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