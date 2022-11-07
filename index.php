

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Oscars</title>
</head>

<body>

    <?php

    require_once "classes/Winner.php";
    require_once "functions/fileToArray.php";
    require_once "functions/isMovieInTable.php";
    require_once "functions/arrayToTable.php";
    

    $maleActors = "oscar_age_male.csv";
    $femaleActors = "oscar_age_female.csv";

    $filesArray = ["male"=>$maleActors, "female" => $femaleActors];


    $winners = [];

    foreach($filesArray as $actors_gender =>$file_name){

        fileToArray ($winners,$file_name,$actors_gender);
    }

    arrayToTable($winners);


    




    ?>


</body>

</html>