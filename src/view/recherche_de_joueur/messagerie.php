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
                    <a class="avatar" href="lien vers la page de profil"><img src="<?= $contact->getAvatar()?>" alt="photo de profil du joueurs"></a>
                    <p><?= $contact->getNomUser() ?></p>
                    <a class="button" href="<?= APP_ROOT ?>/messagerie/contact?id=<?= $contact->getIdUser() ?>">Contacter</a>
                </div>
                <?php } ?>
            </section>
            <div id="affichageMessage">
                <section>
                    <div id="contactEnCour">
                        <a href=""><img src="<?= !empty($selectedContactAvatar) ? htmlspecialchars($selectedContactAvatar) : "/assets/Icone/user-solid blanc.svg"?>" alt="photo de profil du joueurs"></a>
                        <p><?= !empty($selectedContactName) ? htmlspecialchars($selectedContactName) : "Choisissez un contact" ?></p>
                    </div>
                    <div id="blockMessage">
                        <?php if (!empty($messages)) { ?>
                        <?php foreach ($messages as $message) { ?>
                            <div class="messageContainer">
                            <div class="messageHeader">
                                <p><?= htmlspecialchars($message['nom_user']) ?></p> <!-- Afficher le nom de l'auteur -->
                            </div>
                                <p class="message"><?= htmlspecialchars($message['contenu_mess']) ?></p>
                                <div class="messageIcons">
                                    <img src="/assets/Icone/pen-solid orange.svg" class="edit-icon" alt="Modifier">
                                    <img src="/assets/Icone/trash-solid orange.svg" class="delete-icon" alt="Supprimer">
                                </div>
                                <p class="messageModified" style="display: none;">Modifié</p>
                            </div>
                        <?php } ?>
                        <?php } else { ?>
                            <div class="messageContainer">
                                <p class="message">Aucun message pour cette conversation.</p>
                            </div>
                        <?php } ?>
                    </div>
                </section>
                <!-- <section id="saisieMessage">
                    <textarea id="inputMessage" placeholder="Envoyer un message"></textarea>
                    <button type="button" class="button" id="sendButton">Envoyer</button>
                </section> -->
                <form id="saisieMessage" method="POST" action="<?= APP_ROOT ?>/messagerie/create-message">
                    <input type="hidden" name="dest_id" value="<?= $idContact ?>">
                    <textarea id="inputMessage" name="message" placeholder="Envoyer un message"></textarea>
                    <button type="submit" class="button">Envoyer</button>
                </form>
            </div>
        </div>
    </main>
    <?php include './view/footer.inc.php' ?>
    <script src="/recherche_de_joueur/assets/js/messagerie.js"></script>
    </body>
</html>