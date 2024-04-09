<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/recherche_par_annonce.css">
    <title>Recherche de joueurs</title>
  </head>
  <body>
  <?php include '../src/view/header.inc.php' ?>
    <main>
        <div class="main-container">
            <section class="search-section">
              <a href="./rejoindre_une_annonce.php">
                <img src="../assets/Image/rejoindre une annonce.png" alt="Recherche rapide" />
                <div class="encareTitre" >
                    <h1 class="titres">Rejoindre une annonce</h1>
                </div>
                <div class="encareP">
                    <p class="parag">Rejoindre une annonce, c'est rapide et facile. Trouvez la mission pour le jeu qui vous intéresse, postuler pour rejoindre un groupe, et plongez dans l'action !</p>            
                </div>
              </a>
            </section>
            <section class="search-section">
              <a href="./creation_annonce.php">
                <img src="../assets/Image/créée une annonce.png" alt="Recherche par annonce" />
                <div class="encareTitre" id="encareh2">
                    <h2 class="titres">Créer une annonce</h2>
                </div>
                <div class="encareP">                   
                    <p class="parag">Créez des annonces personnalisées pour recruter vos coéquipiers. Spécifiez vos besoins, détaillez vos préférences, et trouvez les joueurs parfaits pour vos aventures.</p>
                </div>
              </a>
            </section>
        </div>
    </main>
    <?php include '../src/view/footer.inc.php' ?>
    </body>
  </html>