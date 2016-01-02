DROP TABLE IF EXISTS client;

create table client
(code_c int(4),
nom varchar(25),
prenom varchar(25),
adresse varchar(50),
cp varchar(5),
ville varchar(20),
tel varchar(14), 
constraint pk_cli primary key(code_c)
)ENGINE=InnoDB; 

DROP TABLE IF EXISTS PRODUIT;

CREATE TABLE PRODUIT
(reference INT(4) NOT NULL,
designation VARCHAR(50),
quantite INT,
descriptif VARCHAR(1),
puht DECIMAL(3,2),
stock INT,
poids_piece INT,
CONSTRAINT PK_PROD PRIMARY KEY (reference)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS VENDEUR;

CREATE TABLE VENDEUR (
code_v INT(3) ,
nom VARCHAR(30) NOT NULL,
prenom varchar(25),
adresse VARCHAR(50) NOT NULL,
cp INT(5),
ville VARCHAR(30),
telephone VARCHAR(20),
CONSTRAINT PK_VEN PRIMARY KEY (code_v)
)ENGINE=InnoDB; 

DROP TABLE IF EXISTS ligne_commande;

CREATE TABLE ligne_commande
(
  numero int(5),
  numero_ligne int(2),
  reference int(4),
  quantite_demande int,
  CONSTRAINT PK_LIC PRIMARY KEY(numero, numero_ligne)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS COMMANDE;

CREATE TABLE COMMANDE
(numero INT(5) NOT NULL,
code_v INT(3),
code_c INT(3),
date_livraison DATE,
date_commande DATE,
total_ht DECIMAL(3,2),
total_tva DECIMAL(2,2),
etat BOOLEAN,
CONSTRAINT PK_COM PRIMARY KEY(numero)
)ENGINE=innodb;
