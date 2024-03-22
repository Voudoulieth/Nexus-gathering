create database quiz;

use quiz;

DROP table if exists quiz;
drop table if exists categorie;
drop table if exists question;
drop table if exists reponse;
drop table if exists jouer;
drop table if exists utilisateur;
drop table if exists role;

create table role(
    id_role integer auto_increment,
    utilisateur_role varchar(20) not null,
    primary key (id_role)
);

create table utilisateur(
    id_utilisateur integer auto_increment,
    id_role integer not null,
    primary key (id_utilisateur),
    foreign key (id_role) references role (id_role)
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
    foreign key (id_utilisateur) references utilisateur (id_utilisateur)
);

create table jouer(
    id_quiz  integer not null,
    id_utilisateur integer not null,
    date_jouer_quiz date not null,
    score_quiz tinyint,
    primary key (id_quiz, id_utilisateur),
    foreign key (id_quiz) references quiz (id_quiz),
    foreign key (id_utilisateur) references utilisateur (id_utilisateur)
);

create table question(
    id_question integer auto_increment,
    id_quiz  integer not null,
    question_quiz varchar(130) not null,
    primary key (id_question),
    foreign key (id_quiz) references quiz (id_quiz)
);

create table reponse(
    id_reponse  integer auto_increment,
    id_question integer not null,
    reponse_quiz varchar(130) not null,
    reponse_vraie_quiz boolean not null,
    primary key (id_reponse),
    foreign key (id_question) references question (id_question)
);

-- jeux de tests

INSERT INTO role (id_role, utilisateur_role) VALUES
    (1, 'administrateur'),
    (2, 'utilisateur'),
    (3, 'utilisateur certifié');

INSERT INTO utilisateur (id_utilisateur, id_role) VALUES
    (1, 2), -- ordinaire
    (2, 3), -- certifié
    (3, 1); -- admin

INSERT INTO categorie (id_cat_quiz, nom_cat_quiz) VALUES
    ('cat_comm', 'Quiz communautaire'),
    ('cat_off', 'Quiz officiel');

INSERT INTO quiz (id_quiz, id_cat_quiz, id_utilisateur, titre_quiz, photo_quiz, date_creation_quiz) VALUES
    ('qc1', 'cat_comm', 2, 'League of Legends', 'lol.jpg', '2024-03-20'),
    ('qo1', 'cat_off', 3, 'Genshin Impact', 'genshin.jpg', '2024-03-19'),
    ('qo2', 'cat_off', 3, 'Baldur s gate 3', 'baldur.jpg', '2024-03-18');

INSERT INTO jouer (id_quiz, id_utilisateur, date_jouer_quiz, score_quiz) VALUES
    ('qc1', 1, date(now()), 2),
    ('qo1', 2, '2024-03-21', 3),
    ('qo2', 3, date(now()), 5);

INSERT INTO question (id_question, id_quiz, question_quiz) VALUES
    ('qc1-question-1', 'qc1', 'Parmi les champions suivants, lesquels ont une compétence de camouflage ?'),
    ('qc1-question-2', 'qc1', 'Qui ne fait pas partie de K/DA ?'),
    ('qo1-question-1', 'qo1', 'Quelle est l arme signature de Hu tao ?');

INSERT INTO reponse (id_reponse, id_question, reponse_quiz, reponse_vraie_quiz) VALUES
    ('qc1-question-1-reponsesChoix-1', 'qc1-question-1', 'Ashe', false),
    ('qc1-question-1-reponsesChoix-2', 'qc1-question-1', 'Evelyn', true),
    ('qc1-question-2-reponsesChoix-1', 'qc1-question-2', 'Akali', false),
    ('qc1-question-2-reponsesChoix-2', 'qc1-question-2', 'twitch', true),
    ('qo1-question-1-reponsesChoix-1', 'qo1-question-1', 'Lance de Jade ailée', false),
    ('qo1-question-1-reponsesChoix-2', 'qo1-question-1', 'Bâton de Homa', true);