<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="/recherche_de_joueur/assets/css/creation_annonce.css" />
    <title>Création d'annonce</title>
  </head>
  <body>
  <?php include './view/header.inc.php' ?>
    <main>
      <h1 class="titres" id="h1">Création de l'annonce</h1>
      <div id="form">
        <section id="formCol">
          <input type="text" placeholder="Nom de l'annonce" class="formNom" />
          <div>
            <input type="text" placeholder="Nom du jeu" class="formNom" id="nom_du_jeu" />
            <select name="Nom du jeu" >
              <!-- <option value="nom_du_jeu">Nom du jeu</option> a ajouté en bdd -->
            </select>
          </div>
          <div class="number-input-wrapper">
            <input
              type="number"
              min="2"
              max="64"
              placeholder="Nombre de joueurs"
              class="formNom"
              id="nbjoueur"
            />
            <div class="control-down"><img src="/assets/Icone/minus-solid blanc.svg" alt="-"></div>
            <div class="control-up"><img src="/assets/Icone/plus-solid blanc.svg" alt="+"></div>
          </div>
          <div id="formBut">
            <button class="button" id="publishAnnonce" >
              Publier <br />
              l'annonce
            </button>
            <button class="button" id="deleteAnnonce">
              Supprimer <br />
              l'annonce
            </button>
          </div>
        </section>
        <section id="formDesc">
          <p id="placeholderText" class="placeholder-style">
            Description de l'annonce
          </p>
          <textarea
            name="Description de l'annonce"
            id="textDesc"
            cols="160"
            rows="10"
            wrap="hard"
          ></textarea>
        </section>
      </div>
      <section id="annonceDisplay" style="display: none;">
        <div class="tokenplace">
          <div class="tokenAnnonce">
              <ul>
                  <li id="annonceTitle">Nom de l'annonce</li>
                  <li id="annonceGameName">Nom du jeu</li>
                  <li id="annoncePlayerCount">Nombre de joueurs</li>
              </ul>
              <p id="annonceDescription">description de l'annonce</p>
              <button class="button contact" id="editAnnonce">Modifier</button>
          </div>
        </div>
      </section>
    </main>
    <?php include './view/footer.inc.php' ?>
    <script type="module" src="/recherche_de_joueur/assets/js/creation_annonce.js"></script>
    <script type="module" src="/recherche_de_joueur/assets/js/validation.js"></script>
  </body>
</html>