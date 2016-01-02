DROP trigger incCommande;

DELIMITER @
CREATE TRIGGER incCommande After insert
ON commande FOR EACH ROW
BEGIN
	update Client
	SET nbcommandes = (nbcommandes + 1)
	where client.code_c=new.code_c;
END @
DELIMITER ;

DROP trigger delCommande;

DELIMITER @
CREATE TRIGGER delCommande After delete
ON commande FOR EACH ROW
BEGIN
	update Client
	SET nbcommandes = (nbcommandes - 1)
	where client.code_c=old.code_c;
END @
DELIMITER ;

