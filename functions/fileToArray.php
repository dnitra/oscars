<?php
include_once "classes/Winner.php";


/**
 * Funkce ktera zkonvertuje data z cvs souboru do array
 * 
 * Parametry:
 * $moviesTable = tabulka, do ktere chceme zapisovat data
 * $file_name = nazev .cvs souboru, ze ktereho cteme data
 * $actor_gender = nazev inputu z formulare - urcuje, jestli se jedna o tabulku s zenami nebo muzi
 * $column = sloupec, ve kterem se nachazi pozadovana hodnota pro nasledne razeni filmu
 *          sloupec 4 = razeni podle nazvu filmu
 *          sloupec 1 = razeni podle roku vydani filmu
 */

function fileToArray(array &$moviesTable, string $file_name, string $actor_gender, int $column)
{

    // otevrit cvs soubor s poskytnutym jmenem
    if (($handle = fopen($file_name, 'r')) !== FALSE) {

        // preskocit prvni radek (headers)
        $headers = fgetcsv($handle, 1000, ",");

        // cist postumne vsechny radky, dokud nejake existuji
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            //zkontrolvoat, jestli se v radku vyskytuje rok vydani filmu, pokud ne, tak radek preskocit
            if (!empty($data[1])) {

                /**
                 * pokud tabulka jeste neobsahuje dany radek s rokem vydani filmu/nazvem filmu
                 * tak vytvorit novou polozku, ktera bude pojmenovana podle roku vydani filmu
                 * a vlozi se do ni nova instance Winner class
                 */
                if (empty($moviesTable[$data[$column]])) {
                    $moviesTable[$data[$column]] = new Winner;
                }

                //zapsat do tabulky data ze souboru z odpovidajicich sloupcu
                $moviesTable[$data[$column]]->yearReleased = $data[1] ?? null;
                $moviesTable[$data[$column]]->movieName = $data[4] ?? null;
                $moviesTable[$data[$column]]->$actor_gender["actorName"] = $data[3] ?? null;
                $moviesTable[$data[$column]]->$actor_gender["actorAge"] = $data[2] ?? null;
                $moviesTable[$data[$column]]->$actor_gender["movieName"] = $data[4] ?? null;
            }
        }

        //ukoncit cteni souboru
        fclose($handle);
    }
}
