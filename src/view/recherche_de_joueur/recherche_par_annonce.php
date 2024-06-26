<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="/recherche_de_joueur/assets/css/recherche_par_annonce.css">
    <title>Recherche de joueurs</title>
  </head>
  <body>
  <?php include './view/header.inc.php' ?>
    <main>
        <div class="main-container">
            <section class="search-section">
              <a href="<?= APP_ROOT ?>/rejoindre_une_annonce">
                <img src="/assets/Image/rejoindre une annonce.png" alt="Recherche rapide" />
                <div class="encareTitre" >
                    <h1 class="titres">Rejoindre une annonce</h1>
                </div>
                <div class="encareP">
                    <p class="parag">Rejoindre une annonce, c'est rapide et facile. Trouvez la mission pour le jeu qui vous intéresse, postuler pour rejoindre un groupe, et plongez dans l'action !</p>            
                </div>
              </a>
            </section>
            <section class="search-section">
              <a href="<?= APP_ROOT ?>/creation_annonce">
                <img src="/assets/Image/créée une annonce.png" alt="Recherche par annonce" />
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
    <?php include './view/footer.inc.php' ?>
    </body>
  </html>