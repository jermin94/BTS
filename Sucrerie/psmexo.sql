DROP FUNCTION IF EXISTS affdate;
DELIMITER @
CREATE FUNCTION affdate(unedate DATE)
RETURNS VARCHAR (40)
LANGUAGE SQL
DETERMINISTIC
BEGIN
	DECLARE jour_nom varchar (10);
	DECLARE jour varchar (10);
	DECLARE mois varchar (25);
	DECLARE annee int (4);
	
	SET jour = day(unedate);
	SET annee = year(unedate);
	
	CASE dayofweek(unedate)
         WHEN 1 THEN SET jour_nom = 'dimanche';
         WHEN 2 THEN SET jour_nom = 'lundi';
         WHEN 3 THEN SET jour_nom = 'mardi';
         WHEN 4 THEN SET jour_nom = 'mercredi';
         WHEN 5 THEN SET jour_nom = 'jeudi';
         WHEN 6 THEN SET jour_nom = 'vendredi';
		 WHEN 7 THEN SET jour_nom = 'samedi';
         ELSE SET jour_nom = 'erreur';
	END CASE;
	
	CASE month(unedate)
         WHEN 1 THEN SET mois = 'janvier';
         WHEN 2 THEN SET mois = 'février';
         WHEN 3 THEN SET mois = 'mars';
         WHEN 4 THEN SET mois = 'avril';
         WHEN 5 THEN SET mois = 'mai';
         WHEN 6 THEN SET mois = 'juin';
         WHEN 7 THEN SET mois = 'juillet';
         WHEN 8 THEN SET mois = 'août';
         WHEN 9 THEN SET mois = 'septembre';
         WHEN 10 THEN SET mois = 'octobre';
         WHEN 11 THEN SET mois = 'novembre';
         ELSE SET mois = 'décembre';
	END CASE;
	
	RETURN CONCAT(jour_nom, ' ', jour, ' ', mois, ' ', annee);
END;
@
DELIMITER ;