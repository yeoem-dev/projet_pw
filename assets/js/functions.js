function generateLicenceNumber() {
    // Obtenir les deux derniers chiffres de l'année actuelle
    var year = new Date().getFullYear().toString().slice(-2);

    // Générer les 6 chiffres restants de manière aléatoire
    var randomPart = '';
    for (var i = 0; i < 6; i++) {
        randomPart += Math.floor(Math.random() * 10).toString();
    }

    // Assembler le numéro de licence
    return year + randomPart;
}

// Appeler la fonction et assigner la valeur générée au champ numLicence
document.addEventListener('DOMContentLoaded', function() {
    var licenceNumber = generateLicenceNumber();
    document.getElementById('numLicence').value = licenceNumber;
});