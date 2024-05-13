<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="/recherche_de_joueur/assets/css/messagerie.css">
    <title>Messagerie - Nexus Gathering</title>
  </head>
  <body>
  <?php include './view/header.inc.php' ?>
    <main>
        <div id="messagerieContainer">
            <section id="contactContainer">
                <h1 class="titres">Contact</h1>
                <?php foreach ($contacts as $contact){ ?>
                <div class="contact">
                    <a href="lien vers la page de profil"><img src="<?= $contact->getAvatar()?>" alt="photo de profil du joueurs"></a>
                    <p><?= $contact->getNomUser() ?></p>
                    <button class="button" href="<?=APP_ROOT ?>messagerie/contact?id=<?= $contact->getIdUser()?>">Contacter</button>
                </div>
                <?php } ?>
            </section>
            <div id="affichageMessage">
                <section>
                    <div id="contactEnCour">
                        <a href=""><img src="/assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                        <p>Nom du joueur</p>
                    </div>
                    <div id="blockMessage">
                        <!-- <p>affichage des messages</p> -->
                    </div>
                </section>
                <section id="saisieMessage">
                    <textarea id="inputMessage" placeholder="Envoyer un message"></textarea>
                    <button type="button" class="button" id="sendButton">Envoyer</button>
                </section>
            </div>
        </div>
    </main>
    <?php include './view/footer.inc.php' ?>
    <script src="/recherche_de_joueur/assets/js/messagerie.js"></script>
    </body>
</html>