<?php 

function arrayToTable($table){

    echo "<table class='table'>";
    
    echo '<thead>
    <th scope="col">Movie name</th>
    <th scope="col">Year released</th>
    <th scope="col">Male actor</th>
    <th scope="col">Female actor</th>
    </thead>';
    
    echo '<tbody>';
    foreach($table as $movie){
        
        echo "<tr>";
        
        foreach($movie as $prop){
            echo "<td>".$prop. "</td>";
        }
        
        echo "</tr>";
        
        
    }
    
    echo '</tbody>';
    echo "</table>";
}



?>

