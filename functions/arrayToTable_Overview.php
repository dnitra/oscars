<?php 

function arrayToTable_Overview(array $arrayOfMovies){
    // var_dump($arrayOfMovies);
 usort($arrayOfMovies, function($a, $b) {
    return ($a->yearReleased - $b->yearReleased);
 });


    echo " <h2>Oscar winnings overview</h2>";
    echo "<table class='table'>";
    
    echo '<thead>

    <th scope="col">Year released</th>
    <th scope="col">Female actor</th>
    <th scope="col">Male actor</th>
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

