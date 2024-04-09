<!DOCTYPE html>
<html lang="fr">
  <head>
  <?php include '../src/view/head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="./css/acceuil_biblio.css" />
    <script defer type="module" src="./JS/script_biblio_generale.js"></script>
    <link rel="stylesheet" href="../dist/output.css" />
    <title>Bibliothèque générale - Nexus Gathering</title>
  </head>
  <body>
  <?php include '../src/view/header.inc.php' ?>
    <main>
      <div class="text-center pt-5">
        <h1 class="font-['Changa'] text-[4.5em] p-5">
          Bibliothèque générale !
        </h1>
        <p class="text-[0.875em]">Retrouvez ici vos jeux favoris!</p>

        <section
          class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] text-[0.875em] font-semibold flex flex-col text-center w-30 p-5 m-4"
        >
          <a href="./vajoutbibliogenerale.php"
            ><h2 class="text-[2.75em]">Ajoutez un jeu a la bibliothèque !</h2>

            <p class="text-[0.875em]">
              En tant que contributeur, vous avez la possibilité de nous
              soutenir en complétant la liste ci dessus en remplissant un
              formulaire ! Merci pour votre aide !
            </p></a
          >
        </section>
      </div>
      <div id="listejeu"></div>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
