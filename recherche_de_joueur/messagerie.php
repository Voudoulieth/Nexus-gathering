<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <link rel="stylesheet" href="./assets/css/messagerie.css">
    <title>Messagerie - Nexus Gathering</title>
  </head>
  <body>
  <?php include '../src/view/header.inc.php' ?>
    <main>
        <div id="messagerieContainer">
            <section id="contactContainer">
                <h1 class="titres">Contact</h1>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Nom du joueur</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Nom du joueur</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Legluc</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Lumiex</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Kiwi</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Voudou</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Yurigorkha</p>
                    <button class="button">Contacter</button>
                </div>
                <div class="contact">
                    <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
                    <p>Ezerya</p>
                    <button class="button">Contacter</button>
                </div>

            </section>
            <div id="affichageMessage">
                <section>
                    <div id="contactEnCour">
                        <a href=""><img src="../assets/Icone/user-solid blanc.svg" alt="photo de profil du joueurs"></a>
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
    <?php include '../src/view/footer.inc.php' ?>
    <script src="./assets/js/messagerie.js"></script>
    </body>
</html>