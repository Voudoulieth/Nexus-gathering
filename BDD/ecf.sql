-- Active: 1710969956952@@127.0.0.1@3306@nexusgathering
create database NexusGathering;

use NexusGathering;

DROP TABLE IF EXISTS Postuler;
DROP TABLE IF EXISTS Rejoindre;
DROP TABLE IF EXISTS Classer;
DROP TABLE IF EXISTS jouerQuiz;
DROP TABLE IF EXISTS rechercheRapide;
DROP TABLE IF EXISTS Annonce;
DROP TABLE IF EXISTS JouerA;
DROP TABLE IF EXISTS jeu;
DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS reponse;
DROP TABLE IF EXISTS question;
DROP TABLE IF EXISTS quiz;
DROP TABLE IF EXISTS Avoir;
DROP TABLE IF EXISTS Vivre;
DROP TABLE IF EXISTS JouerSur;
DROP TABLE IF EXISTS Preferer;
DROP TABLE IF EXISTS utilisateur;
DROP TABLE IF EXISTS Ville;
DROP TABLE IF EXISTS studio;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS formats;
DROP TABLE IF EXISTS dates;
DROP TABLE IF EXISTS editeur;
DROP TABLE IF EXISTS plateforme;
DROP TABLE IF EXISTS categorie;
DROP TABLE IF EXISTS NiveauUtilisateur;
DROP TABLE IF EXISTS roleUser;

CREATE TABLE roleUser(
    id_role INTEGER AUTO_INCREMENT,
    nom_role VARCHAR(50) NOT NULL unique,
    PRIMARY KEY(id_role)
) ENGINE=InnoDB;

CREATE TABLE NiveauUtilisateur(
    id_niveau INTEGER AUTO_INCREMENT,
    nom_niveau VARCHAR(50) NOT NULL,
    descrip_niveau VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_niveau)
)ENGINE=InnoDB;

create table categorie(
    id_cat_quiz integer AUTO_INCREMENT,
    nom_cat_quiz varchar(15) not null,
    primary key (id_cat_quiz)
);

CREATE TABLE plateforme (
    id_plat 	INTEGER 		AUTO_INCREMENT PRIMARY KEY,
    nom_plat 	VARCHAR(40) 	NOT NULL
);

CREATE TABLE editeur (
    id_ed 		INTEGER			AUTO_INCREMENT PRIMARY KEY,
    nom_ed 		VARCHAR(40) 	NOT NULL
);

CREATE TABLE dates (
    id_date INTEGER AUTO_INCREMENT PRIMARY KEY,
    ddate 	DATE,
    hdate   time
);

CREATE TABLE formats (
    id_form 	INTEGER 		AUTO_INCREMENT PRIMARY KEY,
    nom_form 	VARCHAR(40) 	NOT NULL
    CONSTRAINT chk_format CHECK (form IN ('dématérialisé', 'physique'))
);

CREATE TABLE genre (
    id_genre 		INTEGER 		AUTO_INCREMENT PRIMARY KEY,
    nom_genre		VARCHAR(40) 	NOT NULL
);

CREATE TABLE studio (
    id_stu	INTEGER	AUTO_INCREMENT PRIMARY KEY,
    id_ed   integer,
    nom_stu VARCHAR(40),
    foreign key(id_ed) references editeur(id_ed)	
);

CREATE TABLE Ville (
    id_ville INTEGER AUTO_INCREMENT,
    nom_ville VARCHAR(50),
    PRIMARY KEY(id_ville)
)ENGINE=InnoDB;

CREATE TABLE Utilisateur(
    id_user INTEGER AUTO_INCREMENT,
    nom_user VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(15) NOT NULL,
    avatar VARCHAR(50) NOT NULL,
    mail VARCHAR(50) NOT NULL,
    age INTEGER,
    id_role INTEGER NOT NULL,
    PRIMARY KEY(id_user),
    Foreign Key (id_role) REFERENCES roleUser(id_role)
) ENGINE=InnoDB;
ALTER TABLE Utilisateur
ADD CONSTRAINT AgeCheck CHECK (age > 13);

CREATE TABLE Preferer (
    id_user INTEGER,
    id_genre INTEGER,
    PRIMARY KEY(id_user, id_genre),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_genre) REFERENCES Genre(id_genre)
)ENGINE=InnoDB;

CREATE TABLE JouerSur(
    id_user INTEGER,
    id_plat INTEGER,
    PRIMARY KEY (id_user, id_plat),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_plat) REFERENCES plateforme(id_plat)
)ENGINE=InnoDB;

CREATE TABLE Vivre (
    id_ville INTEGER,
    id_user INTEGER,
    PRIMARY KEY(id_ville, id_user),
    Foreign Key (id_ville) REFERENCES Ville(id_ville),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user) 
)ENGINE=InnoDB;

