<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include '../src/view/head.inc.php' ?>
  <!-- Feuilles de style CSS -->
  <script defer type="module" src="./JS/page_jeu.js"></script>
  <link rel="stylesheet" href="../dist/output.css">
  <title>Page jeu - Nexus Gathering</title>
</head>

<body>
  <?php include '../src/view/header.inc.php' ?>
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
          <img class="rounded-full h-50 w-50 ml-4" src="../assets/image/tlof.jpg" alt="image" />

          <div
            class="grid content-center bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-['Changa'] text-center text-[2.75em] mt-4 ml-12 h-20 w-2/3">
            <h2 class="pt-14 font-bold">The last of us</h2>
            <br />
          </div>
        </div>

        <div class="flex">
          <div
            class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] text-center text-[0.875em] font-semibold pt-2 m-4 pb-5 w-full">
            <h3 class="font-['Changa'] text-[1.68em] font-bold">Résumé :</h3>
            <p class="p-2 indent-10">
              The Last of Us se passe dans un monde post-apocalyptique, après
              qu'une épidémie ayant échappé à tout contrôle a ravagé la
              civilisation humaine 20 ans plus tôt. Les deux personnages
              principaux, Joel et Ellie, doivent récupérer munitions et vivres
              pour avancer dans leur quête et triompher des infectés et des
              survivants hostiles qu'ils croisent. Le comic The Last of Us:
              American Dreams apprend au lecteur que l’épidémie s’est
              déclenchée six ans avant la naissance d'Ellie.
            </p>
          </div>
        </div>
      </div>

      <aside class="flex-col w-1/3">
        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">Éditeur :</h3>
          <p class="mt-2">Sony Computer Entertainment</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">Studio :</h3>
          <p class="mt-2">Naughty Dog</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Début du développement :
          </h3>
          <p class="mt-2">2009</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Date de sortie :
          </h3>
          <p class="mt-2">14 juin 2013</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Consoles disponibles :
          </h3>
          <p class="mt-2">
            PlayStation 3, PlayStation 4, PlayStation 5, Microsoft Windows
          </p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Multijoueur :
          </h3>
          <p class="mt-2">oui</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Cross-Platform :
          </h3>
          <p class="mt-2">non</p>
        </div>

        <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
          <h3 class="font-['Changa'] text-[1.68em] font-bold">
            Format physique/dématérialisé:
          </h3>
          <p class="mt-2">Physique et dématérialisé</p>
        </div>
      </aside>
    </div>
    </div>

    <form id="ajoutJeu" class="hidden"" action="" method=" post">
      <div class="flex pt-5">
        <div class="flex-col w-2/3">
          <div class="flex">
            <div
              class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-['Open Sans'] text-center text-[0.875em] font-semibold h-20 pt-2 m-3 w-1/3">
              <label for="image">Image du Jeu :</label><br>
              <input class="mt-2" type="file" id="image" name="image" accept="image/*" required />
            </div>

            <div
              class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] font-['Open Sans'] text-center text-[0.875em] font-semibold h-20 pt-2 m-4 w-2/3">
              <label for="nom">Nom du Jeu :</label><br>
              <input type="text" id="nom" name="nom" placeholder="Saisissez ici"
                class="hover:bg-white hover:text-black rounded-full mt-2 border focus:border-purple-800 focus:border-2" />
            </div>
          </div>

          <div class="flex">
            <div
              class="bg-[#f45a01]/95 rounded-full text-[#f1f7f9] text-center text-[0.875em] font-semibold pt-2 m-4 pb-5 w-full">
              <label for="resume">Résumé :</label><br>
              <textarea id="resume" name="resume" placeholder="Saisissez ici" rows="15" cols="150"
                class="hover:bg-white hover:text-black rounded-full m-4 pt-2 w-[90%] resize-y border focus:border-purple-800 focus:border-2"></textarea>
            </div>
          </div>
        </div>

        <aside class="flex-col w-1/3">
          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <p>Style du jeu :</p><br>

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="combat"
              name="choixS" value="Combat" />
            <label class="cursor-pointer" for="combat">Combat</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox"
              id="plateforme" name="choixS" value="Plateforme" />
            <label class="cursor-pointer" for="plateforme">Plateforme</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="fps"
              name="choixS" value="FPS" />
            <label class="cursor-pointer" for="fps">FPS</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox"
              id="shootThemUp" name="choixS" value="Shoot them up" />
            <label class="cursor-pointer" for="shootThemUp">Shoot them up</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox"
              id="railShooter" name="choixS" value="Rail shooter" />
            <label class="cursor-pointer" for="railShooter">Rail shooter</label><br />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <label for="editeur">Éditeur :</label><br>
            <input type="text" id="editeur" name="editeur" placeholder="Saisissez ici"
              class="hover:bg-white hover:text-black rounded-full mt-1 border focus:border-purple-800 focus:border-2" />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <label for="studio">Studio :</label><br>
            <input type="text" id="studio" name="studio" placeholder="Saisissez ici"
              class="hover:bg-white hover:text-black rounded-full mt-1 border focus:border-purple-800 focus:border-2" />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <label for="dateDebutDev">Début du développement :</label><br>
            <input class="mt-2" type="date" id="dateDebutDev" name="dateDebutDev" />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <label for="dateSortie">Date de sortie :</label><br>
            <input class="mt-2" type="date" id="dateSortie" name="dateSortie" />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <p>Consoles disponibles :</p><br>

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="ps1"
              name="choixC" value="ps1" />
            <label class="cursor-pointer" for="ps1">Playstation 1</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="ps2"
              name="choixC" value="ps2" />
            <label class="cursor-pointer" for="ps2">Playstation 2</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="ps3"
              name="choixC" value="ps3" />
            <label class="cursor-pointer" for="ps3">Playstation 3</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="ps4"
              name="choixC" value="ps4" />
            <label class="cursor-pointer" for="ps4">Playstation 4</label><br />

            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="checkbox" id="ps5"
              name="choixC" value="ps5" />
            <label class="cursor-pointer" for="ps5">Playstation 5</label><br />
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <p>Multijoueur :</p><br>
            <label for="optionMulti1">Oui</label>
            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="radio"
              id="optionMulti1" name="optionsM" value="oui">
            <label for="optionMulti2">Non</label>
            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="radio"
              id="optionMulti2" name="optionsM" value="non">
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <p>Cross-Platform :</p><br>
            <label for="optionCross1">Oui</label>
            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="radio"
              id="optionCross1" name="optionsC" value="oui">
            <label for="optionCross2">Non</label>
            <input class="form-checkbox h-2 w-2 bg-white cursor-pointer checked:bg-blue-500" type="radio"
              id="optionCross2" name="optionsC" value="non">
            </select>
          </div>

          <div class="bg-[#f45a01]/95 rounded-full text-center text-[0.875em] font-semibold p-2 m-4">
            <label for="format">Format physique/dématérialisé:</label><br>
            <select
              class="mt-2 pl-3 pr-3 appearance-none row-start-1 col-start-1 bg-slate-50 dark:bg-purple-800 rounded-full"
              id="format" name="format">
              <option value="physique" class="text-[#f1f7f9]">
                Physique
              </option>
              <option value="dematerialise" class="text-[#f1f7f9]">
                Dématérialisé
              </option>
              <option value="physique_dematerialise" class="text-[#f1f7f9]">
                Physique et dématérialisé
              </option>
            </select>
          </div>
        </aside>
      </div>
    </form>

    <div class="flex justify-center w-full">
      <button
        class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-red-700 hover:ring-offset-red-700 shadow-lg shadow-indigo-500/50"
        type="reset" name="reset" id="supprimerContenu">
        Supprimer
      </button>
      <button
        class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-green-500 hover:ring-offset-green-500 shadow-lg shadow-indigo-500/50"
        type="button" name="button">
        Modifier
      </button>
      <button
        class="font-['Changa'] text-[#f1f7f9] bg-[#f45a01]/95 rounded-full w-[20%] text-center text-[1.06em] p-2 m-5 ring ring-offset-2 ring-purple-500 ring-offset-purple-100/30 hover:ring-green-500 hover:ring-offset-green-500 shadow-lg shadow-indigo-500/50 hidden"
        type="submit" name="submit">
        Valider
      </button>
    </div>
  </main>
  <?php include '../src/view/footer.inc.php' ?>
</body>
</html>