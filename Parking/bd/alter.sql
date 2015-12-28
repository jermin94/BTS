ALTER TABLE liste_attente
ADD CONSTRAINT FK_LIS_UTI FOREIGN KEY(id_util)
REFERENCES utilisateur(id_util);

ALTER TABLE place_occupe
ADD CONSTRAINT FK_PLA_PAR FOREIGN KEY(id_place) REFERENCES parking(id_place),
ADD CONSTRAINT FK_PLA_UTI FOREIGN KEY(id_util) REFERENCES utilisateur(id_util);

ALTER TABLE historique
ADD CONSTRAINT FK_HIS_UTI FOREIGN KEY(id_util) REFERENCES utilisateur(id_util),
ADD CONSTRAINT FK_HIS_PAR FOREIGN KEY(id_place) REFERENCES produit(id_place);

ALTER TABLE historique AUTO_INCREMENT=1;

ALTER TABLE liste_attente AUTO_INCREMENT=1;