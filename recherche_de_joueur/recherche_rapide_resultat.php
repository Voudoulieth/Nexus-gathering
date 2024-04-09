<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/recherche_rapide_resultat.css">
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
        <h1 id="titre">Nom du jeu</h1>
        <div class="tokenplace">
            <div class="tokenjoueur">
                <a href="" class="photoProfil"><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                <ul>
                    <li >Nom du joueur</li>
                    <li>Niveau de jeu</li>
                    <li>nombre de jeu dans la collection</li>
                </ul>
                <a href="./messagerie.html"><button  class="button contact">Contacter</button></a>
            </div>
        </div>
        <div class="tokenplace">
            <div class="tokenjoueur">
                <a href="" class="photoProfil"><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                <ul>
                    <li >Nom du joueur</li>
                    <li>Niveau de jeu</li>
                    <li>nombre de jeu dans la collection</li>
                </ul>
                <a href="./messagerie.html"><button  class="button contact">Contacter</button></a>
            </div>
        </div>
        <div class="tokenplace">
            <div class="tokenjoueur">
                <a href="" class="photoProfil"><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                <ul>
                    <li >Legluc</li>
                    <li>Niveau de jeu</li>
                    <li>nombre de jeu dans la collection</li>
                </ul>
                <a href="./messagerie.html"><button  class="button contact">Contacter</button></a>
            </div>
        </div>        <div class="tokenplace">
            <div class="tokenjoueur">
                <a href="" class="photoProfil"><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs" ></a>
                <ul>
                    <li >Lumiex</li>
                    <li>Niveau de jeu</li>
                    <li>nombre de jeu dans la collection</li>
                </ul>
                <a href="./messagerie.html"><button  class="button contact">Contacter</button></a>
            </div>
        </div>        <div class="tokenplace">
            <div class="tokenjoueur">
                <a href=""  class="photoProfil"><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                <ul>
                    <li >Kiwi</li>
                    <li>Niveau de jeu</li>
                    <li>nombre de jeu dans la collection</li>
                </ul>
                <a href="./messagerie.html"><button  class="button contact">Contacter</button></a>
            </div>
        </div>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
    <script src="./assets/js/recherche_rapide_resultat.js"></script>
    </body>
</html>