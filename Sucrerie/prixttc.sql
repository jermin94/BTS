DROP FUNCTION IF EXISTS affprixttc;
DELIMITER @
CREATE FUNCTION affprixttc(unprixttc DECIMAL(3,2))
RETURNS DECIMAL (3,2)
LANGUAGE SQL
DETERMINISTIC
BEGIN	
	RETURN CONCAT(unprixttc*0.2);
END;
@
DELIMITER ;