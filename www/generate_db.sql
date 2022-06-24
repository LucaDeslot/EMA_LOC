CREATE TABLE association (
     idAssociation INT NOT NULL AUTO_INCREMENT,
     nom VARCHAR(100) NOT NULL,
     identifiant VARCHAR(100) NOT NULL,
     motdepasse VARCHAR(100) NOT NULL,
     description VARCHAR(255),
     PRIMARY KEY (idAssociation)
);

CREATE TABLE membre (
     idMembre INT NOT NULL AUTO_INCREMENT,
     nom VARCHAR(100) NOT NULL,
     prenom VARCHAR(100) NOT NULL,
     mail VARCHAR(100),
     messenger VARCHAR(100),
     telephone VARCHAR(30),
     PRIMARY KEY (idMembre)
);

CREATE TABLE contact (
     idMembre INT NOT NULL,
     idAssociation INT NOT NULL,
     PRIMARY KEY (idMembre, idAssociation),
     CONSTRAINT `contact_idAssociation_fk`
     	FOREIGN KEY `idAssociation_fk` (`idAssociation`) REFERENCES `association` (`idAssociation`)
     	ON DELETE CASCADE ON UPDATE CASCADE,
     CONSTRAINT `contact_idMembre_fk`
     	FOREIGN KEY `idMembre_fk` (`idMembre`) REFERENCES `membre` (`idMembre`)
     	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE objet (
     idObjet INT NOT NULL AUTO_INCREMENT,
     nomObjet VARCHAR(100) NOT NULL,
     description_longue VARCHAR(255),
     description_courte VARCHAR(200),
     prix INT,
     disponible BOOLEAN,
     idAssociation INT NOT NULL,
     PRIMARY KEY (idObjet),
     CONSTRAINT `objet_idAssociation_fk`
     	FOREIGN KEY `idAssociation_fk` (`idAssociation`) REFERENCES `association` (`idAssociation`)
     	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE location (
	 idLocation int NOT NULL AUTO_INCREMENT,
     idObjet INT NOT NULL,
     nom VARCHAR(100) NOT NULL,
     prenom VARCHAR(100) NOT NULL,
	 mail VARCHAR(100),
     messenger VARCHAR(100),
     telephone VARCHAR(30),
     dateDebut DATE,
     dateFin DATE,
     etat VARCHAR(40),
     PRIMARY KEY (idLocation, idObjet),
     CONSTRAINT `location_idObjet`
     	FOREIGN KEY `idObjet_fk` (`idObjet`) REFERENCES `objet` (`idObjet`)
     	ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO membre (nom, prenom, mail) VALUES ('Pereira', 'Dylan', 'dylan.pereira@mines-ales.org');
INSERT INTO membre (nom, prenom, mail) VALUES ('Zumstein', 'Paulin', 'paulin.zumstein@mines-ales.org');
INSERT INTO membre (nom, prenom, mail) VALUES ('Ohayon', 'Samuel', 'samuel.ohayon@mines-ales.org');
INSERT INTO membre (nom, prenom, mail) VALUES ('Deslot', 'Luca', 'luca.deslot@mines-ales.org');

INSERT INTO association (nom, identifiant, motdepasse) VALUES ('BDE', 'BDE', 'BDE');
INSERT INTO association (nom, identifiant, motdepasse) VALUES ('BDS', 'BDS', 'BDS');
INSERT INTO association (nom, identifiant, motdepasse) VALUES ('BDA', 'BDA', 'BDA');
INSERT INTO association (nom, identifiant, motdepasse) VALUES ('EMAMix', 'EMAMix', 'EMAMix');
INSERT INTO association (nom, identifiant, motdepasse) VALUES ('EMA''sterchef', 'EMA''sterchef', 'EMA''sterchef');

INSERT INTO contact (idMembre, idAssociation) VALUES (1, 1);
INSERT INTO contact (idMembre, idAssociation) VALUES (3, 1);
INSERT INTO contact (idMembre, idAssociation) VALUES (2, 2);
INSERT INTO contact (idMembre, idAssociation) VALUES (4, 2);

INSERT INTO objet (nomObjet, ,decription_longue, description_courte, idAssociation) VALUES ('Soundboks','Une superbe enceinte Bluetooth prête à mettre le feu dans tout les apparts les plus chauds de la pinède ! 
Attention à ne pas se brûler ', 'Une superbe enceinte Bluetooth !', 1);
INSERT INTO objet (nomObjet, idAssociation) VALUES ('Grille barbecue', 1);
INSERT INTO objet (nomObjet, idAssociation) VALUES ('Spike', 2);
INSERT INTO objet (nomObjet, idAssociation) VALUES ('Béquilles', 2);
INSERT INTO objet (nomObjet, description_courte, prix, disponible, idAssociation) VALUES ('Friteuse', 'Friteuse SEB 4L',10, TRUE, 5);
INSERT INTO objet (nomObjet, description_courte, prix, disponible, idAssociation) VALUES ('Friteuse', 'Friteuse SEB 4L',10,TRUE, 5);
INSERT INTO objet (nomObjet, description_courte, prix, disponible, idAssociation) VALUES ('Appareil à raclette', 'Tefal inox design 10 pers',5,TRUE, 5);
INSERT INTO objet (nomObjet, description_courte, prix, disponible, idAssociation) VALUES ('Appareil à fondue', 'Tefal colormania 8 pers',3,TRUE, 5);
INSERT INTO objet (nomObjet, description_courte, disponible, idAssociation) VALUES ('Gaufrier multifonction', 'Boulanger',TRUE, 5);
INSERT INTO objet (nomObjet, description_courte, disponible, idAssociation) VALUES ('Crépière', 'Krampouz diabolo',TRUE, 5);
INSERT INTO objet (nomObjet, disponible,idAssociation) VALUES ('Machine à glace',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Vidéoprojecteur',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Ecran projection',TRUE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Tireuse',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Tireuse',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Bancs',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Tables',FALSE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Enrouleurs',TRUE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Rallonges',TRUE, 1);
INSERT INTO objet (nomObjet,disponible, idAssociation) VALUES ('Tonnelle',FALSE, 1);
INSERT INTO objet (nomObjet, description_courte,disponible, idAssociation) VALUES ('Platine', 'XDJ RX Pioneer',FALSE, 4);
INSERT INTO objet (nomObjet, description_courte,disponible, idAssociation) VALUES ('Teufel', 'Rockster Air',FALSE, 4);



INSERT INTO location (idObjet, nom, prenom, mail) VALUES (1, 'Broussard', 'Alex', 'lex24estmort@mines-ales.org');
INSERT INTO location (idObjet, nom, prenom, mail, messenger, telephone, dateDebut, dateFin, etat) VALUES (1, 'Pereira', 'Dylan', 'dylan.pereira@mines-ales.org', 'Dylan Pereira', '0623232323', '2022-03-02', '2022-03-05', 'rendu');
INSERT INTO location (idObjet, nom, prenom, mail, messenger, telephone, dateDebut, dateFin, etat) VALUES (1, 'Pereira', 'Dylan', 'dylan.pereira@mines-ales.org', 'Dylan Pereira', '0623232323', '2022-03-10', '2022-03-15', 'rendu');
INSERT INTO location (idObjet, nom, prenom, mail, messenger, telephone, dateDebut, dateFin, etat) VALUES (1, 'Pereira', 'Dylan', 'dylan.pereira@mines-ales.org', 'Dylan Pereira', '0623232323', '2022-03-20', '2022-03-25', 'rendu');
INSERT INTO location (idObjet, nom, prenom, mail, messenger, telephone, dateDebut, dateFin, etat) VALUES (1, 'Pereira', 'Dylan', 'dylan.pereira@mines-ales.org', 'Dylan Pereira', '0623232323', '2022-03-30', '2022-04-05', 'en cours');



INSERT INTO location (idObjet, nom, prenom, mail) VALUES (3, 'Da Rocha', 'Quentin', 'quentin.darocha@mines-ales.org');
