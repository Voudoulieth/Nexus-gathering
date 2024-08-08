<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include './view/head.inc.php' ?>
  <!-- Feuilles de style CSS -->
  <script defer type="module" src="../../../bibliotheques/JS/page_jeu.js"></script>
  <link rel="stylesheet" href="/dist/output.css" />
  <title>Page jeu - Nexus Gathering</title>
</head>

<body>
  <?php include './view/header.inc.php' ?>
  <main>
    <div class="text-center pt-5">
      <h1 class="font-['Changa'] text-[4.5em] p-5">Page du jeu !</h1>
      <p class="text-[0.875em]">
        Retrouvez ici toutes les informations sur votre jeu!
      </p>
    </div>

    <div id="contenu">
      <div id="pageJeu" class="flex pt-5">
        <div class="flex-col w-2/3">
          <div class="flex">
            <img class="rounded-full h-50 w-50 ml-4" src="<?= htmlspecialchars($jeu->getImg_jeu()) ?>" alt="image" />

            <div class="grid content-center bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-['Changa'] text-center text-[2.75em] mt-4 ml-12 h-20 w-2/3">
              <h2 class="pt-14 font-bold"><?= htmlspecialchars($jeu->getNom_jeu()) ?></h2>
              <br />
            </div>
          </div>

          <div class="flex">
            <div class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] text-center text-[0.875em] font-semibold pt-2 m-4 pb-5 w-full">
              <h3 class="font-['Changa'] text-[1.68em] font-bold">Résumé :</h3>
              <p class="p-2 indent-10">
                <?= htmlspecialchars($jeu->getResum_jeu()) ?>
              </p>
            </div>
          </div>
        </div>

        <aside class="flex-col w-1/3">
          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">Éditeur :</h3>
            <p class="mt-2"><?= htmlspecialchars($jeu->getEditeur()) ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">Studio :</h3>
            <p class="mt-2"><?= htmlspecialchars($jeu->getStudio()) ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Début du développement :
            </h3>
            <p class="mt-2"><?= htmlspecialchars($jeu->getDateDebutDev()) ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Date de sortie :
            </h3>
            <p class="mt-2"><?= htmlspecialchars($jeu->getDateSortie()) ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Consoles disponibles :
            </h3>
            <p class="mt-2">
              <?= htmlspecialchars($jeu->getConsoles()) ?>
            </p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Multijoueur :
            </h3>
            <p class="mt-2"><?= $jeu->getMulti() ? 'Oui' : 'Non' ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Cross-Platform :
            </h3>
            <p class="mt-2"><?= $jeu->getCrossPlatform() ? 'Oui' : 'Non' ?></p>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">
              Format physique/dématérialisé:
            </h3>
            <p class="mt-2"><?= htmlspecialchars($jeu->getFormat()) ?></p>
          </div>
        </aside>
      </div>
    </div>

    <div id="updateForm" style="display:none;">
      <form id="ajoutJeu" action="<?= APP_ROOT ?>/update-jeu" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_jeu" value="<?= $jeu->getId_jeu() ?>">
        
        <label for="img_jeu">Image du Jeu :</label>
        <input type="file" id="img_jeu" name="img_jeu" accept="image/*" required />
        
        <label for="nom_jeu">Nom du Jeu :</label>
        <input type="text" id="nom_jeu" name="nom_jeu" placeholder="Saisissez ici" class="hover:bg-white hover:text-black rounded-full mt-2 border focus:border-purple-800 focus:border-2" required />
        
        <label for="resume_jeu">Résumé :</label>
        <textarea name="resum_jeu" id="resume_jeu" required></textarea>
        
        <label for="date_sortie">Date de Sortie :</label>
        <input type="date" name="date_sortie" id="dateSortie" required />
        
        <label for="style">Style :</label>
        <input type="checkbox" name="choixS[]" value="Action"> Action
        <input type="checkbox" name="choixS[]" value="Aventure"> Aventure
        
        <button class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-red-700 hover:ring-offset-red-700 shadow-lg shadow-indigo-500/50" type="button" name="submit" style="display:none;">Valider</button>
      </form>
    </div>

    <div class="flex justify-center w-full">
      <form method="post" action="<?= APP_ROOT ?>/page-jeu/delete-jeu">
        <input type="hidden" name="id_jeu" value="<?= $id_jeu ?>">
        <button class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-red-700 hover:ring-offset-red-700 shadow-lg shadow-indigo-500/50" type="submit" name="action" value="supprimer">
          Supprimer
        </button>
      </form>
      <form method="post" action="<?= APP_ROOT ?>/page-jeu/update-jeu">
        <button class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-green-500 hover:ring-offset-green-500 shadow-lg shadow-indigo-500/50" type="button" name="action" value="modifier">
          Modifier
        </button>
      </form>
    </div>
  </main>
  <?php include './view/footer.inc.php' ?>
</body>

</html>