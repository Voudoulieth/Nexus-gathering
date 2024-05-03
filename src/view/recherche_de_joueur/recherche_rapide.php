<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="../recherche_de_joueur/assets/css/recherche_rapide.css">
    <title>Recherche rapide</title>
  </head>
  <body>
  <?php include './view/header.inc.php' ?>
    <main>
      <!-- <?php 
      foreach($jeux as $jeu){?>
        <img src="<?=PUBLIC_ROOT?>/assets/Image/<?=$jeu->getImg_jeu()?>" alt="">
      <?php } ?> -->
      
        <div id="recherche">
            <input type="search" placeholder="Recherche ton jeu" id="searchbar">
            <button type="submit"><img src="../assets/Icone/magnifying-glass-solid-blanc.svg" id="loupe"></button>
            <h1>Vos jeux du moment</h1>   
        </div>
        <div id="config" data-app-root="<?= APP_ROOT ?>"></div>
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
    <?php include './view/footer.inc.php' ?>
    <script type="module" src="../recherche_de_joueur/assets/js/recherche_rapide.js"></script>
    </body>
</html>