<?php
    $animaux = file("../animaux.csv");

    $numbers = range(1,count($animaux) - 1);
    shuffle($numbers);

    echo "<thead class='thead-dark'><tr>
            <th class='align-middle'>Nom</th>
            <th class='align-middle'>Type</th>
            <th class='align-middle'>Race</th>
            <th class='align-middle'>Age</th>
            <th class='align-middle'>Description</th>
            </tr></thead><tbody>";

    for ($i = 0; $i < 5; $i++) {
        echo "<tr>";
        $attributs = explode(',', $animaux[$numbers[$i]]);
        for ($j = 1; $j < 6; $j++) {
            echo "<td class='align-middle'><a class='text-dark' href='../animal/animal.php?id=" .
                $attributs[0] . "'>" . $attributs[$j] . "</a></td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
?>

