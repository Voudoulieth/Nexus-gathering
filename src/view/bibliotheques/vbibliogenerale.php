<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include './view/head.inc.php' ?>
  <!-- Feuilles de style CSS -->
  <link rel="stylesheet" href="../../../css/acceuil_biblio.css" />
  <!-- <script defer type="module" src="../../../bibliotheques/JS/script_biblio_generale.js"></script> -->
  <link rel="stylesheet" href="../dist/output.css" />
  <title>Bibliothèque générale - Nexus Gathering</title>
</head>

<body>
  <?php include './view/header.inc.php' ?>
  <main>
    <div class="text-center pt-5">
      <h1 class="font-['Changa'] text-[4.5em] p-5">
        Bibliothèque générale !
      </h1>
      <p class="text-[0.875em]">Retrouvez ici vos jeux favoris!</p>

      <section class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] text-[0.875em] font-semibold flex flex-col text-center w-30 p-5 m-4">
        <a href="<?= APP_ROOT ?>/ajout-biblio-generale">
          <h2 class="text-[2.75em]">Ajoutez un jeu a la bibliothèque !</h2>

          <p class="text-[0.875em]">
            En tant que contributeur, vous avez la possibilité de nous
            soutenir en complétant la liste ci dessus en remplissant un
            formulaire ! Merci pour votre aide !
          </p>
        </a>
      </section>
    </div>
    <div id="listejeu">
      <?php foreach ($jeux as $jeu) : ?>
        <div class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-semibold flex m-5">
          <img class="rounded-full p-1 w-20" src="<?= htmlspecialchars($jeu->getImg_jeu()) ?>" alt="Image du jeu" />
          <div class="grid grid-cols-5 h-16">
            <h3 class="font-['Changa'] text-[1.68em] font-bold place-self-center"><?= htmlspecialchars($jeu->getNom_jeu()) ?></h3>
            <p class="place-self-center text-[0.875em]"><?= htmlspecialchars($jeu->getDateSortie()) ?></p>
            <p class="place-self-center text-[0.875em]"><?= htmlspecialchars($jeu->getStyle()) ?></p>
            <p class="text-clip overflow-hidden text-[0.875em] mt-2"><?= htmlspecialchars($jeu->getResum_jeu()) ?></p>
            <div class="flex justify-end mr-5">
              <a href="./page-jeu?id=<?= htmlspecialchars($jeu->getId_jeu()) ?>" class="rounded-full font-['Open Sans'] bg-[#733790]/95 place-self-center text-center text-[1.06em] p-2 pl-5 pr-5">Voir</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <?php include './view/footer.inc.php' ?>
</body>

</html>