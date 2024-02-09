document.getElementById('sendButton').addEventListener('click', sendMessage);

function sendMessage() {
    var messageText = document.getElementById('inputMessage').value.trim();
    if (messageText) {
        // Créer un nouvel élément div pour le message
        var messageDiv = document.createElement('div');
        messageDiv.classList.add('messageContainer');
        
        // Créer un élément p pour le texte du message
        var messageP = document.createElement('p');
        messageP.textContent = messageText;

        // Création de la div pour les icônes
        var iconsDiv = document.createElement('div');
        iconsDiv.classList.add('messageIcons');
        iconsDiv.innerHTML = `
            <img src="../assets/Icone/pen-solid orange.svg" class="edit-icon" alt="Modifier">
            <img src="../assets/Icone/trash-solid orange.svg" class="delete-icon" alt="Supprimer">
        `;

        // Ajout du paragraphe et de la div des icônes au div du message
        messageDiv.appendChild(messageP);
        messageDiv.appendChild(iconsDiv);

        var blockMessage = document.getElementById('blockMessage');
        blockMessage.appendChild(messageDiv);

        // Effacer le champ input après envoi
        document.getElementById('inputMessage').value = '';

        // Ajouter des écouteurs pour les icônes
        iconsDiv.querySelector('.edit-icon').addEventListener('click', function() {
            // Logique de modification ici
            console.log('Modification du message');
        });
        iconsDiv.querySelector('.delete-icon').addEventListener('click', function() {
            // Logique de suppression ici
            console.log('Suppression du message');
            blockMessage.removeChild(messageDiv);
        });

        // Faire défiler automatiquement vers le bas pour afficher le dernier message
        blockMessage.scrollTop = blockMessage.scrollHeight;
    }
}


document.getElementById('inputMessage').addEventListener('keydown', function(event) {
    // Vérifier si la touche "Entrée" est pressée sans la touche "Maj"
    if (event.key === "Enter" && !event.shiftKey) {
        event.preventDefault(); // Empêcher le comportement par défaut de la touche "Entrée" (nouvelle ligne)
        sendMessage(); // Appeler la fonction d'envoi de message
    }
});

