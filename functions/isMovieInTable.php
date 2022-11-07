<?php

function isMovieInTable(array $moviesTable, ?string $movieToFind)
{

    foreach ($moviesTable as $key => $movie) {
        if ($movie->movieName === $movieToFind) {
            return $key;
        }
    }

    return false;
}
