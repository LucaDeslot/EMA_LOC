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
     nom VARCHAR(100) NOT NULL,
     description VARCHAR(255),
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

INSERT INTO objet (nom, idAssociation) VALUES ('Soundboks', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Grille barbecue', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Spike', 2);
INSERT INTO objet (nom, idAssociation) VALUES ('Béquilles', 2);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Friteuse', 'Friteuse SEB 4L', 5);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Friteuse', 'Friteuse SEB 4L', 5);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Appareil à raclette', 'Tefal inox design 10 pers', 5);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Appareil à fondue', 'Tefal colormania 8 pers', 5);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Gaufrier multifonction', 'Boulanger', 5);
INSERT INTO objet (nom, description, idAssociation) VALUES ('Crépière', 'Krampouz diabolo', 5);
INSERT INTO objet (nom, idAssociation) VALUES ('Machine à glace', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Vidéoprojecteur', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Ecran projection', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Tireuse', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Tireuse', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Bancs', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Tables', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Enrouleurs', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Rallonges', 1);
INSERT INTO objet (nom, idAssociation) VALUES ('Tonnelle', 1);


INSERT INTO location (idObjet, nom, prenom, mail) VALUES (1, 'Broussard', 'Alex', 'lex24estmort@mines-ales.org');
INSERT INTO location (idObjet, nom, prenom, mail) VALUES (3, 'Da Rocha', 'Quentin', 'quentin.darocha@mines-ales.org');
