-- Active: 1711023416388@@127.0.0.1@3306@nexus_lucian
set role admin;

select * FROM nexus_lucian.avoir;

use nexus_lucian;



-- Table Role 

-- Test valide
INSERT INTO Role(nom_role) VALUES ('Administrateur');
INSERT INTO Role(nom_role) VALUES ('Utilisateur');
INSERT INTO Role(nom_role) VALUES ('Visiteur');


-- Test aux bornes
INSERT INTO Role(nom_role) VALUES (REPEAT('a', 50));

-- Test d'erreur 
INSERT INTO Role(nom_role) VALUES (NULL);
INSERT INTO Role(nom_role) VALUES (REPEAT('b', 51));


-- Table Utilisateur


Select * from Role;

-- Tests valides
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('user1', 'password', 'avatar1.png', 'user1@example.com', 20, 12);
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('user2', 'password2', 'avatar2.png', 'user2@example.com', 25, 13);
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('user3', 'password3', 'avatar3.png', 'user3@example.com', 30, 14);

-- Tests aux bornes
-- Test de l'âge à la limite (13 ans) =  la limite définit dans la contrainte check est de mini 13 ans
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('younguser', 'youngpass', 'youngavatar.png', 'younguser@example.com', 13, 13);

-- Test d'erreurs

-- Pseudo existe déjà
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('user1', 'newpass', 'newavatar.png', 'newemail@example.com', 22, 1);
-- Test avec un âge non autorisé (moins de 13 ans)
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('tooyoung', 'tooyoungpass', 'tooyoungavatar.png', 'tooyoung@example.com', 12, 1);
-- Test avec un id_role non existant
INSERT INTO Utilisateur(pseudonyme, mot_de_passe, avatar, mail, age, id_role) VALUES ('user4', 'password4', 'avatar4.png', 'user4@example.com', 20, 9999);


-- Table NiveauJoueur

-- Tests valides

INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES ('Débutant', 'Description pour un débutant.');
INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES ('Intermédiaire', 'Description pour niveau intermédiaire.');
INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES ('Avancé', 'Description pour un joueur avancé.');

-- Tests aux bornes

-- Test de la longueur maximale de descript_niveau (définit à 200 caractères max)
INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES ('MaxDescription', REPEAT('d', 200));


-- Tests d'erreur
-- Nom de niveau NULL
INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES (NULL, 'Pas de nom.');
-- Description dépassant la longueur maximale
INSERT INTO NiveauJoueur(nom_niveau, descript_niveau) VALUES ('TropLong', REPEAT('e', 201));







