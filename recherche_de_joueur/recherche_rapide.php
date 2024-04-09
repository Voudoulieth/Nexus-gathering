<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/recherche_rapide.css">
    <title>Recherche rapide</title>
  </head>
  <body>
    <header>
        <a href="../index.html">
            <img class="logo" src="../assets/logo/logo_nexus_white.svg" title="Accueil" alt="Logo Nexus">
        </a>
        <div id="menuburger">
            <nav>
                <ul>
                    <li><a class="navlink" href="../bibliotheques/acceuil_biblio.html">Bibliothèque</a></li>
                    <li><a class="navlink" href="./recherche_de_joueurs.html">Joueurs</a></li>
                    <li><a class="navlink" href="../quiz/quiz-accueil.html">Quiz</a></li>
                    <li><a class="navlink" href="../recherche_de_joueur/messagerie.html">Messagerie</a></li>
                </ul>
            </nav>
            <div class="header-moitie">
                <div class="rechercher">
                    <input class="FormulaireRechercher navlink" type="text" placeholder="Rechercher">
                    <button class="SubmitRecherche" type="submit"><img src="../assets/Icone/magnifying-glass-solid-blanc.svg"></button>
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
        <div id="recherche">
            <input type="search" placeholder="Recherche ton jeu" id="searchbar">
            <button type="submit"><img src="../assets/Icone/magnifying-glass-solid-blanc.svg" id="loupe"></button>
            <h1>Vos jeux du moment</h1>   
        </div>
        <div id="carousel">
            <button>
                <img src="../assets/Icone/arrow-left-solid orange.svg" alt="bouton fleche gauche" class="arrow" id="suivant">
              </button>
              <div id="carousel-content"></div>
            <button>
                <img src="../assets/Icone/arrow-right-solid orange.svg" alt="bouton fleche droite" class="arrow" id="precedent">
              </button> 
        </div>
    </main>
    <footer>
        <div>
          <a href="../index.html">
            <img class="logo" src="../assets/logo/logo_long_nexus_white.svg" title="Acceuil" alt="Logo Nexus Blanc">
          </a>
          <nav>
            <ul>
              <li><a class="navlink" href="../cgu.html">CGU</a></li>
              <li><a class="navlink" href="../mention_legale.html">Mention légale</a></li>
              <li><a class="navlink" href="../confidentialite.html">Politique de confidentialité</a></li>
              <li><a class="navlink" href="../contact.html">Contact</a></li>
            </ul>
          </nav>
        </div>
        <p class="copyright">COPYRIGHT @ 2024 TOUS DROITS RESERVE</p>
      </footer>
      <script type="module" src="./assets/js/recherche_rapide.js"></script>
    </body>
  </html>