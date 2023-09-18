DROP TABLE IF EXISTS FORMATION_LIEU;
DROP TABLE IF EXISTS FORMATION_CATEGORIE;
DROP TABLE IF EXISTS FORMATION;
DROP TABLE IF EXISTS LIEU;
DROP TABLE IF EXISTS CATEGORIE;

CREATE TABLE FORMATION(
    id_formation INT PRIMARY KEY NOT NULL AUTO_INCREMENT,   
    titre_formation VARCHAR(100) NOT NULL,
    desc_formation VARCHAR(500) NOT NULL,
    photo_formation VARCHAR(100) NOT NULL,
    prix_formation FLOAT NOT NULL,
    niveau_formation VARCHAR(50) NOT NULL,
    certification_formation VARCHAR(100) NOT NULL,
    date_debut_formation DATE NOT NULL,
    date_fin_formation DATE NOT NULL
);

CREATE TABLE CATEGORIE(
	id_categorie INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    nom_categorie VARCHAR(50) NOT NULL
);

CREATE TABLE LIEU(
	id_lieu INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    adresse_lieu VARCHAR(500) NOT NULL,
    ville_lieu VARCHAR(50) NOT NULL,
    pays_lieu VARCHAR(50) NOT NULL
);

CREATE TABLE FORMATION_LIEU(
    id_formation INT NOT NULL, 
    id_lieu INT NOT NULL, 
    FOREIGN KEY (id_formation) REFERENCES FORMATION(id_formation),
    FOREIGN KEY (id_lieu) REFERENCES LIEU(id_lieu),
    PRIMARY KEY (id_formation, id_lieu)
);

CREATE TABLE FORMATION_CATEGORIE(
    id_formation INT NOT NULL, 
    id_categorie INT NOT NULL, 
    FOREIGN KEY (id_formation) REFERENCES FORMATION(id_formation),
    FOREIGN KEY (id_categorie) REFERENCES CATEGORIE(id_categorie),
    PRIMARY KEY (id_formation, id_categorie)
);