import * as data from './data.js';

const idQuiz = "qc" + (data.communautaires.length + 1); // Construit l'id du nouveau quiz, sera utile pour construire l'objet Quiz

const galerieQuestions  = document.getElementById('galerieQuestions');  // Container de toutes les questions du quiz
const addQuestion       = document.querySelector("#ajouterQuestion");   // Bouton pour ajouter une question
let questionCounter     = 0; // Compteur du nombre de questions

// ***************** CONTROLES DE SAISIE

// 1) Contrôle du contenu d'une <div> question, avant l'ajout d'une nouvelle question

addQuestion.addEventListener("click", controleNbReponses); // Quand on clique sur le bouton "ajouter une question"

function controleNbReponses(){
  if   (galerieQuestions.childElementCount===0) ajouterQuestion(); // Si il n'y a pas de questions, on ajoute direct une question sans vérifier le nombre de réponses
  else {                                                         // Sinon, on vérifie le nombre de réponses de la dernière question créée
    const listeQuestions  = [...galerieQuestions.children];
    const questionEvaluee = listeQuestions[listeQuestions.length-1];
    // Identification du nombre de réponses de la dernière question. Si il y en a moins que 2, on affiche un message d'erreur. Sinon, on lance la fonction qui contrôle la saisie
    const nbReponses = questionEvaluee.querySelector(".reponsePossible");
    let message      = questionEvaluee.querySelector(".messageReponse");
    if   (nbReponses.childElementCount < 2) message.textContent = "Veuillez entrer au moins 2 réponses pour que le questionnaire soit valide";
    else {
      message.textContent = ""; // Vider les messages d'erreur quand la condition est validée (au moins 2 réponses dans la question)
      contenuInput(questionEvaluee, message);
    }
  }
}

function contenuInput (question, message) { // Contrôle du contenu de tous les input type de type text au sein d'une question. Valable pour les input des questions et réponses car ils ont les mêmes autorisations, cf compte rendu
  let compteurErreurs = 0;
  const contenuInput  = question.querySelectorAll('input[type="text"]');

  contenuInput.forEach(texte => {
    texte.value = texte.value.trim();
    if (texte.value === "" || texte.value.length < 2 || texte.value.length > 130) { 
      message.textContent="La saisie est incorrecte, vous devez entrer pour chaque champ au moins 2 caractères et au maximum 130";
      compteurErreurs++;
    }
  });
  if (compteurErreurs === 0) {
    message = "";
    ajouterQuestion();
  }
}

// 2) Contrôle du contenu du formulaire avant soumission (nombre de questions, validation des bonnes réponses, titre, couverture)

const formulaire = document.querySelector("#formulaireQuiz");
formulaire.addEventListener("submit", controleSoumission);

function controleSoumission(event){
  event.preventDefault(); // Attendre la vérification des paramètres du quiz avant de soumettre
  let messageSubmit         = document.querySelector("#messageVerifierQuiz");
  messageSubmit.textContent = ""; // Vider les éventuelles précédentes erreurs lors du nouveau click

  const Couverture  = validerCouverture(messageSubmit);
  const Titre       = validerTitre(messageSubmit);
  const NbQuestions = validerNbQuestions(messageSubmit);
  const Radio       = validerRadio(messageSubmit);

  if (Radio === true && NbQuestions === true && Titre === true && Couverture === true) {
    formulaire.submit(); // Si toutes les fonctions de contrôle renvoient true, alors le formulaire est correct et peut être soumis
  }
}

function validerRadio(message) {
  let valide;
  let countQuestionsNotOk = 0;
  const listeQuestions    = [...galerieQuestions.children];

  listeQuestions.forEach(question => {
    let countRadiosChecked = 0;
    const inputRadios      = question.querySelectorAll('input[type="radio"]');

    inputRadios.forEach(radio => {
      if (radio.checked) countRadiosChecked += 1;
    });

    if (countRadiosChecked === 0) countQuestionsNotOk += 1; // si tous les radios sont non sélectionnés, la question ajoute +1 au compteur de questions non valides
  });

  if (countQuestionsNotOk != 0) {
    message.innerHTML += "<br> ERREUR - Vous n'avez pas sélectionné de réponse juste pour chaque question";
    valide = false;
  } else valide = true;

  return valide;
}

function validerNbQuestions(message) {
    let valide;
    const listeQuestions = [...galerieQuestions.children];

    if (listeQuestions.length < 2) {
      message.innerHTML += "<br> ERREUR - Veuillez créer au moins 2 questions pour que le quiz soit valide";
      valide = false;
    } else valide = true;

    return valide;
}

