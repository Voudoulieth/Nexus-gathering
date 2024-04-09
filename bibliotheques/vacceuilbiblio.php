<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <!-- Feuilles de style CSS -->
    <link rel="stylesheet" href="./css/acceuil_biblio.css" />
    <title>Accueil Bibliothèques - Nexus Gathering</title>
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
    <main>
      <!--TODO regler le probleme overflow et marge header/footer -->
      <article class="main-container">
        <a
          href="./biblio_generale.html"
          class="liens"
          title="Accéder a la bibliothèque générale"
        >
          <section>
            <img
              class="img"
              src="../assets/image/magasin_de_jeux.png"
              alt="Bibliothèque Générale"
            />
            <div class="text">
              <h2 class="biblio-g">Bibliothèque Générale</h2>
              <p class="descr-g">
                Trouvez l’ensemble de vos jeux favoris en quelques secondes ou
                faites de nouvelles découvertes grâce au systeme de recherche !
              </p>
            </div>
          </section>
        </a>

        <a
          href="./ajout_biblio_privee.html"
          class="liens"
          title="Accéder a la bibliothèque privée"
        >
          <section>
            <img
              src="../assets/image/gaming_room_1.png"
              alt="Bibliothèque Privée"
              title="Accéder a la bibliothèque privée"
            />
            <div class="text">
              <h2 class="biblio-p">Bibliothèque Privée</h2>
              <p class="descr-p">
                Retrouvez vos collections ou organisez les comme vous le
                souhaitez, selon vos goûts ou vos critères !
              </p>
            </div>
          </section>
        </a>
      </article>
    </main>
    <footer>
      <div>
        <a href="../index.html">
          <img
            class="logo"
            src="../assets/logo/logo_long_nexus_white.svg"
            title="Acceuil"
            alt="Logo Nexus Blanc"
          />
        </a>
        <nav>
          <ul>
            <li><a class="navlink" href="../cgu.html">CGU</a></li>
            <li>
              <a class="navlink" href="../mention_legale.html"
                >Mention légale</a
              >
            </li>
            <li>
              <a class="navlink" href="../confidentialite.html"
                >Politique de confidentialité</a
              >
            </li>
            <li><a class="navlink" href="../contact.html">Contact</a></li>
          </ul>
        </nav>
      </div>
      <p class="copyright">COPYRIGHT @ 2024 TOUS DROITS RESERVE</p>
    </footer>
  </body>
</html>
