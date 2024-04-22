<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <title>Votre profil</title>
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
    <main>
        <div>
            <img src="" alt="">
            <h1 class="text-center flex">Profil (Pseudo)</h1>
            <p>(status du compte)</p>
        </div>
        <form method="get" action="#">
            <button type="button" action="#"">Bibliothèque privée</button>
            <button type="button" action="#"">Vitrine publique</button>
            <button type="button" action="#"">Gestion de compte</button>
        </form>

        <div class="container">
          <nav class="menu">
            <ul>
              <li><a href="#">Information du compte</a></li>
              <li><a href="#">Intégration</a></li>
              <li><a href="#">Devenir contributeur</a></li>
            </ul>
          </nav>
          <form method = "get"  action = "#">
            <div id="login">
              <p>Veuillez écrire une présentation (500 caractères minimum)</p>
              <textarea name="" id="" cols="50" rows="10" placeholder="Présentation"></textarea>
              </div>
            <div id="mail">
              <p>Veuillez écrire vos motivations (500 caractères minimum)</p>
              <textarea name="" id="" cols="50" rows="10" placeholder="Motivation"></textarea>
              </div>
              <div>
                <button type="button">Confirmer</button>
                <button type="button">Annuler</button>
              </div>
          </form>
            
            
        </div>

    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
