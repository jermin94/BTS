DROP TABLE IF EXISTS utilisateur;

create table utilisateur
(id_util varchar(25) NOT NULL,
mdp_util varchar(25),
mail_util varchar(60),
valid_util int(1),
grade_util int(1),
constraint pk_cli primary key(id_util)
)ENGINE=InnoDB; 

DROP TABLE IF EXISTS ligue;

create TABLE LIGUE
	(numCompte INT(4) NOT NULL ,
    nomlig VARCHAR(25),
    nomtres VARCHAR(25),
    rue VARCHAR(25),
    cp INT(5),
    ville VARCHAR(25),
    CONSTRAINT PK_LIG PRIMARY KEY(numCompte)
    )ENGINE=innodb;

DROP TABLE IF EXISTS parking;

CREATE TABLE parking
(id_place INT(3) NOT NULL,
dispo_place INT(1),
CONSTRAINT PK_PROD PRIMARY KEY (id_place)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS liste_attente;

CREATE TABLE liste_attente
(ID_liste int NOT NULL AUTO_INCREMENT,
id_util varchar(25),
date_demande VARCHAR(10),
CONSTRAINT PK_PROD PRIMARY KEY (ID_liste)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS place_occupe;

CREATE TABLE place_occupe
(id_place INT(3) NOT NULL,
id_util VARCHAR(25),
debut_attrib  VARCHAR(10),
fin_attrib VARCHAR(10),
CONSTRAINT PK_PROD PRIMARY KEY (id_place)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS historique;

CREATE TABLE historique
(ID int NOT NULL AUTO_INCREMENT,
id_util VARCHAR(25),
id_place INT(3),
debut_attrib  VARCHAR(10),
fin_attrib VARCHAR(10),
CONSTRAINT PK_PROD PRIMARY KEY (id_histo)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS reservation;

CREATE TABLE reservation
(id_reservation INT (6) NOT NULL,
CONSTRAINT PK_PROD PRIMARY KEY (id_reservation)
)ENGINE=InnoDB;