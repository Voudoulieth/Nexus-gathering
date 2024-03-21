-- Active: 1710970035820@@127.0.0.1@3306@nexus_lucian

DROP TABLE IF EXISTS Role;
DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS NiveauJoueur;
DROP TABLE IF EXISTS Avoir;
DROP TABLE IF EXISTS Ville;
DROP TABLE IF EXISTS Vivre;
DROP TABLE IF EXISTS Genre;
DROP TABLE IF EXISTS Preferer;
DROP TABLE IF EXISTS Jeux;
DROP TABLE IF EXISTS JouerA;
DROP TABLE IF EXISTS Hardware;
DROP TABLE IF EXISTS JouerSur;


CREATE TABLE Role(
    id_role INTEGER AUTO_INCREMENT,
    nom_role VARCHAR(50) NOT NULL,
    PRIMARY KEY(id_role)
) ENGINE=InnoDB;

CREATE TABLE Utilisateur(
    id_user INTEGER AUTO_INCREMENT,
    pseudonyme VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(15) NOT NULL,
    avatar VARCHAR(50) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    age INTEGER,
    id_role INTEGER NOT NULL,
    PRIMARY KEY(id_user),
    Foreign Key (id_role) REFERENCES Role(id_role)
) ENGINE=InnoDB;

ALTER TABLE Utilisateur
ADD CONSTRAINT AgeCheck CHECK (age > 13);

CREATE TABLE NiveauJoueur(
    id_niveau INTEGER AUTO_INCREMENT,
    nom_niveau VARCHAR(50) NOT NULL,
    descript_niveau VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_niveau)
)ENGINE=InnoDB;

-- Not null + unique sur primary key non obligatoire parce que par défaut.

CREATE TABLE Avoir(
    id_user INTEGER,
    id_niveau INTEGER,
    PRIMARY KEY(id_user, id_niveau),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_niveau) REFERENCES NiveauJoueur(id_niveau)
)ENGINE=InnoDB;

CREATE TABLE Ville (
    id_ville INTEGER AUTO_INCREMENT,
    nom_ville VARCHAR(50),
    PRIMARY KEY(id_ville)
)ENGINE=InnoDB;

CREATE TABLE Vivre (
    id_ville INTEGER,
    id_user INTEGER,
    PRIMARY KEY(id_ville, id_user),
    Foreign Key (id_ville) REFERENCES Ville(id_ville),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user)
    
)ENGINE=InnoDB;

CREATE TABLE Genre (
    id_genre INTEGER AUTO_INCREMENT,
    PRIMARY KEY (id_genre)
)ENGINE=InnoDB;

CREATE TABLE Preferer (
    id_user INTEGER,
    id_genre INTEGER,
    PRIMARY KEY(id_user, id_genre),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_genre) REFERENCES Genre(id_genre)
)ENGINE=InnoDB;

CREATE TABLE Jeux (
    id_jeux INTEGER AUTO_INCREMENT,
    PRIMARY KEY(id_jeux)
)ENGINE=InnoDB;

CREATE TABLE JouerA(
    id_user INTEGER,
    id_jeux INTEGER,
    PRIMARY KEY(id_user, id_jeux),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_jeux) REFERENCES Jeux(id_jeux)
)ENGINE=InnoDB;

CREATE TABLE Hardware(
    id_hard INTEGER AUTO_INCREMENT,
    PRIMARY KEY(id_hard)
)ENGINE=InnoDB;

CREATE TABLE JouerSur(
    id_user INTEGER,
    id_hard INTEGER,
    PRIMARY KEY (id_user, id_hard),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_hard) REFERENCES Hardware(id_hard)
)ENGINE=InnoDB;





