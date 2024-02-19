import { validateInput, updateNumericValue } from './validation.js';

QUnit.module('validateInput Tests', function() {
    QUnit.test('Vide l\'input en cas de tentative d\'injection de HTML', function(assert) {
        // Créer un élément input de test
        let inputElement = document.createElement('input');
        
        // Cas où l'input contient du HTML simple
        inputElement.value = '<div>Test</div>';
        validateInput(inputElement);
        assert.strictEqual(inputElement.value, '', 'L\'input doit être vidé pour du HTML simple.');

        // Cas où l'input contient un script JavaScript
        inputElement.value = '<script>alert("XSS")</script>';
        validateInput(inputElement);
        assert.strictEqual(inputElement.value, '', 'L\'input doit être vidé pour une injection de script.');

        // Cas d'une entrée valide (sans HTML)
        inputElement.value = 'Texte valide sans HTML';
        validateInput(inputElement);
        assert.strictEqual(inputElement.value, 'Texte valide sans HTML', 'L\'input doit rester inchangé pour une entrée sans HTML.');
    });
});



QUnit.module('updateNumericValue Tests', function() {
    QUnit.test('Tests de validation de updateNumericValue', function(assert) {
        let inputElement = document.createElement('input');
        
        // Test de valeur supérieure
        inputElement.value = '75';
        updateNumericValue(inputElement, true, 2, 64);
        assert.notStrictEqual(inputElement.value, '75', 'Supérieure: Une valeur supérieure à la limite maximale ne doit pas être acceptée.');

        // Test de valeur négative
        inputElement.value = '-5';
        updateNumericValue(inputElement, true, 2, 64);
        assert.notStrictEqual(inputElement.value, '-5', 'Inférieur: Les valeurs négatives ne sont pas acceptées.');

        // Test d'insertion de texte
        inputElement.value = 'texte';
        updateNumericValue(inputElement, true, 2, 64);
        assert.notStrictEqual(inputElement.value, 'texte', 'Le texte n\'est pas accepté comme valeur.');

        // Test d'insertion de code HTML
        inputElement.value = '<script>alert("test")</script>';
        updateNumericValue(inputElement, true, 2, 64);
        assert.notStrictEqual(inputElement.value, '<script>alert("test")</script>', 'Le code HTML n\'est pas accepté comme valeur.');

        // Test de valeur normale
        inputElement.value = '10';
        updateNumericValue(inputElement, true, 2, 64);
        assert.strictEqual(inputElement.value, '11', 'Incrémentation: La valeur 10 doit être incrémentée à 11.');

        // Test de valeur minimale
        inputElement.value = '2';
        updateNumericValue(inputElement, true, 2, 64);
        assert.strictEqual(inputElement.value, '3', 'Incrémentation: La valeur minimale 2 doit être incrémentée à 3.');

        // Test de valeur maximale
        inputElement.value = '64';
        updateNumericValue(inputElement, true, 2, 64);
        assert.strictEqual(inputElement.value, '64', 'Incrémentation: La valeur maximale 64 doit rester inchangée.');

        // Décrémenter dans les limites valides
        inputElement.value = '5';
        updateNumericValue(inputElement, false, 2, 64);
        assert.strictEqual(inputElement.value, '4', 'Décrémentation: La valeur doit être décrémentée de manière valide de 5 à 4.');

        // Décrémenter au-delà de la limite minimale
        inputElement.value = '2';
        updateNumericValue(inputElement, false, 2, 64);
        assert.strictEqual(inputElement.value, '2', 'Décrémentation: La valeur ne doit pas être décrémentée en dessous de la limite minimale de 2.');
    });
});

