<!DOCTYPE html>
<html lang="fr">
  <head>
<<<<<<< HEAD:profil/connexion.php
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./css/profil.css">
=======
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Rejoignez une communauté de joueurs, trouvez vos coéquipiers et maintenez a jours vos collections!"
    />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/style_global.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
>>>>>>> parent of 75da1ad (ajout des tests + controles de saisies):Profil/connexion.html
    <link rel="stylesheet" href="./css/connexion_style.css" />
    <title>Votre profil</title>
<<<<<<< HEAD:profil/connexion.php
<<<<<<< HEAD:profil/connexion.php
    <script defer src="./assets/js/script_edition.js"></script>

    
=======
    <link rel="shortcut icon" href="assets/logo/favicon.svg" />
    <script defer src="./assets/js/connexion.js"></script>
>>>>>>> parent of 75da1ad (ajout des tests + controles de saisies):Profil/connexion.html
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
=======
    <link rel="shortcut icon" href="assets/logo/favicon.svg" />
    <script defer src="./assets/js/connexion.js"></script>
  </head>
  <body>
    <header>
      <a href="./index.html">
          <img class="logo" src="../assets/logo/logo_nexus_white.svg" title="Accueil" alt="Logo Nexus">
      </a>
      <div id="menuburger">
          <nav>
              <ul>
                <li><a class="navlink" href="../bibliotheques/acceuil_biblio.html">Bibliothèque</a></li>
                <li><a class="navlink" href="../recherche_de_joueur/recherche_de_joueurs.html">Joueurs</a></li>
                <li><a class="navlink" href="../quiz/quiz-accueil.html">Quiz</a></li>
                <li><a class="navlink" href="../recherche_de_joueur/messagerie.html">Messagerie</a></li>
              </ul>
          </nav>
          <div class="header-moitie">
              <div class="rechercher">
                  <input class="FormulaireRechercher navlink" type="text" placeholder="Rechercher">
                  <button class="SubmitRecherche" type="submit"><img src="./assets/Icone/magnifying-glass-solid blanc.svg"></button>
              </div>
              <button class="BoutonConnexion navlink"><a href="../Profil/connexion.html">Connexion</a></button>
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
<<<<<<< HEAD:profil/connexion.php
>>>>>>> parent of 75da1ad (ajout des tests + controles de saisies):Profil/connexion.html
=======
>>>>>>> parent of 75da1ad (ajout des tests + controles de saisies):Profil/connexion.html
    <main>
        <div class="container" id="container">
            <div class="form-container sign-up">
                <form>
                    <h1>Inscrivez vous</h1>
                    <div class="social-icons">
                      <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" height="16" width="15.25" viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg></a>
                      <!-- TODO définir les connexions tierse  -->
                    </div>
                      
                    <span>Ou vous pouvez utiliser votre email</span>
                    <input type="text" placeholder="Identifiant">
                    <input type="password" placeholder="Mot de passe">
                    <input type="email" placeholder="Email">
                    <button>Inscrivez vous</button>
                </form>
            </div>

            <div class="form-container sign-in">
              <form>
                <h1>Connectez vous</h1>
                <div class="social-icons">
                  <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" height="16" width="15.25" viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg></a>
                      <!-- TODO définir les connexions tierse  -->
                </div>
                <span>Ou vous pouvez utiliser votre identifiant</span>
                <input type="text" placeholder="Identifiant">
                <input type="password" placeholder="Mot de passe">
                <a href="#">Identifiant oublié ?</a>
                <a href="#">Mot de passe oublié ?</a>
                <button>Connexion</button>
              </form>
            </div>
            <div class="toggle-container">
              <div class="toggle">
                  <div class="toggle-panel toggle-left">
                      <h2>Ravis de vous revoir</h2>
                      <p>Utilisez votre moyen de connexion privilégié</p>
                      <button class="hidden" id="login">Connexion</button>
                  </div>
                  <div class="toggle-panel toggle-right">
                      <h2>Bienvenue!</h2>
                      <p>Utilisez votre moyen d'inscription privilégié</p>
                      <button class="hidden" id="register">Inscription</button>
                  </div>
              </div>

            </div>
        </div>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
