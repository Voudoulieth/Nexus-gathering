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
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style_global.css">
    <link rel="stylesheet" href="./css/style_index.css">
    <!-- <script defer src=""></script> -->
    <link rel="shortcut icon" href="./assets/logo/favicon.svg">
    <title>Accueil - Nexus Gathering</title>
  </head>
  <body>
    <header>
        <a href="./index.php">
            <img class="logo" src="./assets/logo/logo_nexus_white.svg" title="Accueil" alt="Logo Nexus">
        </a>
        <div id="menuburger">
            <nav>
                <ul>
                    <li><a class="navlink" href="./bibliotheques/vacceuilbiblio.php">Bibliothèque</a></li>
                    <li><a class="navlink" href="./recherche_de_joueur/recherche_de_joueurs.php">Joueurs</a></li>
                    <li><a class="navlink" href="./quiz/quiz-accueil.php">Quiz</a></li>
                    <li><a class="navlink" href="./recherche_de_joueur/messagerie.php">Messagerie</a></li>
                </ul>
            </nav>
            <div class="header-moitie">
                <div class="rechercher">
                    <input class="FormulaireRechercher navlink" type="text" placeholder="Rechercher">
                    <button class="SubmitRecherche" type="submit"><img src="./assets/Icone/magnifying-glass-solid-blanc.svg"></button>
                </div>
                <button class="BoutonConnexion navlink">Connexion</button>
            </div>
        </div>
        <a href="#" id="openMenuBurger"><!--TODO javascript pour ouvrir le menu burger et afficher la navbar mobile-->
            <span class="burger-icon">
              <span></span>
              <span></span>
              <span></span>
            </span>
        </a>
    </header>
    <main>
      <div id="titlecarousel">
        <h1 class="titres">NOUVEAUTES</h1>
        <h2 class="titres">Des nouveaux jeux à l'affiche !</h2>
      </div>
      <div id="carousel">
        <button class="precedent">
          <img src="./assets/Icone/arrow-left-solid orange.svg" alt="bouton fleche gauche" class="arrow" id="suivant">
        </button>
        <div id="carousel-content"></div>
        <button class="suivant">
          <img src="./assets/Icone/arrow-right-solid orange.svg" alt="bouton fleche droite" class="arrow" id="precedent">
        </button> 
      </div>
      <hr id="ligne">
      <div id="titlequizz">
        <h2 class="titres">Quiz le plus populaire</h2>
        <h3 class="titres">Quiz League of Legends</h3>
      </div>
      <div class="image-container">
        <a href="lien" id="imagequizz"> <!--lien à mettre à jour-->
            <img src="./assets/Image/LeagueofLegendQizz.jpg" alt="Image du quiz" >
        </a>
      </div>
    </main>
    <footer>
      <div>
        <a href="./index.php">
          <img class="logo" src="./assets/logo/logo_long_nexus_white.svg" title="Acceuil" alt="Logo Nexus Blanc">
        </a>
        <nav>
          <ul>
            <li><a class="navlink" href="./cgu.php">CGU</a></li>
            <li><a class="navlink" href="./mention_legale.php">Mention légale</a></li>
            <li><a class="navlink" href="./confidentialite.php">Politique de confidentialité</a></li>
            <li><a class="navlink" href="./contact.php">Contact</a></li>
          </ul>
        </nav>
      </div>
      <p class="copyright">COPYRIGHT @ 2024 TOUS DROITS RESERVE</p>
    </footer>
    <script type="module" src="./js/index.js"></script>
  </body>
</html>
