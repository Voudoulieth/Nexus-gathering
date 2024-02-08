document.getElementById('sendButton').addEventListener('click', function() {
    var messageText = document.getElementById('inputMessage').value.trim();
    if (messageText) {
        // Créer un nouvel élément div pour le message
        var messageDiv = document.createElement('div');

        // Créer un élément p pour le texte du message
        var messageP = document.createElement('p');
        messageP.textContent = messageText; // Ajoute le texte du message

        // Ajouter le p au div
        messageDiv.appendChild(messageP);

        // Ajouter le div à la div blockMessage
        var blockMessage = document.getElementById('blockMessage');
        blockMessage.appendChild(messageDiv);

        // Effacer le champ input après envoi
        document.getElementById('inputMessage').value = '';

        // Faire défiler automatiquement vers le bas pour afficher le dernier message
        blockMessage.scrollTop = blockMessage.scrollHeight;
    }
});
