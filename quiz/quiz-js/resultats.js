import * as data from './data.js';
  
let containerResultats = document.querySelector("#containerResultats");
let counterStat        = 0; // Sert à numéroter les stats
const resultatJoueur   = 2; // La valeur est codée en dur car nous n'avons pas encore les bases de données qui permettent de récupérer le résultat d'un joueur

for (let id in data.pourcentages) {  // le for in permet de parcourir toutes les propriétés d'un objet (apparemment plutôt recommandé pour les objets simples car il parcourt aussi les prototypes)

    containerResultats.innerHTML += `
    <div class="stats">
    <span>${counterStat}/3</span><span id="barre${counterStat}" class="barre"></span><span id="spanPourcentJoueurs${counterStat}">${data.pourcentages[id]}% des joueurs</span>
    </div>
    `;
    const barre       = document.getElementById(id);
    barre.style.width = data.pourcentages[id] + "%";

    // Afficher dans quel % de résultats se trouve le joueur
    const spanPourcentJoueurs = document.querySelector(`#spanPourcentJoueurs${counterStat}`);
    if (resultatJoueur === counterStat){
        spanPourcentJoueurs.textContent += ", dont vous !";
        barre.style.background          =  "linear-gradient(to right, #361a3d,#F45A01)";
    }
    counterStat++;
}