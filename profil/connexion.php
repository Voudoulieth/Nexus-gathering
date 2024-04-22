<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./css/profil.css">
    <link rel="stylesheet" href="./css/connexion_style.css" />
    <script defer src="./assets/js/connexion.js"></script>
    
    <title>Votre profil</title>
    <script defer src="./assets/js/script_edition.js"></script>

    
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
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
                    <input type="text" id="registerUsername" placeholder="Identifiant">
                    <input type="password" id="registerPassword" placeholder="Mot de passe">
                    <input type="email" id="registerEmail" placeholder="Email">
                    <button id="registerSubmit">Inscrivez vous</button>
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
                <input type="text" id="loginUsername" placeholder="Identifiant">
                <input type="password" id="loginPassword" placeholder="Mot de passe">
                <a href="#">Identifiant oublié ?</a>
                <a href="#">Mot de passe oublié ?</a>
                <button id="loginSubmit">Connexion</button>
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
