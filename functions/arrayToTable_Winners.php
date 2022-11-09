<?php


/**
 * funkce, ktera zobrazi data z array filmu v pozadovane tabulce
 */

function arrayToTable_Winners(array $arrayOfMovies)
{
    
    /**
     * seradit data z tabulky podle nazvu filmu
     */
    usort($arrayOfMovies, function ($a, $b) {
        return strcmp($a->movieName, $b->movieName);
    });


    echo " <h2>Filmy, které vyhrály Oscar v kategoriích nejlepší herec i herečka</h2>";
    echo "<table class='table table-hover table-striped'>";

    echo '<thead>

    <th scope="col"></th>
    <th scope="col">Název filmu</th>
    <th scope="col">Rok</th>
    <th scope="col">Ženy</th>
    <th scope="col">Muži</th>
    </thead>';

    echo '<tbody>';
    foreach ($arrayOfMovies as $nRow => $movie) {

        echo "<tr>";
        echo "<th scope='row'>" . $nRow + 1 . "</th>";
        echo "<td>{$movie->movieName}</td>";
        echo "<td >{$movie->yearReleased}</td>";
        echo "<td>{$movie->femaleActor['actorName']}</td>";
        echo "<td>{$movie->maleActor['actorName']}</td>";
    }

    echo '</tbody>';
    echo "</table>";
}
