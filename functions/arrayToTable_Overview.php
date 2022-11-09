<?php

/**
 * funkce, ktera zobrazi data z array filmu v pozadovane tabulce
 */


function arrayToTable_Overview(array $arrayOfMovies){

    /**
     * seradit data z tabulky podle roku
     */
 usort($arrayOfMovies, function($a, $b) {
    return ($a->yearReleased - $b->yearReleased);
 });


    echo " <h2>Přehled výherců Oscaru podle roku</h2>";
    echo "<table class='table'>";
    
    echo '<thead>

    <th scope="col">Rok</th>
    <th scope="col">Ženy</th>
    <th scope="col">Muži</th>
    </thead>';
    
    echo '<tbody>';
    foreach($arrayOfMovies as $movie){
        
        echo "<tr>";
           
            echo "<td rowspan='2'>{$movie->yearReleased}</td>";
            echo "<td>{$movie->femaleActor['actorName']} ({$movie->femaleActor['actorAge']} )</td>";
            echo "<td>{$movie->maleActor['actorName']} ({$movie->maleActor['actorAge']} )</td>";
        
        echo "</tr>";
       
        echo "<tr>";
            echo "<td>{$movie->femaleActor['movieName']}</td>";
            echo "<td>{$movie->maleActor['movieName']}</td>";
        echo "</tr>";
        
    }
    
    echo '</tbody>';
    echo "</table>";
}

