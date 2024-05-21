<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="../../../quiz/quiz-css/quiz-officiels-et-communautaires.css">
    <link rel="stylesheet" href="../../../quiz/quiz-css/quiz-officiels.css">
    <!--scripts-->
    <script defer src="../../../quiz/quiz-js/data.js"></script>
    <script defer type="module" src="../../../quiz/quiz-js/officiels.js"></script>
    <title>Quiz officiels - Nexus Gathering</title>
  </head>
  <body>
  <?php include '../header.inc.php' ?>
    <main>
      <a class="boutonCreer bouton" href="quiz-creer.html">Créer un quiz officiel (administrateurs)</a>
      <div class="galerie" id="galerieOfficiel">
        <!--Les quiz sont gérés de façon dynamique, ils se situent pour l'instant dans le fichier data.js-->
      </div>
    </main>
    <?php include '../footer.inc.php' ?>
  </body>
</html>