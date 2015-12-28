DROP TABLE LIGUE;
create TABLE LIGUE
	(numCompte INT(4) NOT NULL,
    nomlig VARCHAR(25),
    nomtres VARCHAR(25),
    rue VARCHAR(25),
    cp INT(5),
    ville VARCHAR(25),
    CONSTRAINT PK_LIG PRIMARY KEY(numCompte)
    )ENGINE=innodb;

DROP TABLE PRESTATION;
create table PRESTATION
	(codePresta VARCHAR(25) NOT NULL,
	nomPresta VARCHAR(25),
	puPresta DECIMAL(4,1),
	CONSTRAINT PK_PRESTA PRIMARY KEY(codePresta)
	)ENGINE=innodb;

DROP TABLE FACTURE ;
create table FACTURE
	(numFact INT(4)UNSIGNED NOT NULL AUTO_INCREMENT,
	dateFact date ,
	echeance date,
	numCompte INT(4) ,
	CONSTRAINT PK_FACT PRIMARY KEY(numFact)
	)ENGINE=innodb;
    
DROP table LIGNE_FACTURE;
create table LIGNE_FACTURE
    (numFact INT(4)UNSIGNED NOT NULL AUTO_INCREMENT,
     codePresta VARCHAR(25) NOT NULL,
     qte INT(4),
     CONSTRAINT PK_LIGNE_FACT_FACT_PRESTA PRIMARY KEY (numFact,codePresta)
    )ENGINE=innodb;