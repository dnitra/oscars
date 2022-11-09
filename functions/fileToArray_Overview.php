<?php
include_once "classes/Winner.php";

function fileToArray_Overview(array &$overviewTable, string $file_name, string $actor_gender)
{
    if (($handle = fopen($file_name, 'r')) !== FALSE) {
        $headers = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {


            if (!empty($data[1])) {

                if(empty($overviewTable[$data[1]])){
                        $overviewTable[$data[1]] = new Winner;
                }
                
                $overviewTable[$data[1]]->yearReleased= $data[1] ?? null;
                $overviewTable[$data[1]]->$actor_gender["actorName"] = $data[3] ?? null;
                $overviewTable[$data[1]]->$actor_gender["actorAge"] = $data[2] ?? null;
                $overviewTable[$data[1]]->$actor_gender["movieName"] = $data[4] ?? null;
        
            }
            
            
        }
        fclose($handle);
    }
    
}
