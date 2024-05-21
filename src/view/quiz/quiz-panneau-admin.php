<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="quiz-css/quiz-officiels-et-communautaires.css">
    <link repages-de-quiz-exemplesl="stylesheet" href="quiz-css/quiz-communautaires.css">
    <link rel="stylesheet" href="quiz-css/panneau-admin-quiz.css">
    <!--scripts-->
    <script defer src="../../../quiz/quiz-js/data.js"></script>
    <script defer type="module" src="../../../quiz/quiz-js/admin.js"></script>
    <title>Accueil Quiz - Nexus Gathering</title>
  </head>
  <body>
  <?php include '../header.inc.php' ?>
    <main>
      <h1 class="titres">Panneau Administrateur</h1>
      <div class="panneauAdmin" id="panneauAdmin">
        <form>
          <fieldset>
            <legend>Sélectionnez les types de quiz que vous souhaitez visualiser :</legend> 
            <span>
              <input id="communautaire" type="radio" name="typeQuiz">
              <label for="communautaire">Quiz communautaires</label>
            </span>
            <span>
              <input id="officiel" type="radio" name="typeQuiz">
              <label for="officiel">Quiz officiels</label>
            </span>
            <span>
              <input id="tous" type="radio" name="typeQuiz" checked>
              <label for="tous">Tous les quiz</label>
            </span>
          </fieldset>
        </form>
      </div>
      <div class="galerie" id="galerieAdmin">
        <!--Les quiz sont gérés de façon dynamique, ils se situent pour l'instant dans le fichier data.js-->
      </div>
    </main>
    <?php include '../footer.inc.php' ?>
  </body>
</html>