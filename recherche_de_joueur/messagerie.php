<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/messagerie.css">
    <title>Messagerie - Nexus Gathering</title>
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
        <div id="messagerieContainer">
            <section id="contactContainer">
                <h1 class="titres">Contact</h1>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Nom du joueur</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Nom du joueur</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Legluc</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Lumiex</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Kiwi</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Voudou</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Yurigorkha</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Ezerya</p>
                    <button class="button">Contacter</button>
                </div>

            </section>
            <div id="affichageMessage">
                <section>
                    <div id="contactEnCour">
                        <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                        <p>Nom du joueur</p>
                    </div>
                    <div id="blockMessage">
                        <!-- <p>affichage des messages</p> -->
                    </div>
                </section>
                <section id="saisieMessage">
                    <textarea id="inputMessage" placeholder="Envoyer un message"></textarea>
                    <button type="button" class="button" id="sendButton">Envoyer</button>
                </section>
            </div>
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
      <script src="./assets/js/messagerie.js"></script>
    </body>
  </html>