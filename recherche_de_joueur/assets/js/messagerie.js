let isEditing = false; // État de modification
let divBeingEdited = null; // Div du message en cours de modification


document.getElementById('saisieMessage').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        if (data.status === 'success') {
            // Création du nouveau message pour l'ajouter à la vue
            var blockMessage = document.getElementById('blockMessage');
            var newMessageContainer = document.createElement('div');
            newMessageContainer.classList.add('messageContainer');
            
            var messageHeader = document.createElement('div');
            messageHeader.classList.add('messageHeader');
            var pAuthor = document.createElement('p');
            pAuthor.textContent = data.nomUtilisateur; // Utilise le nom de l'utilisateur renvoyé par le serveur
            messageHeader.appendChild(pAuthor);
    
            var pMessage = document.createElement('p');
            pMessage.classList.add('message');
            pMessage.textContent = formData.get('message');
            newMessageContainer.appendChild(messageHeader);
            newMessageContainer.appendChild(pMessage);
            
            blockMessage.appendChild(newMessageContainer);
    
            document.getElementById('inputMessage').value = '';
        } else {
            console.error('Error:', data.message);
        }
    })    
    .catch(error => console.error('Error:', error));
});




// // Fonction pour ajouter des écouteurs d'événements pour l'édition et la suppression
// function addIconEventListeners(messageDiv) {
//     var editIcon = messageDiv.querySelector('.edit-icon');
//     editIcon.addEventListener('click', function() {
//         document.getElementById('inputMessage').value = messageDiv.querySelector('p:not(.messageModified)').textContent;
//         document.getElementById('inputMessage').focus();
//         isEditing = true;
//         divBeingEdited = messageDiv;
//     });
    
//     var deleteIcon = messageDiv.querySelector('.delete-icon');
//     deleteIcon.addEventListener('click', function() {
//         if (confirm('Êtes-vous sûr de vouloir supprimer ce message ?')) {
//             messageDiv.parentNode.removeChild(messageDiv);
//         }
//     });
// }

document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(event) {
        if (event.target.classList.contains('delete-icon')) {
            var messageId = event.target.getAttribute('data-id');
            deleteMessage(messageId);
        }
    });
});


function deleteMessage(id) {
    console.log("Deleting message with ID:", id);
    fetch('<?= APP_ROOT ?>/messagerie/delete-message', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: id })
    })    
    .then(response => response.json())
    .then(data => {
        console.log('Delete success:', data);
        if (data.status === 'success') {
            document.querySelector(`[data-id="${id}"]`).parentNode.remove(); // Supprime le conteneur de message du DOM
        } else {
            console.error('Failed to delete message:', data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}



// Réinitialise l'écouteur d'événement du bouton d'envoi pour qu'il soit toujours prêt pour un nouveau message
function resetSendButtonEvent() {
    document.getElementById('sendButton').addEventListener('click', function() {
        sendMessage();
    });
}


// document.addEventListener('DOMContentLoaded', () => {
//     // Sélectionne tous les boutons "Contacter" et leur ajoute un écouteur d'événement
//     const contactButtons = document.querySelectorAll('#contactContainer .button');

//     contactButtons.forEach(button => {
//         button.addEventListener('click', updateCurrentContact);
//     });

//     function updateCurrentContact(event) {
//         // Récupère le div "contact" parent
//         const contactDiv = event.target.closest('.contact');
        
//         // Récupère les informations du contact
//         const imgSrc = contactDiv.querySelector('img').src;
//         const playerName = contactDiv.querySelector('p').textContent;
        
//         // Met à jour le "contactEnCour"
//         const currentContactDiv = document.getElementById('contactEnCour');
//         currentContactDiv.querySelector('img').src = imgSrc;
//         currentContactDiv.querySelector('p').textContent = playerName;
//     }
// });
