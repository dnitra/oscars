<?php
include_once "classes/Winner.php";


function fileToArray_Winners(array &$winnersTable, string $file_name, string $actor_gender)
{
    
    if (($handle = fopen($file_name, 'r')) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            if (!empty($data[1])) {

                if (empty($winnersTable[$data[4]])) {
                    $winnersTable[$data[4]] = new Winner;
                }
                $winnersTable[$data[4]]->yearReleased = $data[1] ?? null;
                $winnersTable[$data[4]]->movieName = $data[4] ?? null;
                $winnersTable[$data[4]]->$actor_gender["actorName"] = $data[3] ?? null;
                $winnersTable[$data[4]]->$actor_gender["movieName"] = $data[4] ?? null;
            }
        }
        fclose($handle);
    }

    
}
