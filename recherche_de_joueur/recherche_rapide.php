<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/recherche_rapide.css">
    <title>Recherche rapide</title>
  </head>
  <body>
  <?php include '../src/view/header.inc.php' ?>
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
    <?php include '../src/view/footer.inc.php' ?>
    <script type="module" src="./assets/js/recherche_rapide.js"></script>
    </body>
</html>