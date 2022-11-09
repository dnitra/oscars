<?php
require_once "classes/Winner.php";
require_once "functions/fileToArray_Winners.php";
require_once "functions/fileToArray_Overview.php";
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

    <title>Oscar winners</title>
    <style>
        .errors {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    if(!isset($_FILES["maleActor"]) && !isset($_FILES["femaleActor"])):
        ?>
        <h2>Please select corresponding files</h2>
    <form enctype="multipart/form-data" action="" method="post">
        <div class="mb-3">
            <label for="formFile" class="form-label">Oscar winning male actors:</label>
            <input required value="file" class="form-control" type="file" id="maleActor" name="maleActor">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Oscar winning female actress:</label>
            <input required class="form-control" type="file" id="femaleActor" name="femaleActor">
        </div>



        <button class="btn btn-primary" type="submit">Display the data</button>

    </form>
    <?php

    endif;
    ?>


    <?php 
    if (isset($_FILES["maleActor"]) && isset($_FILES["femaleActor"])) {
        
        echo "<a href='index.php'>Go back</a>";
        $filesArray = ["maleActor" => $_FILES["maleActor"]["name"], "femaleActor" => $_FILES["femaleActor"]["name"]];

        $winners = [];
        $overview= [];
       

        foreach ($filesArray as $actors_gender => $file_name) {

            fileToArray_Winners($winners, $file_name, $actors_gender);
            fileToArray_Overview($overview, $file_name, $actors_gender);
        }

        $onlyBothInWinners = array_filter($winners, function ($movie) {
            return (!empty($movie->maleActor["actorName"]) && !empty($movie->femaleActor["actorName"]));
        });

        

        arrayToTable_Winners($onlyBothInWinners);

        arrayToTable_Overview($overview);
    }
    ?>


</body>

</html>