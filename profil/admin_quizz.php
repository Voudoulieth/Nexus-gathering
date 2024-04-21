<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <title>Votre profil</title>
    <link rel="shortcut icon" href="assets/logo/favicon.svg" />
    <script defer src=""></script>
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
              <li><a href="#">Tableaux de bords</a></li>
              <li><a href="#">Analytique</a></li>
              <li><a href="#">Comptes</a></li>
              <li><a href="#">Jeux</a></li>
              <li><a href="#">Quizz</a></li>
              <li><a href="#">Sécurité</a></li>
              <li><a href="#">Outils</a></li>
              <li><a href="#">Supports</a></li>
            </ul>
          </nav>
          <div>
            <button type="button">Ajout</button>
            <button type="button">Modification</button>
            <button type="button">Suppression</button>
          </div>
          <table>
            <thead>
              <tr>
                <th colspan="5">Liste des jeux</th>
              </tr>
            </thead>
            <tbody>
              
          </table>
  
</table>
          </table>
            
            
        </div>

    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
