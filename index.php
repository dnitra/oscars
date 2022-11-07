

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

    include "classes/Winner.php";

    $maleActors = "oscar_age_male.csv";
    $femaleActors = "oscar_age_female.csv";

    $filesArray=[$maleActors,$femaleActors];
    $table = [];

    function (string $file_name, string $actor_gender){
    if (($handle = fopen($maleActors, 'r')) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            $movie = new Winner;
            $movie->movieName = $data[4]??null;
            $movie->yearReleased = $data[1] ?? null;
            $movie->maleActor = $data[3] ?? null;
            
            
            array_push($table,$movie);
            }
            fclose($handle);
        }
    }

        var_dump($table)
    ?>


</body>

</html>