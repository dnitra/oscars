<?php

function fileToArray(array &$table, string $file_name, string $actor_gender)
{
    if (($handle = fopen($file_name, 'r')) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {




            if (($key = isMovieInTable($table, $data[4]))) {

                $movie = $table[$key];
                if ($movie->maleActor === null) {
                    $movie->maleActor = $data[3];
                } else {
                    $movie->femaleActor = $data[3];
                }
            } else {

                $movie = new Winner;
                $movie->movieName = $data[4] ?? null;
                $movie->yearReleased = $data[1] ?? null;
                if ($actor_gender === "male") {
                    $movie->maleActor = $data[3] ?? null;
                }
                if ($actor_gender === "female") {
                    $movie->femaleActor = $data[3] ?? null;
                }

                array_push($table, $movie);
            }
        }
        fclose($handle);
    }
}
