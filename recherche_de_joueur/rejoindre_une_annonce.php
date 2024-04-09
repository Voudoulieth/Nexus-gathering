<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/rejoindre_une_annonce.css">
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
        <div id="container">
            <section id="panneauFiltre">
                <div id="filtreTitre">
                    <h2 class="titres">Les filtres</h2>
                    <img src="../assets/Icone/sliders-solid orange.svg" alt="slider pour filtre">
                </div>
                <div>
                    <input type="text" placeholder="Nom du jeu" class="formNom" id="rechercheJeu"/>
                    <select name="Nom du jeu" id="nom_du_jeu">
                      <!-- <option value="nom_du_jeu">Nom du jeu</option> a ajouté en bdd -->
                    </select>
                </div>
                <div class="number-input-wrapper">
                    <input
                      type="number"
                      min="2"
                      max="64"
                      placeholder="Nombre de joueurs"
                      class="formNom"
                      id="nbjoueur"
                    />
                    <div class="control-down"><img src="../assets/Icone/minus-solid blanc.svg" alt="-"></div>
                    <div class="control-up"><img src="../assets/Icone/plus-solid blanc.svg" alt="+"></div>
                </div>
                <div id="containerButtonFiltre">
                    <button id="buttonFiltre" class="button buttonFiltre">Filtrer</button>
                    <button id="buttonReset" class="button buttonFiltre">Réinitialiser</button>
                </div>
            </section>
            <section id="annonce">
                <div id="recherche">
                    <h1 class="titres">Rejoindre une annonce</h1>   
                    <input type="search" placeholder="Recherche ton annonce" id="searchbar">
                    <button type="submit"><img src="../assets/Icone/magnifying-glass-solid-blanc.svg" id="loupe"></button>
                </div>
                <div class="tokenplace">
                    <div class="tokenAnnonce">
                        <ul>
                            <li class="annonceTitle">ICC HM 25</li>
                            <li class="annonceGameName">World of Warcraft</li>
                            <li class="annoncePlayerCount">25</li>
                        </ul>
                        <p>Rassemblement, aventuriers aguerris ! Notre guilde cherche des héros de haut vol pour conquérir la Courone de glace. Si vous avez le courage, la stratégie et une soif insatiable de gloire, rejoignez-nous ! Ensemble, écrivons une nouvelle page légendaire dans l'histoire d'Azeroth. Pour la Horde !</p>
                        <button class="button contact">Rejoindre</button>
                    </div>
                </div>
                <div class="tokenplace">
                    <div class="tokenAnnonce">
                        <ul>
                            <li class="annonceTitle">On construit minas tirith</li>
                            <li class="annonceGameName">Minecraft</li>
                            <li class="annoncePlayerCount">4</li>
                        </ul>
                        <p>Cherche compagnons Minecraft pour construire Minas Tirith ! 🏰 Passionnés du Seigneur des Anneaux, unissons nos forces pour recréer cette cité légendaire. Joignez-vous à cette aventure épique !</p>
                        <button class="button contact">Rejoindre</button>
                    </div>
                </div>
                <div class="tokenplace">
                    <div class="tokenAnnonce">
                        <ul>
                            <li class="annonceTitle">Arene 2k2 H</li>
                            <li class="annonceGameName">World of Warcraft</li>
                            <li class="annoncePlayerCount">2</li>
                        </ul>
                        <p>Cherche un heal pour v2 a 2k2 cote, Pal ou duidre de préférence. 635 ilvl mini</p>
                        <button class="button contact">Rejoindre</button>
                    </div>
                </div>
                <div class="tokenplace">
                    <div class="tokenAnnonce">
                        <ul>
                            <li class="annonceTitle">On cherche des Lumas</li>
                            <li class="annonceGameName">Temtem</li>
                            <li class="annoncePlayerCount">2</li>
                        </ul>
                        <p>Cherche un mate pour chassé des Akranox Lumas! Si tu es prêt à relever le défi et à vivre une aventure hors du commun, rejoins-moi pour taux de drop légendaire. Prépare tes meilleurs Temtem, l'aventure commence maintenant !</p>
                        <button class="button contact">Rejoindre</button>
                    </div>
                </div>
                <div id="conteneurAnnonces">

                </div>
            </section>
        </div>    
    </main>
    <footer>
    <?php include '../src/view/footer.inc.php' ?>
    </footer>
    <script type="module" src="./assets/js/validation.js"></script>
    <script type="module" src="./assets/js/rejoindre_une_annonce.js"></script>
  </body>
</html>