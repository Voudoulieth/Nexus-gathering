<!DOCTYPE html>
<html lang="fr">
  <head>
  <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="../css/style_index.css">
    <title>Accueil - Nexus Gathering</title>
  </head>
  <body>
  <?php include './view/header.inc.php' ?>
    <main>
      <div id="titlecarousel">
        <h1 class="titres">NOUVEAUTES</h1>
        <h2 class="titres">Des nouveaux jeux à l'affiche !</h2>
      </div>
      <div id="carousel">
        <button class="precedent">
          <img src="../assets/Icone/arrow-left-solid orange.svg" alt="bouton fleche gauche" class="arrow" id="suivant">
        </button>
        <div id="carousel-content"></div>
        <button class="suivant">
          <img src="../assets/Icone/arrow-right-solid orange.svg" alt="bouton fleche droite" class="arrow" id="precedent">
        </button> 
      </div>
      <hr id="ligne">
      <div id="titlequizz">
        <h2 class="titres">Quiz le plus populaire</h2>
        <h3 class="titres">Quiz League of Legends</h3>
      </div>
      <div class="image-container">
        <a href="lien" id="imagequizz"> <!--lien à mettre à jour-->
            <img src="../assets/Image/LeagueofLegendQizz.jpg" alt="Image du quiz" >
        </a>
      </div>
    </main>
    <?php include './view/footer.inc.php' ?>
    <script type="module" src="../js/index.js"></script>
  </body>
</html>
