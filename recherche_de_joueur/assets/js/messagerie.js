let isEditing = false; // État de modification
let divBeingEdited = null; // Div du message en cours de modification

// Écouteur d'événement sur le bouton d'envoi pour envoyer ou modifier un message
document.getElementById('sendButton').addEventListener('click', function() {
    if (isEditing) {
        sendMessage(true, divBeingEdited);
    } else {
        sendMessage();
    }
});

// Permet d'envoyer un message avec la touche "Entrée", sans inclure de retour à la ligne
document.getElementById('inputMessage').addEventListener('keydown', function(event) {
    if (event.key === "Enter" && !event.shiftKey) {
        event.preventDefault(); // Empêche le retour à la ligne
        if (isEditing) {
            sendMessage(true, divBeingEdited);
        } else {
            sendMessage();
        }
    }
});

// Fonction pour envoyer ou modifier un message
function sendMessage(isEdit = false, messageDivToEdit = null) {
    var messageText = document.getElementById('inputMessage').value.trim(); // Récupère et nettoie le texte du message
    if (messageText) {
        if (!isEdit) {
            // Logique pour un nouveau message
            var messageDiv = document.createElement('div');
            messageDiv.classList.add('messageContainer');
            
            var messageP = document.createElement('p');
            messageP.classList.add('message');
            messageP.textContent = messageText;
            messageDiv.appendChild(messageP);
            
            var iconsDiv = document.createElement('div');
            iconsDiv.classList.add('messageIcons');
            iconsDiv.innerHTML = `
                <img src="../assets/Icone/pen-solid orange.svg" class="edit-icon" alt="Modifier">
                <img src="../assets/Icone/trash-solid orange.svg" class="delete-icon" alt="Supprimer">
            `;
            messageDiv.appendChild(iconsDiv);
            
            var modifiedP = document.createElement('p');
            modifiedP.classList.add('messageModified');
            modifiedP.style.display = 'none';
            modifiedP.textContent = 'Modifié';
            messageDiv.appendChild(modifiedP);
            
            document.getElementById('blockMessage').appendChild(messageDiv);
            
            document.getElementById('inputMessage').value = ''; // Réinitialise la zone de texte
            
            addIconEventListeners(messageDiv); // Ajoute les écouteurs d'événements pour les icônes
        } else {
            // Logique de modification d'un message existant
            var messageP = messageDivToEdit.querySelector('p:not(.messageModified)');
            messageP.textContent = messageText;
            
            var modifiedP = messageDivToEdit.querySelector('.messageModified');
            modifiedP.style.display = 'block'; // Affiche la mention "modifié"
            
            // Réinitialisation après modification
            document.getElementById('inputMessage').value = '';
            isEditing = false;
            divBeingEdited = null;
            resetSendButtonEvent(); // Rétablit le comportement initial du bouton d'envoi
        }
    }
}

// Fonction pour ajouter des écouteurs d'événements pour l'édition et la suppression
function addIconEventListeners(messageDiv) {
    var editIcon = messageDiv.querySelector('.edit-icon');
    editIcon.addEventListener('click', function() {
        document.getElementById('inputMessage').value = messageDiv.querySelector('p:not(.messageModified)').textContent;
        document.getElementById('inputMessage').focus();
        isEditing = true;
        divBeingEdited = messageDiv;
    });
    
    var deleteIcon = messageDiv.querySelector('.delete-icon');
    deleteIcon.addEventListener('click', function() {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce message ?')) {
            messageDiv.parentNode.removeChild(messageDiv);
        }
    });
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
