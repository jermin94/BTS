DROP FUNCTION IF EXISTS afftva2;
DELIMITER @
CREATE FUNCTION afftva2(unprixht2 DECIMAL, untauxtva DECIMAL)
RETURNS DECIMAL (3,2)
LANGUAGE SQL
DETERMINISTIC
BEGIN	
	RETURN unprixht2*(untauxtva+1);
END;
@
DELIMITER ;