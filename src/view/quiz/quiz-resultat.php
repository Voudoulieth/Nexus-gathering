<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="quiz-css/resultats.css">
    <!--scripts-->
    <script defer src="../../../quiz/quiz-js/data.js"></script>
    <script defer type="module" src="../../../quiz/quiz-js/resultats.js"></script>
    <title>Resultats du quiz - Nexus Gathering</title>
  </head>
  <body>
  <?php include '../header.inc.php' ?>
    <main>
      <h1 class="titres">Titre du quiz</h1>
      <h2 class="titres">Voici votre score : <span>2/3</span></h2>
      <div id="containerResultats" class="resultats">
        <!--injecter dynamiquement les stats-->
      </div>
      <a class="bouton" href="#">Envie de rejoindre la communauté ?</a>
    </main>
    <?php include '../footer.inc.php' ?>
  </body>
</html>