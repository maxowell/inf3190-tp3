<?php

    $id = "1";
    $nom = "";
	$type = "";
	$race = "";
	$age = "";
	$description = "";
	$courriel = "";
    $adresse = "";
    $ville = "";
    $cp = "";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["nom"]) || !isset($_POST["type"]) ||
            !isset($_POST["race"]) || !isset($_POST["age"]) ||
            !isset($_POST["desc"]) || !isset($_POST["courriel"]) ||
            !isset($_POST["adresse"]) || !isset($_POST["ville"]) ||
            !isset($_POST["cp"])) {
            http_response_code(400);
            exit;
        }

        $nom = $_POST["nom"];
        $type = $_POST["type"];
        $race = $_POST["race"];
        $age = $_POST["age"];
        $desc = $_POST["desc"];
        $courriel = $_POST["courriel"];
        $adresse = $_POST["adresse"];
        $ville = $_POST["ville"];
        $cp = $_POST["cp"];

        $file = file("../animaux.csv");
        $lastAnimal = explode(",",$file[count($file)-1]);
        $id = $lastAnimal[0];
        $num = explode('X',$id);
        $number = $num[1];
        $number++;
        $id = 'X' . $number;

        $file = fopen("../animaux.csv", 'a');
        fwrite($file, "\n" . $id . "," . $nom . "," . $type . "," . $race . "," . $age . "," . $desc . "," .
            $courriel . "," . $adresse . "," . $ville . "," . $cp);
        fclose($file);
    }

?>

<!DOCTYPE>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
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

<h1>Confirmation de la mise en adoption de : </h1>

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

