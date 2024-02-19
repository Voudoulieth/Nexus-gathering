QUnit.module("Tests de Validation", function() {
    QUnit.test("Validation d'identifiant", function(assert) {
        assert.ok(isValidUsername("User123"), "Identifiant valide");
        assert.notOk(isValidUsername(""), "Identifiant vide est invalide");
        assert.notOk(isValidUsername("User 123"), "Identifiant avec espace est invalide");
    });

    QUnit.test("Validation de mot de passe", function(assert) {
        assert.ok(isValidPassword("Password1!"), "Mot de passe valide");
        assert.notOk(isValidPassword("pass"), "Mot de passe trop court est invalide");
    });

    QUnit.test("Validation d'email", function(assert) {
        assert.ok(isValidEmail("email@example.com"), "Email valide");
        assert.notOk(isValidEmail("email@example"), "Email sans domaine de premier niveau est invalide");
    });
});