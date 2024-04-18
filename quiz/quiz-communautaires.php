<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="./quiz-css/quiz-officiels-et-communautaires.css">
    <link rel="stylesheet" href="./quiz-css/quiz-communautaires.css">
    <!--scripts-->
    <script defer src="./quiz-js/data.js"></script>
    <script defer type="module" src="./quiz-js/communautaires.js"></script>
    <title>Quiz Communautaires - Nexus Gathering</title>
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
    <main>
      <div class="creerQuizCommu">
        <p>Envie de proposer votre propre quiz à la communauté Nexus ?</p>
        <a class="boutonCreer bouton" href="quiz-creer.php">Créer un quiz communautaire</a>
      </div>
      <div class="galerie" id="galerieCommunautaire">
        <!--Les quiz sont gérés de façon dynamique, ils se situent pour l'instant dans le fichier data.js-->
      </div>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>