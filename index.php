<?php
require_once "classes/Winner.php";
require_once "functions/fileToArray.php";
require_once "functions/arrayToTable_Winners.php";
require_once "functions/arrayToTable_Overview.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Výherci Oscarů</title>

</head>

<body>
    <?php

    //zobrazit formular pro vlozeni souboru pouze pokud soubory jeste nejsou nahrany
    if (!isset($_FILES["maleActor"]) && !isset($_FILES["femaleActor"])) :
    ?>
        <h2>Prosím vložte soubory podle kategorie:</h2>
        <form enctype="multipart/form-data" action="" method="post">
            <div class="mb-3">
                <label for="formFile" class="form-label">Nejlepší mužské role:</label>
                <input required value="file" class="form-control" type="file" id="maleActor" name="maleActor">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Nejlepší ženské role:</label>
                <input required class="form-control" type="file" id="femaleActor" name="femaleActor">
            </div>

            <button class="btn btn-primary" type="submit">Zobrazit data</button>

        </form>
    <?php

    endif;
    ?>


    <?php
    //zkontrolovat, ze oba soubory byly nahrany
    if (isset($_FILES["maleActor"]) && isset($_FILES["femaleActor"])) {
        
        //zobrazit link pro znovu zobrazeni formulare
        echo "<a href='index.php'>Go back</a>";

        //array se vsemi nahravanymi soubory...
        //Key = kategorie filmu a musi odpovidat dane hodnote ve Winner class
        $filesArray =
            [
                "maleActor" => $_FILES["maleActor"]["name"],
                "femaleActor" => $_FILES["femaleActor"]["name"]
            ];

        //priprava arrays pro obe zobrazovane tabulky
        $winners = [];
        $overview = [];

        //vyvolat funkci pro cteni a praci se soubory
        foreach ($filesArray as $actors_gender => $file_name) {

            fileToArray($winners, $file_name, $actors_gender, 4);
            fileToArray($overview, $file_name, $actors_gender, 1);
        }

        //pro zobrazeni prvni tabulky vybrat pouze ty filmy, kde film vyhral v obou kategoriich
        $onlyBothInWinners = array_filter($winners, function ($movie) {
            return (!empty($movie->maleActor["actorName"]) && !empty($movie->femaleActor["actorName"]));
        });

        //vyvolat funkce pro zobrazeni dat
        arrayToTable_Winners($onlyBothInWinners);
        arrayToTable_Overview($overview);
    }
    ?>


</body>

</html>