CREATE TABLE Avoir(
    id_user INTEGER,
    id_niveau INTEGER,
    PRIMARY KEY(id_user, id_niveau),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_niveau) REFERENCES NiveauUtilisateur(id_niveau)
)ENGINE=InnoDB;

create table quiz(
    id_quiz integer AUTO_INCREMENT,
    id_cat_quiz integer,
    id_user integer,
    titre_quiz varchar(30) not null,
    photo_quiz varchar(100) not null,
    primary key (id_quiz),
    foreign key (id_cat_quiz) references categorie (id_cat_quiz),
    foreign key (id_user) references utilisateur (id_user)
);

create table question(
    id_question integer AUTO_INCREMENT,
    id_quiz integer,
    question_quiz varchar(130) not null,
    primary key (id_question),
    foreign key (id_quiz) references quiz (id_quiz)
);

create table reponse(
    id_reponse integer AUTO_INCREMENT,
    id_question integer,
    reponse_quiz varchar(130) not null,
    reponse_vraie_quiz boolean not null,
    primary key (id_reponse),
    foreign key (id_question) references question (id_question)
);

CREATE TABLE Messages(
    id_message integer  AUTO_INCREMENT PRIMARY KEY,
    contenu_mess text not null,
    modif boolean,
    date_message_id INTEGER,
    id_exped integer,
    id_desti integer,
    FOREIGN KEY (date_message_id) REFERENCES dates(id_date) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (id_exped) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (id_desti) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE
	-- CHECK (id_exped != id_desti)
);

create table jeu    (
	id_jeu		INTEGER			AUTO_INCREMENT PRIMARY KEY,  
    id_ed 		INTEGER,
	id_user 	INTEGER,
    id_stu		INTEGER,
    nom_jeu		VARCHAR(40) 	UNIQUE NOT NULL,
    resum_jeu	VARCHAR(500)	UNIQUE NOT NULL,
	img_jeu 	VARCHAR(50) 	UNIQUE NOT NULL,
    multi		BOOLEAN 		NOT NULL,
    CONSTRAINT chk_mult CHECK (multi IN (0, 1)),
    FOREIGN KEY (id_ed) REFERENCES editeur(id_ed),
    foreign key (id_user) REFERENCES utilisateur(id_user),
    foreign key (id_stu) REFERENCES studio(id_stu)
);
ALTER TABLE jeu ADD CONSTRAINT fk_jeu_utilisateur FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user);

CREATE TABLE JouerA(
    id_user INTEGER,
    id_jeu INTEGER,
    PRIMARY KEY(id_user, id_jeu),
    Foreign Key (id_user) REFERENCES Utilisateur(id_user),
    Foreign Key (id_jeu) REFERENCES Jeu(id_jeu)
)ENGINE=InnoDB;

CREATE TABLE Annonce(
    id_annonce integer  AUTO_INCREMENT PRIMARY KEY,
    nom_annonce varchar(50) not null,
    nb_user int CHECK (nb_user BETWEEN 1 AND 64),
    desc_annonce text not null,
    id_user integer,
    id_jeu	integer,
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_jeu) REFERENCES jeu(id_jeu) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE rechercheRapide(
    id_session integer  AUTO_INCREMENT PRIMARY KEY,
    id_user integer,
    id_jeu	integer,
    FOREIGN KEY (id_user) REFERENCES utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_jeu) REFERENCES Jeu(id_jeu) ON DELETE CASCADE ON UPDATE CASCADE
	-- CHECK (fin_session IS NULL OR fin_session >= deb_session),
    -- CHECK (fin_session IS NULL OR TIMESTAMPDIFF(HOUR, deb_session, fin_session) <= 6)
);

create table jouerQuiz(
    id_quiz integer,
    id_user integer,
    score_quiz tinyint,
    primary key (id_quiz, id_user),
    foreign key (id_quiz) references quiz (id_quiz),
    foreign key (id_user) references utilisateur (id_user)
);
ALTER TABLE jouerQuiz
ADD CONSTRAINT minicheck CHECK (score_quiz >= 0);

CREATE TABLE Classer(
    rank_user varchar(50),
    id_user integer,
    id_jeu	integer,
    id_niveau INTEGER,
    PRIMARY KEY (id_user, id_jeu),
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_jeu) REFERENCES Jeu(id_jeu) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (id_niveau) references NiveauUtilisateur(id_niveau)
);

CREATE TABLE Rejoindre(
    id_user integer,
    id_jeu	integer,
    PRIMARY KEY (id_user, id_jeu),
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_jeu) REFERENCES Jeu(id_jeu) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Postuler(
    id_user integer,
    id_jeu	integer,
    PRIMARY KEY (id_user, id_jeu),
    FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_jeu) REFERENCES Jeu(id_jeu) ON DELETE CASCADE ON UPDATE CASCADE
);