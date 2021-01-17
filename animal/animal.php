<?php
    $nom = "";
    $type = "";
    $race = "";
    $age = "";
    $desc = "";
    $courriel = "";
    $adresse = "";
    $ville = "";
    $cp = "";
    $id = $_REQUEST["id"];
    $animaux = file("../animaux.csv");

    if ($id != "") {
        foreach ($animaux as $attributs) {
            $attribut = explode(',', $attributs);
            if (strcmp($attribut[0], $id) == 0) {
                $nom = $attribut[1];
                $type = $attribut[2];
                $race = $attribut[3];
                $age = $attribut[4];
                $desc = $attribut[5];
                $courriel = $attribut[6];
                $adresse = $attribut[7];
                $ville = $attribut[8];
                $cp = $attribut[9];
            }
        }
    }

?>

<!DOCTYPE>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $nom;?></title>
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

        <div class="container">
            <br><div class="row">
                <div class="col">
                    <h1 class="pres"><?php echo $nom?></h1>
                    <ul>
                        <li><h5 class="font-weight-normal">Type : <?php echo $type?></h5></li>
                        <li><h5 class="font-weight-normal">Race : <?php echo $race?></h5></li>
                        <li><h5 class="font-weight-normal">Age : <?php echo $age?></h5></li>
                        <li><h5 class="font-weight-normal">Description : <?php echo $desc?></h5></li>
                    </ul>
                </div>
                <div class="col">
                    <h1 class="pres">Contacter le propriétaire : </h1>
                    <ul>
                        <li><h5 class="font-weight-normal">Courriel : <a href="mailto:<?php echo $courriel?>"><?php echo $courriel?></a></h5></li>
                        <li><h5 class="font-weight-normal">Adresse : <?php echo $adresse?></h5></li>
                        <li><h5 class="font-weight-normal">Ville : <?php echo $ville?></h5></li>
                        <li><h5 class="font-weight-normal">Code postal : <?php echo $cp?></h5></li>
                    </ul>
                </div>
            </div>
            <br><img src="../ressources/adoption.jpg" alt="adoption" id="adoption" class="img-fluid">
        </div>
        <script rel="javascript" type="text/javascript" src="../vendor/JS/jquery-3.5.1.min.js"></script>
        <script rel="javascript" type="text/javascript" src="../vendor/JS/bootstrap.min.js"></script>
    </body>
</html>
