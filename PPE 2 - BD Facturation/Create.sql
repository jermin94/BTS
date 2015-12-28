Drop Table LIGUE;
CREATE TABLE LIGUE
( numcompte INT(4),
intitule VARCHAR(20),
tresorier VARCHAR(20),
adrue VARCHAR(40),
cp INT (5),
ville VARCHAR (25),
constraint PK_LIG Primary key (numcompte)
)engine=innodb;

Drop Table PRESTATION;
CREATE TABLE PRESTATION
( code INT (4),
libelle VARCHAR (25),
pu INT (5),
constraint PK_PRE Primary key (code)
)engine=innodb;

Drop Table FACTURE;
CREATE TABLE FACTURE
( numfacture INT (4),
date INT (25),
echeance VARCHAR (15),
compte_ligue INT (4),
adresse_tresorier VARCHAR (25),
constraint PK_FAC Primary key (numfacture)
)engine=innodb;

Drop Table LIGNE_FACTURE;
CREATE TABLE LIGNE_FACTURE
( numfacture INT (4),
code_prestation INT (5),
quantite INT (10),
constraint PK_LIF Primary key (numfacture)
)engine=innodb;