export function validerTitre(message) { // Cette fonction est exportée pour être testée dans le fichier de tests unitaires QUnit
    let valide;
    const titreQuiz = document.querySelector("#titreQuiz");
    titreQuiz.value = titreQuiz.value.trim();

    if (titreQuiz.value === "" || titreQuiz.value.length < 2 || titreQuiz.value.length > 30 || !/^[a-zA-Z0-9éèàâêçÉÈÀÂÊÇ.,;:'"!?()\s$€\-/*%°#~&]+$/.test(titreQuiz.value)) { 
      message.innerHTML += "<br>ERREUR - Le titre n'est pas correct, merci d'entrer au moins 2 caractères et au plus 30. Vous avez le droit d'entrer des chiffres et de la ponctuation.";
      valide = false;
    } else valide = true;

    return valide;
}

function validerCouverture(message) {
  // Accept="image/*" dans le fichier HTML permet déjà de ne demander que des images
  let valide;
  const inputImage = document.getElementById('inputImage');

  if (inputImage.files.length > 0 && inputImage.files[0].size < 500 * 1024) valide = true;
  else {
    message.innerHTML += "<br>ERREUR - merci de sélectionner une image de couverture (maximum 500 ko)";
    valide = false;
  }

    return valide; 
}

// *************** AFFICHAGE

function ajouterQuestion() {
  questionCounter++;
  // Création d'une nouvelle <div> qui contiendra les éléments de la question
  const questionDiv     = document.createElement('div');
  questionDiv.id        = idQuiz + '-question-' + questionCounter;
  questionDiv.className = "question";
  galerieQuestions.appendChild(questionDiv);

  // Identifiants dynamiques (cf compte rendu)
  const idReponsesPossibles = 'question-' + questionCounter + '-reponsesPossibles';
  const idReponsesVraies    = 'question-' + questionCounter + '-reponsesVraies';
  const idAjouterReponse    = 'question-' + questionCounter + '-ajouterReponse';
  const idSupprimerQuestion = 'question-' + questionCounter + '-supprimerReponse';
    
  questionDiv.innerHTML += `
    <input type="text" placeholder="Entrez votre question" class="FormulaireRechercher ">
    <div class="reponses">
      <div id="${idReponsesPossibles}" class="reponsePossible">
        
      </div>
      <fieldset id="${idReponsesVraies}" class="reponseVraie">
        <legend>Sélectionnez la <br> réponse vraie :</legend>
        
      </fieldset>
    </div>
    <button id="${idAjouterReponse}" class="bouton" type="button">Ajouter une réponse</button>
    <button id="${idSupprimerQuestion}" class="bouton" type="button">Supprimer la question</button>
    <br><div class="messageReponse"></div>
  `;
// Supprimer une question
const supprimerQuestionBouton = document.querySelector(`#${idSupprimerQuestion}`);
supprimerQuestionBouton.addEventListener("click", () => galerieQuestions.removeChild(questionDiv));
// Ajouter une question
const ajouterReponseBouton = document.querySelector(`#${idAjouterReponse}`);
ajouterReponseBouton.addEventListener("click", () => ajouterReponse(idReponsesPossibles, idReponsesVraies, questionDiv.id));
}

function ajouterReponse(idReponsesPossibles, idReponsesVraies, questionId) {
  const divReponsesPossibles = document.getElementById(idReponsesPossibles);
  const divReponsesVraies    = document.getElementById(idReponsesVraies);
  const reponseCounter       = divReponsesPossibles.childElementCount + 1; // divReponsesPossibles et divReponsesVraies ont toujours le même nombre d'enfant et sont liés, le counter peut donc n'être mis que sur l'un d'eux
  const reponseId            = questionId + '-reponsesChoix-' + reponseCounter;

  // Créer un nouvel élément input de type texte (il vaut mieux utiliser .createElement plutôt que .innerHTML, car ce dernier supprime les éléments pour les refaire et efface la saisie des questions)
  const inputReponse       = document.createElement('input');
  inputReponse.type        = 'text';
  inputReponse.placeholder = 'Entrez une réponse';
  inputReponse.className   = 'FormulaireRechercher formulaireQuiz';

  // Créer un nouvel élément input de type radio
  const inputRadio = document.createElement('input');
  inputRadio.id    = reponseId;
  inputRadio.type  = 'radio';
  inputRadio.name  = `${questionId}-reponseCorrecte`;

  // Ajouter les nouveaux éléments aux div correspondantes
  divReponsesPossibles.appendChild(inputReponse);
  divReponsesVraies.appendChild(inputRadio);
}


