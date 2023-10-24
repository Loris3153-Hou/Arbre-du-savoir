DROP TABLE IF EXISTS FORMATION_LIEU;
DROP TABLE IF EXISTS FORMATION_CATEGORIE;
DROP TABLE IF EXISTS FORMATION;
DROP TABLE IF EXISTS LIEU;
DROP TABLE IF EXISTS CATEGORIE;
DROP TABLE IF EXISTS COMMANDE;
DROP TABLE IF EXISTS COMMANDE_FORMATION;
DROP TABLE IF EXISTS UTILISATEUR;

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

CREATE TABLE UTILISATEUR(
    id_utilisateur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_utilisateur VARCHAR(100) NOT NULL,
    prenom_utilisateur VARCHAR(100) NOT NULL,
    date_nais_utilisateur VARCHAR(100) NOT NULL,
    mail_utilisateur VARCHAR(100) UNIQUE NOT NULL,
    mdp_utilisateur VARCHAR(100) NOT NULL
);

CREATE TABLE COMMANDE(
    id_commande INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date_commande DATE NOT NULL,
    id_utilisateur INT NOT NULL,
    FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR(id_utilisateur)
);

CREATE TABLE COMMANDE_FORMATION(
    id_commande INT NOT NULL,
    id_formation INT NOT NULL,
    nb_formation INT NOT NULL,
    FOREIGN KEY (id_commande) REFERENCES COMMANDE(id_commande),
    FOREIGN KEY (id_formation) REFERENCES FORMATION(id_formation),
    PRIMARY KEY (id_commande, id_formation)
);