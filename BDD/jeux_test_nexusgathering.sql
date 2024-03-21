-- Active: 1710969956952@@127.0.0.1@3306@nexusgathering
INSERT INTO roleUser (nom_role) VALUES ('Role 1');
INSERT INTO roleUser (nom_role) VALUES ('Role 2');
INSERT INTO roleUser (nom_role) VALUES ('Role 3');

-- Tentative d'insertion d'un rôle avec un id déjà existant
INSERT INTO roleUser (nom_role) VALUES ('Role 1');


INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 1', 'Description du Niveau 1');
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 2', 'Description du Niveau 2');
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau 3', 'Description du Niveau 3');

-- Insérer un nom de niveau à la limite de la longueur
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES (REPEAT('N', 50), 'Description courte');

-- Insérer une description de niveau à la limite de la longueur
INSERT INTO NiveauUtilisateur (nom_niveau, descrip_niveau) VALUES ('Niveau Test', REPEAT('D', 200));

-- Tentative d'insertion d'un niveau avec un id déjà existant
INSERT INTO NiveauUtilisateur (id_niveau,nom_niveau, descrip_niveau) VALUES (1, 'Niveau 1', 'Une autre description');


INSERT INTO categorie (nom_cat_quiz) VALUES ('Categorie1');
INSERT INTO categorie (nom_cat_quiz) VALUES ('Categorie2');
INSERT INTO categorie (nom_cat_quiz) VALUES ('Categorie3');

-- Tentative d'insertion d'une catégorie avec un id déjà existant
INSERT INTO categorie (id_cat_quiz,nom_cat_quiz) VALUES (1,'Categorie1');

INSERT INTO plateforme (nom_plat) VALUES ('Plateforme1');
INSERT INTO plateforme (nom_plat) VALUES ('Plateforme2');
INSERT INTO plateforme (nom_plat) VALUES ('Plateforme3');

-- Tentative d'insertion d'une plateforme avec un id déjà existant
INSERT INTO plateforme (id_plat,nom_plat) VALUES (1,'Plateforme1');

INSERT INTO editeur (nom_ed) VALUES ('Editeur1');
INSERT INTO editeur (nom_ed) VALUES ('Editeur2');
INSERT INTO editeur (nom_ed) VALUES ('Editeur3');

-- Tentative d'insertion d'un éditeur avec un id déjà existant
INSERT INTO editeur (id_ed,nom_ed) VALUES (1,'Editeur1');

INSERT INTO dates (ddate, hdate) VALUES ('2023-03-21', '12:00:00');
INSERT INTO dates (ddate, hdate) VALUES ('2023-03-22', '13:30:00');
INSERT INTO dates (ddate, hdate) VALUES ('2023-03-23', '15:45:00');

-- Insertion d'une date non valide
INSERT INTO dates (ddate) VALUES ('2023-02-30');

-- Tentative d'insertion d'une date en double
INSERT INTO dates (ddate, hdate) VALUES ('2023-03-21', '16:00:00');

INSERT INTO formats (nom_form) VALUES ('Format1');
INSERT INTO formats (nom_form) VALUES ('Format2');
INSERT INTO formats (nom_form) VALUES ('Format3');

-- Tentative d'insertion d'un format avec un id déjà existant
INSERT INTO formats (id_form,nom_form) VALUES (1,'Format1');

INSERT INTO genre (nom_genre) VALUES ('Genre1');
INSERT INTO genre (nom_genre) VALUES ('Genre2');
INSERT INTO genre (nom_genre) VALUES ('Genre3');

-- Tentative d'insertion d'un genre avec un id déjà existant
INSERT INTO genre (id_genre,nom_genre) VALUES (1,'Genre1');

INSERT INTO studio (id_ed, nom_stu) VALUES (1, 'Studio1');
INSERT INTO studio (id_ed, nom_stu) VALUES (2, 'Studio2');
INSERT INTO studio (id_ed, nom_stu) VALUES (3, 'Studio3');
INSERT INTO studio (id_ed, nom_stu) VALUES (NULL, 'Studio4');

-- Insertion d'un studio avec un id_ed qui n'existe pas
INSERT INTO studio (id_ed, nom_stu) VALUES (999, 'Studio5');

-- Tentative d'insertion d'un studio avec un id déjà existant
INSERT INTO studio (id_stu, nom_stu) VALUES (1, 'Studio1');

INSERT INTO Ville (nom_ville) VALUES ('Ville1');
INSERT INTO Ville (nom_ville) VALUES ('Ville2');
INSERT INTO Ville (nom_ville) VALUES ('Ville3');

-- Tentative d'insertion d'une ville avec un id déjà existant
INSERT INTO Ville (id_ville, nom_ville) VALUES (1,'Ville1');

INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest1', 'Pass123', 'avatar1.jpg', 'user1@example.com', 25, 1);
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest2', 'Pass456', 'avatar2.jpg', 'user2@example.com', 30, 2);
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest3', 'Pass789', 'avatar3.jpg', 'user3@example.com', 35, 3);


-- Tester une insertion avec âge > 13 ans
INSERT INTO Utilisateur(nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('younguser', 'youngpass', 'youngavatar.png', 'younguser@example.com', 14, 1);

-- Tester une insertion avec une chaîne très longue pour le mot de passe
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest5', REPEAT('a', 16), 'avatar5.jpg', 'user5@example.com', 20, 2);

-- Tentative d'insertion d'un utilisateur avec un id déjà existant
INSERT INTO Utilisateur (id_user, nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES (1,'UserTest1', 'Pass999', 'avatar9.jpg', 'user9@example.com', 45, 1);

-- Test avec un âge non autorisé (moins de 13 ans)
INSERT INTO Utilisateur(nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('tooyoung', 'tooyoungpass', 'tooyoungavatar.png', 'tooyoung@example.com', 12, 1);

-- Tentative d'insertion avec un ID de rôle qui n'existe pas
INSERT INTO Utilisateur (nom_user, mot_de_passe, avatar, mail, age, id_role) VALUES ('UserTest6', 'Pass112', 'avatar6.jpg', 'user6@example.com', 40, 99);

INSERT INTO Preferer (id_user, id_genre) VALUES (1, 1);
INSERT INTO Preferer (id_user, id_genre) VALUES (2, 2);
INSERT INTO Preferer (id_user, id_genre) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Preferer (id_user, id_genre) VALUES (1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO Preferer (id_user, id_genre) VALUES (999, 1);

INSERT INTO JouerSur (id_user, id_plat) VALUES (1, 1);
INSERT INTO JouerSur (id_user, id_plat) VALUES (2, 2);
INSERT INTO JouerSur (id_user, id_plat) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO JouerSur (id_user, id_plat) VALUES (1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO JouerSur (id_user, id_plat) VALUES (999, 1);

INSERT INTO Vivre (id_ville, id_user) VALUES (1, 1);
INSERT INTO Vivre (id_ville, id_user) VALUES (2, 2);
INSERT INTO Vivre (id_ville, id_user) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Vivre (id_ville, id_user) VALUES (1, 1);

-- Insertion avec un id_ville qui n'existe pas
INSERT INTO Vivre (id_ville, id_user) VALUES (999, 1);

INSERT INTO Avoir (id_user, id_niveau) VALUES (1, 1);
INSERT INTO Avoir (id_user, id_niveau) VALUES (2, 2);
INSERT INTO Avoir (id_user, id_niveau) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Avoir (id_user, id_niveau) VALUES (1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO Avoir (id_user, id_niveau) VALUES (999, 1);

INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (1, 1, 'Quiz 1', 'photo1.jpg');
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (2, 2, 'Quiz 2', 'photo2.jpg');
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (3, 3, 'Quiz 3', 'photo3.jpg');

-- Titre de quiz très long
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (1, 1, REPEAT('T', 31), 'photo4.jpg');  -- Adaptez la longueur si nécessaire

-- Insertion d'un quiz avec un id_cat_quiz qui n'existe pas
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (999, 1, 'Quiz 4', 'photo5.jpg');

-- Insertion d'un quiz avec un id_user qui n'existe pas
INSERT INTO quiz (id_cat_quiz, id_user, titre_quiz, photo_quiz) VALUES (1, 999, 'Quiz 5', 'photo6.jpg');

INSERT INTO question (id_quiz, question_quiz) VALUES (1, 'Quelle est la première question ?');
INSERT INTO question (id_quiz, question_quiz) VALUES (2, 'Quelle est la deuxième question ?');
INSERT INTO question (id_quiz, question_quiz) VALUES (3, 'Quelle est la troisième question ?');

-- Test avec une question très longue
INSERT INTO question (id_quiz, question_quiz) VALUES (1, REPEAT('A', 131));

-- Insertion d'une question pour un quiz qui n'existe pas
INSERT INTO question (id_quiz, question_quiz) VALUES (999, 'Quelle est cette question ?');

-- Insertion d'une question sans texte
INSERT INTO question (id_quiz, question_quiz) VALUES (1, NULL);

INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (1, 'Réponse 1', TRUE);
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (2, 'Réponse 2', FALSE);
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (3, 'Réponse 3', TRUE);

-- Insertion d'une réponse pour une question qui n'existe pas
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (999, 'Réponse 4', TRUE);

-- Tentative d'insertion d'une réponse sans spécifier si elle est vraie ou fausse
INSERT INTO reponse (id_question, reponse_quiz) VALUES (1, 'Réponse 5');

INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 1', FALSE, 1, 2);
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 2', TRUE, 2, 3);
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 3', FALSE, 3, 1);

-- Insertion d'un message où l'expéditeur et le destinataire sont les mêmes
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 4', FALSE, 1, 1);

-- Insertion avec un id_exped qui n'existe pas
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 5', TRUE, 999, 2);

-- Insertion avec un id_desti qui n'existe pas
INSERT INTO Messages (contenu_mess, modif, id_exped, id_desti) VALUES ('Message 6', FALSE, 1, 999);


--- ON EN EST ICIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII

INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (1, 1, 1, 'JeuTest1', 'Résumé du jeu 1', 'image1.jpg', 0);
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (2, 2, 2, 'JeuTest2', 'Résumé du jeu 2', 'image2.jpg', 1);
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (3, 3, 3, 'JeuTest3', 'Résumé du jeu 3', 'image3.jpg', 0);

-- Nom du jeu très long
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (1, 1, 1, REPEAT('x', 41), 'Résumé du jeu 4', 'image4.jpg', 1);

-- Résumé du jeu très long
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (2, 2, 2, 'JeuTest5', REPEAT('y', 501), 'image5.jpg', 0);


-- ID de l'éditeur qui n'existe pas
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (999, 1, 1, 'JeuTest6', 'Résumé du jeu 6', 'image6.jpg', 1);

-- Violation de la contrainte de clé unique pour nom_jeu
INSERT INTO jeu (id_ed, id_user, id_stu, nom_jeu, resum_jeu, img_jeu, multi) VALUES (1, 2, 2, 'JeuTest1', 'Résumé du jeu 7', 'image7.jpg', 0);

INSERT INTO JouerA (id_user, id_jeu) VALUES (1, 1);
INSERT INTO JouerA (id_user, id_jeu) VALUES (2, 2);
INSERT INTO JouerA (id_user, id_jeu) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO JouerA (id_user, id_jeu) VALUES (1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO JouerA (id_user, id_jeu) VALUES (999, 1);

INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce1', 10, 'Description 1', 1, 1);
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce2', 20, 'Description 2', 2, 2);
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce3', 5, 'Description 3', 3, 3);

-- Valeur minimale pour nb_user
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce4', 1, 'Description 4', 1, 1);

-- Valeur maximale pour nb_user
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce5', 64, 'Description 5', 2, 2);

-- Insérer une annonce avec un nb_user en dehors de la plage valide
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce6', 65, 'Description 6', 3, 3);

-- Insérer une annonce avec un id_user qui n'existe pas
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce7', 10, 'Description 7', 999, 1);

-- Insérer une annonce avec un id_jeu qui n'existe pas
INSERT INTO Annonce (nom_annonce, nb_user, desc_annonce, id_user, id_jeu) VALUES ('Annonce8', 10, 'Description 8', 1, 999);

INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (1, 1);
INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (2, 2);
INSERT INTO rechercheRapide (id_user, id_jeu) VALUES (3, 3);
-- Tentative d'insertion d'un doublon
INSERT INTO rechercheRapide (id_session, id_user, id_jeu) VALUES (1,1, 1);

INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 1, 80);
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (2, 2, 90);
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (3, 3, 85);

-- Score minimal

INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 4, 0);
-- Score maximal
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 2 , 100);

-- Insertion d'un doublon pour la paire (id_quiz, id_user)
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 1, 75);


-- Insertion d'une valeur non valide pour score_quiz (inférieure à 0)
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (2, 7, -10);

INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 1', 1, 1, 1);
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 2', 2, 2, 2);
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 3', 3, 3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 4', 1, 1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 5', 999, 1, 1);

-- Insertion avec un id_jeu qui n'existe pas
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 6', 1, 999, 1);

-- Insertion avec un id_niveau qui n'existe pas
INSERT INTO Classer (rank_user, id_user, id_jeu, id_niveau) VALUES ('Rank 7', 1, 1, 999);

INSERT INTO Rejoindre (id_user, id_jeu) VALUES (1, 1);
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (2, 2);
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (1, 1);

-- Insertion avec un id_user qui n'existe pas
INSERT INTO Rejoindre (id_user, id_jeu) VALUES (999, 1);

INSERT INTO Postuler (id_user, id_jeu) VALUES (1, 1);
INSERT INTO Postuler (id_user, id_jeu) VALUES (2, 2);
INSERT INTO Postuler (id_user, id_jeu) VALUES (3, 3);

-- Tentative d'insertion d'un doublon
INSERT INTO Postuler (id_user, id_jeu) VALUES (1, 1);

-- Insertion avec un id_jeu qui n'existe pas
INSERT INTO Postuler (id_user, id_jeu) VALUES (1, 999);