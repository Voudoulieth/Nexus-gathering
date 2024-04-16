const edit = document.getElementById('btnedit');
const display = document.getElementById("bio");
const editable = document.getElementById("editableBioText");
const save = document.getElementById('btnsave');
const interet = document.getElementById('interet');
const editInterest = document.getElementById('editableInsterestText');
edit.addEventListener('click', edition);
save.addEventListener('click', sauvegarde);
function edition() {
    editable.value = display.innerHTML;
    display.style.display = "none";
    editable.style.display = "block";
    save.style.display = "block";
    edit.textContent = "Annuler";
    editInterest.value = interet.innerHTML;
    interet.style.display = "none";
    editInterest.style.display = "block";
}
function sauvegarde() {
    display.innerHTML = editable.value;
    display.style.display = "block";
    editable.style.display = "none";
    save.style.display = "none";
    edit.textContent = "Modifier";
    interet.innerHTML = editInterest.value;
    interet.style.display = "block";
    editInterest.style.display = "none";
}
