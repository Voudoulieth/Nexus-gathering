-- jeux de tests des quiz

INSERT INTO role (id_role, utilisateur_role) VALUES
    (1, 'administrateur'),
    (2, 'utilisateur'),
    (3, 'utilisateur certifié');

INSERT INTO utilisateur (id_utilisateur, id_role) VALUES
    (1, 2), -- ordinaire
    (2, 3), -- certifié
    (3, 1); -- admin
    -- Tentative d'insertion avec un ID rôle qui n'existe pas
INSERT INTO utilisateur (nom_utilisateur, id_role) VALUES (4, 99);

INSERT INTO categorie (id_cat_quiz, nom_cat_quiz) VALUES
    (1, 'Quiz communautaire'),
    (2, 'Quiz officiel');
    -- Tentative d'insertion d'une catégorie avec un id déjà existant
INSERT INTO categorie (id_cat_quiz,nom_cat_quiz) VALUES (1,'Categorie test');

INSERT INTO quiz (id_quiz, id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES
    (1, 1, 2, 'League of Legends', 'lol.jpg', '2024-03-20'),
    (2, 2, 3, 'Genshin Impact', 'genshin.jpg', '2024-03-19'),
    (3, 2, 3, 'Baldur s gate 3', 'baldur.jpg', '2024-03-18');
    -- Titre de quiz très long
INSERT INTO quiz (id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES (1, 1, REPEAT('T', 31), 'photo4.jpg');
    -- Insertion d'un quiz avec un id_cat_quiz qui n'existe pas
INSERT INTO quiz (id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES (999, 1, 'Quiz 5', 'photo5.jpg');
    -- Insertion d'un quiz avec un id_user qui n'existe pas
INSERT INTO quiz (id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES (1, 999, 'Quiz 6', 'photo6.jpg');

INSERT INTO jouer (id_quiz, id_utilisateur, date_jouer_quiz, score_quiz) VALUES
    (1, 1, date(now()), 2),
    (1, 2, '2024-03-21', 3),
    (3, 3, date(now()), 5);
    -- Insertion d'un doublon pour la paire (id_quiz, id_user)
INSERT INTO jouerQuiz (id_quiz, id_user, score_quiz) VALUES (1, 1, 5);

INSERT INTO question (id_question, id_quiz, question_quiz) VALUES
    (1, 1, 'Parmi les champions suivants, lesquels ont une compétence de camouflage ?'), -- question 1 du quiz 1
    (2, 1, 'Qui ne fait pas partie de K/DA ?'), -- question 2 du quiz 1
    (3, 2, 'Quelle est l arme signature de Hu tao ?'); --question 1 du quiz 2
    -- Test avec une question trop longue
INSERT INTO question (id_quiz, question_quiz) VALUES (1, REPEAT('A', 131));
    -- Test avec une question trop courte
INSERT INTO question (id_quiz, question_quiz) VALUES (1, 'a');
    -- Insertion d'une question pour un quiz qui n'existe pas
INSERT INTO question (id_quiz, question_quiz) VALUES (999, 'Quelle est cette question ?');

INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES
    (1, 'Ashe', false),-- réponses à la question 1
    (1, 'Evelyn', true),
    (2, 'Akali', false),-- réponses à la question 2
    (2, 'twitch', true),
    (3, 'Lance de Jade ailée', false), -- réponses à la question 3
    (3, 'Bâton de Homa', true);
    -- Insertion d'une réponse null
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (1, null, TRUE);
    -- Insertion d'une réponse pour une question qui n'existe pas
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (999, 'Réponse 4', TRUE);
    -- Tentative d'insertion d'une réponse sans spécifier si elle est vraie ou fausse
INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES (1, 'Réponse 5');