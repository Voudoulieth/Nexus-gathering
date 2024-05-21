<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rejoignez une communauté de joueurs, trouvez vos coéquipiers et maintenez a jours vos collections!">
    <!-- Import Changa -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa&display=swap" rel="stylesheet">
    <!-- Feuilles de style CSS et Bootstrap-->
    <link rel="stylesheet" href="../css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../quiz/quiz-css/accueil-quiz.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/logo/favicon.svg">
    <title>Accueil Quiz - Nexus Gathering</title>

    <!-- Page Bootstrap, donc pas d'utilisation des composants de la view car ça entre en conflit avec Bootstrap-->
  </head>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
          <img class="logo" src="../assets/logo/logo_nexus_white.svg" alt="Logo Nexus" title="Accueil">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon navbar-dark"></span>
        </button> <!-- menu burger -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> <!-- responsive -->
          <div class="largeurnav me-auto">
              <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-around">
              <li class="nav-item">
                <a class="nav-link texte-basique"  href="../bibliotheques/acceuil_biblio.php">Bibliothèque</a>
              </li>
              <li class="nav-item">
                <a class="nav-link texte-basique" href="../recherche_de_joueur/recherche_rapide.php">Joueurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active texte-basique" aria-current="page" href="quiz-accueil.php">Quiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link texte-basique" href="../recherche_de_joueur/messagerie.php">Messagerie</a>
              </li>
            </ul>
          </div>
          <form class="d-flex" role="search">
            <input class="form-control bg-transparent texte-basique" type="search" placeholder="Rechercher" aria-label="Search">
            <button type="submit" class="btn ml-5">
              <img class="SubmitRecherche" src="../assets/Icone/magnifying-glass-solid-blanc.svg" alt="soumettre la recherche">
            </button>
          </form>
          <button type="button" class="btn pt-1 pb-1 connexion texte-basique mt-1">Connexion</button>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <!--bouton pour accéder au panneau admin, visible pour les administrateurs, display:none pour le reste des utiliateurs-->
    <a class="btn pt-1 pb-1 connexion texte-basique m-3" href="quiz-panneau-admin.php">Page de gestion administrateur</a>
    <h1 class="d-flex justify-content-center mt-3 texte-basique titre1">Découvrez les quiz les plus populaires !</h1>
    <!-- début carousel quiz récents bootstrap -->
    <div id="carouselExampleCaptions" class="carousel slide mx-auto col-6 mt-4 mb-4">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <a href="./quiz-jouer/quiz-jouer-off-genshin.php">
            <img src="quiz-assets/couverture-quiz/genshin.jpeg" class="d-block w-100" alt="quiz officiel genshin impact">
          </a>
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-shadow">Genshin Impact</h5>
          </div>
        </div>
        <div class="carousel-item">
          <a href="quiz-jouer/quiz-jouer-off-baldur.php">
            <img src="quiz-assets/couverture-quiz/baldur.jpg" class="d-block w-100" alt="quiz officiel baldur's gate 3">
          </a>
          <div class="carousel-caption d-none d-md-block">
            <h5>Baldur's gate 3</h5>
          </div>
        </div>
        <div class="carousel-item">
          <a href="quiz-jouer/quiz-jouer-com-lol.php">
            <img src="quiz-assets/couverture-quiz/lol.jpg" class="d-block w-100" alt="quiz officiel league of legends">
          </a>
          <div class="carousel-caption d-none d-md-block">
            <h5>League of legends</h5>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </button>
    </div>
    <!-- fin carousel quiz récents bootstrap -->
    <div class="d-flex justify-content-center">
      <hr class="text-light tailleligne">
    </div>
    <!--Catégories de quiz, officiels ou communautaires, redirection vers leurs pages respectives-->
    <div class="container">
    <div class="row">
      <figure class="col-12 col-md-6 d-flex flex-column align-items-center">
        <figcaption class="texte-basique d-flex justify-content-center my-2">Quiz officiels</figcaption>
        <a class="d-flex justify-content-center" href="quiz-officiels.php">
          <img class="imageQuiz" src="quiz-assets/quiz-officiels.png" alt="Lien vers les quiz officiels">
        </a>
      </figure>
      <figure class="col-12 col-md-6 d-flex flex-column align-items-center">
        <figcaption class="texte-basique d-flex justify-content-center my-2">Quiz communautaires</figcaption>
        <a class="d-flex justify-content-center" href="quiz-communautaires.php">
          <img class="imageQuiz" src="quiz-assets/quiz-communautaires.png" alt="Lien vers les quiz communautaires">
        </a>
      </figure>
    </div>
    </div>
  </main>
  <footer class="footer pt-2">
    <div class="container">
      <div class="row justify-content-end">
        <a class="col-3" href="../index.php">
          <img class="logo" src="../assets/logo/logo_long_nexus_white.svg" title="Accueil" alt="Logo Nexus">
        </a>
        <a class="col-4 col-md-2 nav-link texte-basique"  href="../cgu.php">CGU</a>
        <a class="col-5 col-md-3 nav-link texte-basique" href="../mention_legale.php">Mention légale</a>
        <a class="col-4 col-md-3 nav-link texte-basique" aria-current="page" href="../confidentialite.php">Politique de confidentialité</a>
        <a class="col-5 col-md-1 nav-link texte-basique" href="../contact.php">Contact</a>
        <p class="texte-basique mx-auto mt-2 mb-2 col-12 d-flex justify-content-center copyright">COPYRIGHT @ 2024 TOUS DROITS RESERVES</p>
      </div>
    </div>
  </footer>
  </body>
</php>