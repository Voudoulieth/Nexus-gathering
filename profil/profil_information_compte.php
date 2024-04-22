<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./css/profil.css" />
    <title>Votre profil - Information de compte</title>
  
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
    <main>
      <div class="profil">
        <div class="profil_avatar">
            <img class="profil_avatar_img" src="./assets/img/Lucian.jpg" alt="">
        </div>
        <div class="profil_hero">
          <h1 class="profil_hero_title">Voudoulieth</h1>
          <p>(Admin)</p>
        </div>
    </div>
    <div class="btnprincipal">
      <button class="btnprincipal_hero" type="button" action="#"">Bibliothèque privée</button>
      <button class="btnprincipal_hero" type="button" action="#"">Vitrine publique</button>
      <button class="btnprincipal_hero"  type="button" action="#"">Gestion de compte</button>
    </div>

        <div id="container">
          <aside class="m">
            <nav class="container_menu">
              <ul>
                <li><a href="#">Information du compte</a></li>
                <li><a href="#">Intégration</a></li>
                <li><a href="#">Devenir contributeur</a></li>
              </ul>
          </nav>
          </aside>
          <form class="container_validation" method = "get"  action = "#">
            <div id="login">
              <p>Votre login</p>
              <input id="login" name ="login" type="text">
              <label for="login">Votre Login</label>
            </div>
            <div id="mail">
              <p>Changement de l'adresse mail</p>
              <input id="mail" name ="mail" type="mail" placeholder="Adresse email actuelle">
              <input id="mail" name ="mail" type="mail" placeholder="Nouvelle adresse">
              </div>
            <div id="mdp">
              <p>Changement mot de passe</p>
              <input id="mdp" name ="mdp" type="password" placeholder="Votre mot de passe actuel">
              <input id="mdp" name ="mdp" type="password" placeholder="Nouveau mot de passe">
              </div>

              <div>
                <button type="button">Confirmer</button>
                <button type="button">Annuler</button>
              </div>
              <div>
                <button type="button">Supprimer mon compte</button>
              </div>
          </form>
            
            
        </div>

    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
