<?php

function arrayToTable_Winners(array $arrayOfMovies)
{

    usort($arrayOfMovies, function ($a, $b) {
        return strcmp($a->movieName, $b->movieName);
    });


    echo " <h2>Movies with an Oscar winning actors and actress</h2>";
    echo "<table class='table table-hover table-striped'>";

    echo '<thead>

    <th scope="col"></th>
    <th scope="col">Movie name</th>
    <th scope="col">Year released</th>
    <th scope="col">Male actor</th>
    <th scope="col">Female actor</th>
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
