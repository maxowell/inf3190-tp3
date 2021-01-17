let bool = true;

function adoption () {
    verif("nom", "erreurNom");
    verif("type", "erreurType");
    verif("race", "erreurRace");
    verif("desc", "erreurDesc");
    verif("courriel", "erreurCourriel");
    verif("adresse", "erreurAdresse");
    verif("ville", "erreurVille");
    verif("cp", "erreurCp");
    verifNom();
    verifCourriel();
    verifCp();

    if (bool) {
        /*document.location.href = "../adoption/adoption.php?nom=" + document.getElementById("nom").value
            + "&type=" + document.getElementById("type").value
            + "&race=" + document.getElementById("race").value
            + "&age=" + document.getElementById("age").value
            + "&desc=" + document.getElementById("desc").value
            + "&courriel=" + document.getElementById("courriel").value
            + "&adresse=" + document.getElementById("adresse").value
            + "&ville=" + document.getElementById("ville").value
            + "&cp=" + document.getElementById("cp").value;*/
        document.querySelector('form').submit();
    }
}



function verif (input, erreurInput) {
    let element = document.getElementById(input);
    let erreur = document.getElementById(erreurInput);
    erreur.innerHTML = "";
    if (element === null || element.value === "") {
        erreur.innerHTML = "Le champ est obligatoire.<br>";
        bool = false;
    }
    if (element !== null && element.value.indexOf(",") > -1) {
        erreur.innerHTML = "Le champ ne peut contenir de virgule.<br>";
        bool = false;
    }
}

function verifNom () {
    let element = document.getElementById("nom");
    let erreur = document.getElementById("erreurNom");
    if (element.value.length < 3 || element.value.length > 20) {
        erreur.innerHTML = erreur.innerHTML + "Le nom doit avoir entre 3 et 20 caractères.<br>";
        bool = false;
    }
}

function verifCourriel () {
    let element = document.getElementById("courriel");
    let erreur = document.getElementById("erreurCourriel");
    let regex = new RegExp(/.+@(.+\.)+.{2,}/);
    if (!element.value.match(regex)) {
        erreur.innerHTML = erreur.innerHTML + "L'adresse courriel doit avoir un format valide.<br>";
        bool = false;
    }
}

function verifCp () {
    let element = document.getElementById("cp");
    let erreur = document.getElementById("erreurCp");
    let regex = new RegExp(/[A-z][0-9][A-z] [0-9][A-z][0-9]/);
    if (!element.value.match(regex)) {
        erreur.innerHTML = erreur.innerHTML + "Le code postal doit avoir un format canadien.<br>";
        bool = false;
    }
}
