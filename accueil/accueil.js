function fillTable () {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "accueil.php", true);
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4) {
            var container = document.getElementById("contenant");
            if (xmlhttp.status === 200) {
                container.innerHTML = xmlhttp.responseText;
            } else {
                container.innerHTML = "<p>Erreur lors du chargement des données.</p>";
            }
        }
    };
    xmlhttp.send();
}

function rechercher () {
    var critere = document.getElementById("critere").value;
    if (critere.trim() === "") {
        document.getElementById("erreurRecherche").innerHTML = "Le critère doit être non-vide.";
    } else {
        document.location.href="../recherche/recherche.php?critere=" + critere;
    }
}