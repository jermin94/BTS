DROP PROCEDURE IF EXISTS addchamp;
DELIMITER @
CREATE PROCEDURE addchamp()
BEGIN	
	ALTER TABLE CLIENT
	Add remise boolean;
	Update CLIENT
	set remise = (IF((
		SELECT sum(total_ht + total_tva)
		FROM Commande
		Where client.code_c=commande.code_c)>200, 1, 0));
END;
@
DELIMITER ;