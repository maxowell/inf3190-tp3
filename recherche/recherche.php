<?php

    $animaux = file("../animaux.csv");
    $critere = strtolower($_REQUEST["critere"]);
    $suggestion = array();
    array_push($suggestion,$animaux[0]);

    if ($critere != "") {
        foreach ($animaux as $attributs) {
            $listeAttributs = explode(',', $attributs);
            foreach ($listeAttributs as $attribut) {
                if (!in_array($attributs, $suggestion)) {
                    if (strcmp(strtolower($attribut), $critere) == 0) {
                        array_push($suggestion, $attributs);
                    }
                }
            }
            $description = explode(' ', $listeAttributs[5]);
            foreach ($description as $mot) {
                if (!in_array($attributs, $suggestion)) {
                    if (strcmp(strtolower($mot), $critere) == 0) {
                        array_push($suggestion, $attributs);
                    }
                }
            }
        }
    }

?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <title>Recherche</title>
        <meta charset="UTF-8">
        <script src="../accueil/accueil.js"></script>
        <link rel="stylesheet" href="../vendor/CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../accueil/accueil.css?ver=<?php echo rand(111,999)?>">
    </head>
    <body>

        <div id="header">
            <div class="row">
                <div class="col">
                    <h1>Adoption et co</h1>
                </div>
                <div class="col">
                    <h2><a href="../accueil/accueil.html" class="text-dark">Accueil</a></h2>
                </div>
                <div class="col">
                    <h2><a href="../adoption/adoption.html" class="text-dark">Mise en adoption</a></h2>
                </div>
            </div>
        </div>

        <div id="footer">
            <h2>Recherche d'un animal</h2>
        </div>
        <div class="form-group row justify-content-center col-sm-12">
            <label for="critere" class="col-form-label col-sm-6 text-right">Critère de recherche : </label>
            <div class="col-sm-6">
                <input type="text" id="critere" name="critere">
                <h5 id="erreurRecherche"></h5>
            </div>
            <button type="button" onclick="rechercher()">Rechercher</button>
        </div>

        <div class="container-sm">
            <?php
                if (count($suggestion) > 1) {
                    echo "<table class='table table-sm table-bordered table-hover text-center'><thead class='thead-dark'><tr>";
                    $attributs = explode(',', $suggestion[0]);

                    echo "<th class='align-middle'>" . $attributs[1] . "</th>";
                    echo "<th class='align-middle'>" . $attributs[5] . "</th>";
                    echo "<th class='align-middle'>Page de l'animal</th>";

                    echo "</tr></thead><tbody>";

                    for ($i = 1; $i < count($suggestion); $i++) {
                        echo "<tr>";
                        $attributs = explode(',', $suggestion[$i]);

                        echo "<td class='align-middle'>" . $attributs[1] . "</td>";
                        echo "<td class='align-middle'>" . $attributs[5] . "</td>";
                        echo "<td class='align-middle'><a class='text-dark' href='../animal/animal.php?id=" . $attributs[0]
                            . "'>Cliquer ici</a></td>";

                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    echo "<h5>Aucun résultat correspondant. <a href='../accueil/accueil.html' class='text-dark'>
                        Retourner à l'accueil?</a></h5>";
                }

            ?>
            <br><img src="../ressources/dog.jpg" id="dog" alt="dog" class="img-fluid">
        </div>

        <script rel="javascript" type="text/javascript" src="../vendor/JS/jquery-3.5.1.min.js"></script>
        <script rel="javascript" type="text/javascript" src="../vendor/JS/bootstrap.min.js"></script>
    </body>
</html>
