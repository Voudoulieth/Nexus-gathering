create database quiz;

use quiz;

drop table if exists reponse;
drop table if exists question;
drop table if exists jouer;
drop table if exists quiz;
drop table if exists categorie;
drop table if exists utilisateur;
drop table if exists roles;

create table roles(
    id_role integer auto_increment,
    utilisateur_role varchar(20) not null,
    primary key (id_role)
);

create table utilisateur(
    id_utilisateur integer auto_increment,
    id_role integer not null,
    primary key (id_utilisateur),
    foreign key (id_role) references roles (id_role)
);

create table categorie(
    id_cat_quiz integer auto_increment,
    nom_cat_quiz varchar(15) not null,
    primary key (id_cat_quiz)
);

create table quiz(
    id_quiz integer auto_increment,
    id_cat_quiz integer not null,
    id_utilisateur integer not null,
    titre_quiz varchar(30) not null,
    photo_quiz varchar(100) not null, -- on stock le nom de l'image
    date_creation_quiz date not null,
    primary key (id_quiz),
    foreign key (id_cat_quiz) references categorie (id_cat_quiz),
    foreign key (id_utilisateur) references utilisateur (id_utilisateur),
    check (length(titre_quiz) >= 2 and length(titre_quiz) <= 30)
);

create table jouer(
    id_quiz  integer not null,
    id_utilisateur integer not null,
    date_jouer_quiz date not null,
    score_quiz tinyint not null,
    primary key (id_quiz, id_utilisateur),
    foreign key (id_quiz) references quiz (id_quiz),
    foreign key (id_utilisateur) references utilisateur (id_utilisateur)
);

create table question(
    id_question integer auto_increment,
    id_quiz  integer not null,
    question_quiz varchar(130) not null check (char_length(question_quiz) >= 2 and char_length(question_quiz) <= 130),
    primary key (id_question),
    foreign key (id_quiz) references quiz (id_quiz)
);

create table reponse(
    id_reponse  integer auto_increment,
    id_question integer not null,
    reponse_quiz varchar(130) not null check (char_length(reponse_quiz) >= 2 and char_length(reponse_quiz) <= 130),
    reponse_vraie_quiz boolean not null,
    primary key (id_reponse),
    foreign key (id_question) references question (id_question),
    CHECK (reponse_vraie_quiz IN (TRUE, FALSE))
);

-- jeux d'essai

INSERT INTO roles (id_role, utilisateur_role) VALUES
    (1, 'administrateur'),
    (2, 'utilisateur'),
    (3, 'utilisateur certifié');

INSERT INTO utilisateur (id_utilisateur, id_role) VALUES
    (1, 2), -- ordinaire
    (2, 3), -- certifié
    (3, 1); -- admin

INSERT INTO categorie (id_cat_quiz, nom_cat_quiz) VALUES
    (1, 'Quiz communautaire'),
    (2, 'Quiz officiel');

INSERT INTO quiz (id_quiz, id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES
    (1, 1, 2, 'League of Legends', 'lol.jpg', '2024-03-20'),
    (2, 2, 3, 'Genshin Impact', 'genshin.jpg', '2024-03-19'),
    (3, 2, 3, 'Baldur s gate 3', 'baldur.jpg', '2024-03-18');

INSERT INTO jouer (id_quiz, id_utilisateur, date_jouer_quiz, score_quiz) VALUES
    (1, 1, date(now()), 2),
    (1, 2, '2024-03-21', 3),
    (3, 3, date(now()), 5);

INSERT INTO question (id_question, id_quiz, question_quiz) VALUES
    (1, 1, 'Parmi les champions suivants, lesquels ont une compétence de camouflage ?'), -- question 1 du quiz 1
    (2, 1, 'Qui ne fait pas partie de K/DA ?'), -- question 2 du quiz 1
    (3, 2, 'Quelle est l arme signature de Hu tao ?'); -- question 1 du quiz 2

INSERT INTO reponse (id_question, reponse_quiz, reponse_vraie_quiz) VALUES
    (1, 'Ashe', false),-- réponses à la question 1
    (1, 'Evelyn', true),
    (2, 'Akali', false),-- réponses à la question 2
    (2, 'twitch', true),
    (3, 'Lance de Jade ailée', false), -- réponses à la question 3
    (3, 'Bâton de Homa', true);