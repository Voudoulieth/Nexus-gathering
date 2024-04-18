<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="quiz-css/creer-quiz.css">
    <!--scripts-->
    <script defer src="./quiz-js/data.js"></script>
    <script defer type="module" src="./quiz-js/creer-quiz.js"></script>
    <!-- tests QUnit-->
    <link rel="stylesheet" href="https://code.jquery.com/qunit/qunit-2.20.0.css">
    <script defer src="https://code.jquery.com/qunit/qunit-2.20.0.js"></script> 
    <script defer type="module" src="./quiz-js/test-QUnit.js"></script>
    <!-- fin tests -->
    <title>Créer un quiz - Nexus Gathering</title>
  </head>
  <body>
    <!-- !!!!!! Décommenter les 2 lignes ci-dessous pour afficher les tests QUnit, puis aller dans le fichier test-QUnit.js pour décommenter les tests-->

      <!-- <div id="qunit"></div>
      <div id="qunit-fixture"></div> -->
    <?php include '../src/view/header.inc.php' ?>
    <main>
      <form id="formulaireQuiz" action="#" method="post" enctype="multipart/form-data">
        <div class="couverture">
          <label>Importer la photo de couverture du quiz :</label>
          <input id="inputImage" type="file" accept="image/*">
        </div>
        <input id="titreQuiz" type="text" placeholder="TITRE DE VOTRE QUIZ" class="FormulaireRechercher">
        <div id="galerieQuestions">
        <!--Ajout des questions géré en javascript-->
        </div>
        <div id="messageVerifierQuiz"></div>
        <div class="boutonFin">
          <button id="ajouterQuestion" class="bouton" type="button">Ajouter une question</button>
          <input class="bouton" type="submit" value="Poster le quiz">
        </div>
      </form>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>