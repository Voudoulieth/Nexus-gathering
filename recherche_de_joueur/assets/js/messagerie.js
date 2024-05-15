// document.getElementById('saisieMessage').addEventListener('submit', function(event) {
//     event.preventDefault();  // Empêcher le formulaire de s'envoyer normalement

//     var mode = this.getAttribute('data-mode');  // Récupérer le mode actuel du formulaire
//     var url = this.action;  // L'URL est définie dans l'attribut 'action' du formulaire

//     // Préparer les données du formulaire pour l'envoi
//     var formData = new FormData(this);
//     formData.append('dest_id', this.dest_id.value);

//     fetch(url, {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => {
//         if (!response.ok) {
//             throw new Error('Réponse réseau non OK');
//         }
//         return response.text();  // Traiter la réponse comme texte
//     })
//     .then(html => {
//         // Traiter la réponse pour mettre à jour la page
//         if (mode === 'create') {
//             document.getElementById('blockMessage').innerHTML += html;  // Ajouter le nouveau message à la fin
//         } else if (mode === 'update') {
//             let messageId = formData.get('message_id');
//             document.getElementById('message-content-' + messageId).textContent = formData.get('message');  // Mettre à jour le contenu du message
//             document.querySelector('#message-content-' + messageId).parentNode.querySelector('.messageModified').style.display = 'block';
//         }
//         document.getElementById('inputMessage').value = '';  // Vider le champ de saisie
//         this.setAttribute('data-mode', 'create');  // Réinitialiser le mode à 'create'
//         this.action = '<?= APP_ROOT ?>/messagerie/create-message';  // Réinitialiser l'action du formulaire
//     })
//     .catch(error => {
//         console.error('Erreur:', error);
//     });
// });

// // Gestion des clics sur les boutons d'édition pour passer en mode modification
// document.querySelectorAll('.edit-icon').forEach(icon => {
//     icon.addEventListener('click', function() {
//         var messageId = this.dataset.id;  // Récupérer l'ID du message
//         var actionUrl = this.dataset.actionUrl;  // Récupérer l'URL pour la mise à jour
//         var messageContent = document.querySelector('#message-content-' + messageId).textContent;

//         // Configurer le formulaire pour la modification
//         var form = document.getElementById('saisieMessage');
//         form.setAttribute('data-mode', 'update');
//         form.action = actionUrl;
//         document.getElementById('inputMessage').value = messageContent;
//         document.getElementById('messageId').value = messageId;
//     });
// });

// var appRoot = document.body.getAttribute('data-approot');
document.getElementById('saisieMessage').addEventListener('submit', function(event) {
    event.preventDefault();  // Empêcher le formulaire de s'envoyer normalement

    var mode = this.getAttribute('data-mode');  // Récupérer le mode actuel du formulaire
    var url = this.action;  // L'URL est définie dans l'attribut 'action' du formulaire

    // Préparer les données du formulaire pour l'envoi
    var formData = new FormData(this);

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Réponse réseau non OK');
        }
        return response.json();  // Traiter la réponse comme JSON
    })
    .then(data => {
        if (data.status === "success") {
            var htmlContent = `<div class="messageContainer">
                                <div class="messageHeader">
                                    <p>${data.nomUtilisateur}</p> <!-- Afficher le nom de l'auteur -->
                                </div>
                                <p class="message">${this.inputMessage.value}</p>
                                <div class="messageIcons">                                   
                                    <button type="button" class="edit-icon" data-id="${data.message_id}" data-action-url="${url}">
                                        <img src="/assets/Icone/pen-solid orange.svg" alt="Modifier">
                                    </button>
                                    <form action="${appRoot}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                                        <input type="hidden" name="message_id" value="<?= $message['id_message'] ?>">
                                        <input type="hidden" name="conversation_id" value="<?= $idContact ?>"> <!-- ID de la conversation en cours -->
                                        <button type="submit" class="delete-icon">
                                            <img src="/assets/Icone/trash-solid orange.svg" alt="Supprimer">
                                        </button>
                                    </form>
                                </div>
                                <p class="messageModified" style="display: none;">Modifié</p>
                            </div>`;

            if (mode === 'create') {
                document.getElementById('blockMessage').innerHTML += htmlContent;  // Ajouter le nouveau message à la fin
            } else {
                let messageId = formData.get('message_id');
                document.getElementById('message-content-' + messageId).parentNode.innerHTML = htmlContent;
            }
            document.getElementById('inputMessage').value = '';  // Vider le champ de saisie
            this.setAttribute('data-mode', 'create');  // Réinitialiser le mode à 'create'
            this.action = '<?= APP_ROOT ?>/messagerie/create-message';  // Réinitialiser l'action du formulaire
        } else {
            console.error('Erreur lors de l\'envoi du message:', data.message);
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });
});


function prepareEdit(button) {
    const messageId = button.getAttribute('data-id');
    const messageContent = document.querySelector(`#message-content-${messageId}`).innerText; // Assurez-vous que chaque message a un conteneur avec id correspondant.

    const form = document.getElementById('saisieMessage');
    const inputMessage = document.getElementById('inputMessage');
    const messageIdInput = document.getElementById('messageId');

    form.action = button.getAttribute('data-action-url');
    form.dataset.mode = 'update';
    messageIdInput.value = messageId;
    inputMessage.value = messageContent;
}



