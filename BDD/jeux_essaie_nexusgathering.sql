-- Active: 1710969956952@@127.0.0.1@3306@nexusgathering
use nexusgathering;
INSERT INTO roleUser (nom_role) VALUES ('Role 1');
INSERT INTO roleUser (nom_role) VALUES ('Role 2');
INSERT INTO roleUser (nom_role) VALUES ('Role 3');

INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 1', 'Description du Niveau 1');
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 2', 'Description du Niveau 2');
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 3', 'Description du Niveau 3');

INSERT INTO categorie (nom_cat_quiz) VALUES ('Communautaire');
INSERT INTO categorie (nom_cat_quiz) VALUES ('Officiel');

INSERT INTO plateforme (nom_plat) VALUES ('Plateforme1');
INSERT INTO plateforme (nom_plat) VALUES ('Plateforme2');
INSERT INTO plateforme (nom_plat) VALUES ('Plateforme3');

INSERT INTO formats (nom_form) VALUES ('physique');
INSERT INTO formats (nom_form) VALUES ('physique');
INSERT INTO formats (nom_form) VALUES ('dématérialisé');

INSERT INTO editeur (nom_ed) VALUES ('Editeur1');
INSERT INTO editeur (nom_ed) VALUES ('Editeur2');
INSERT INTO editeur (nom_ed) VALUES ('Editeur3');

INSERT INTO dates (ddate, hdate) VALUES ('2023-03-21', '12:00:00');
INSERT INTO dates (ddate, hdate) VALUES ('2023-03-22', '13:30:00');
INSERT INTO dates (ddate, hdate) VALUES ('2023-03-23', '15:45:00');

INSERT INTO genre (nom_genre) VALUES ('Genre1');
INSERT INTO genre (nom_genre) VALUES ('Genre2');
INSERT INTO genre (nom_genre) VALUES ('Genre3');

INSERT INTO studio (id_ed, nom_stu) VALUES (1, 'Studio1');
INSERT INTO studio (id_ed, nom_stu) VALUES (2, 'Studio2');
INSERT INTO studio (id_ed, nom_stu) VALUES (3, 'Studio3');

INSERT INTO Ville (nom_ville) VALUES ('Ville1');
INSERT INTO Ville (nom_ville) VALUES ('Ville2');
INSERT INTO Ville (nom_ville) VALUES ('Ville3');

INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest1', 'Pass123', 'avatar1.jpg', 'user1@example.com', 25, 1);
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest2', 'Pass456', 'avatar2.jpg', 'user2@example.com', 30, 2);
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest3', 'Pass789', 'avatar3.jpg', 'user3@example.com', 35, 3);

INSERT INTO Preferer (id_user, id_genre) VALUES (1, 1);
INSERT INTO Preferer (id_user, id_genre) VALUES (2, 2);
INSERT INTO Preferer (id_user, id_genre) VALUES (3, 3);

INSERT INTO JouerSur (id_user, id_plat) VALUES (1, 1);
INSERT INTO JouerSur (id_user, id_plat) VALUES (2, 2);
INSERT INTO JouerSur (id_user, id_plat) VALUES (3, 3);

INSERT INTO Vivre (id_ville, id_user) VALUES (1, 1);
INSERT INTO Vivre (id_ville, id_user) VALUES (2, 2);
INSERT INTO Vivre (id_ville, id_user) VALUES (3, 3);

INSERT INTO Avoir (id_user, id_niveau) VALUES (1, 1);
INSERT INTO Avoir (id_user, id_niveau) VALUES (2, 2);
INSERT INTO Avoir (id_user, id_niveau) VALUES (3, 3);

INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (1, 1, 'Quiz 1', 'photo1.jpg');
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (2, 2, 'Quiz 2', 'photo2.jpg');
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (3, 3, 'Quiz 3', 'photo3.jpg');

INSERT INTO question (id_quiz, question_quiz) VALUES (1, 'Quelle est la première question ?');
INSERT INTO question (id_quiz, question_quiz) VALUES (2, 'Quelle est la deuxième question ?');
INSERT INTO question (id_quiz, question_quiz) VALUES (3, 'Quelle est la troisième question ?');

INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (1, 'Réponse 1', TRUE);
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (2, 'Réponse 2', FALSE);
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (3, 'Réponse 3', TRUE);

INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 1', FALSE, 1, 2);
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 2', TRUE, 2, 3);
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 3', FALSE, 3, 1);

INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (1, 1, 1, 'JeuTest1', 'Résumé du jeu 1', 'image1.jpg', 0);
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (2, 2, 2, 'JeuTest2', 'Résumé du jeu 2', 'image2.jpg', 1);
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (3, 3, 3, 'JeuTest3', 'Résumé du jeu 3', 'image3.jpg', 0);

INSERT INTO JouerA (id_user, id_jeu) VALUES (1, 1);
INSERT INTO JouerA (id_user, id_jeu) VALUES (2, 2);
INSERT INTO JouerA (id_user, id_jeu) VALUES (3, 3);

INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce1', 10, 'Description 1', 1, 1);
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce2', 20, 'Description 2', 2, 2);
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce3', 5, 'Description 3', 3, 3);

INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (1, 1);
INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (2, 2);
INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (3, 3);

INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 1, 80);
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (2, 2, 90);
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (3, 3, 85);

INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 1', 1, 1, 1);
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 2', 2, 2, 2);
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 3', 3, 3, 3);

INSERT INTO Rejoindre (id_user, id_jeu) VALUES (1, 1);
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (2, 2);
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (3, 3);

INSERT INTO Postuler (id_user, id_jeu) VALUES (1, 1);
INSERT INTO Postuler (id_user, id_jeu) VALUES (2, 2);
INSERT INTO Postuler (id_user, id_jeu) VALUES (3, 3);


SELECT * FROM Postuler;
SELECT * FROM Rejoindre;
SELECT * FROM Classer;
SELECT * FROM jouerQuiz;
SELECT * FROM rechercheRapide;
SELECT * FROM Annonce;
SELECT * FROM JouerA;
SELECT * FROM jeu;
SELECT * FROM Messages;
SELECT * FROM reponse;
SELECT * FROM question;
SELECT * FROM quiz;
SELECT * FROM Avoir;
SELECT * FROM Vivre;
SELECT * FROM JouerSur;
SELECT * FROM Preferer;
SELECT * FROM utilisateur;
SELECT * FROM Ville;
SELECT * FROM studio;
SELECT * FROM formats;
SELECT * FROM dates;
SELECT * FROM editeur;
SELECT * FROM plateforme;
SELECT * FROM categorie;
SELECT * FROM NiveauUtilisateur;
SELECT * FROM roleUser;





