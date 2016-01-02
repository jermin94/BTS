DROP PROCEDURE IF EXISTS nbcomajouter;
DELIMITER @
CREATE PROCEDURE nbcomajouter()
BEGIN	
	ALTER TABLE CLIENT
	Add nbcommandes int(8);
	DESC CLIENT;
	Update CLIENT
	SET nbcommandes = (
		SELECT count(numero) 
		FROM commande
		WHERE commande.code_c = client.code_c);
	SELECT nom, prenom, nbcommandes from client;
END;
@
DELIMITER ;