<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyga($id) {
    global $mysqli;
    $query = "SELECT * FROM Knyga WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Knyga($row['pavadinimas'], $row['isleidimo_metai'], $row['kalba'], $row['paveikslelio_nuoroda'],
            $row['aprasymas'], $row['puslapiu_skaicius'], $row['ISBN_kodas'], $row['virselio_tipas'], $row['recenzija']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKnyga($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Knyga" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knyga($row['pavadinimas'], $row['isleidimo_metai'], $row['kalba'], $row['paveikslelio_nuoroda'],
                $row['aprasymas'], $row['puslapiu_skaicius'], $row['ISBN_kodas'], $row['virselio_tipas'], $row['recenzija']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

//Įterpia elementą į duombazę
function insertKnyga($object) {
    global $mysqli;
    $query = "INSERT INTO Knyga (pavadinimas, isleidimo_metai, kalba, paveikslelio_nuoroda, aprasymas, puslapiu_skaicius, ISBN_kodas, virselio_tipas, recenzija) VALUE (
          '" . mysqli_real_escape_string($mysqli, $object->pavadinimas) . "', 
          " . mysqli_real_escape_string($mysqli, $object->isleidimo_metai) . ", 
          '" . mysqli_real_escape_string($mysqli, $object->kalba) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->paveikslelio_nuoroda) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->aprasymas) . "', 
          " . mysqli_real_escape_string($mysqli, $object->puslapiu_skaicius) . ", 
          '" . mysqli_real_escape_string($mysqli, $object->ISBN_kodas) . "', 
          '" . mysqli_real_escape_string($mysqli, $object->virselio_tipas) . "', 
          " . mysqli_real_escape_string($mysqli, $object->recenzija) . "
          
        )";
    mysqli_query($mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyga($object) {
    global $mysqli;
    $query = "UPDATE Knyga SET 
          pavadinimas='" . $object->pavadinimas . "',
          isleidimo_metai=" . $object->isleidimo_metai . ",
          kalba='" . $object->kalba . "',
          paveikslelio_nuoroda='" . $object->paveikslelio_nuoroda . "',
          aprasymas='" . $object->aprasymas . "',
          puslapiu_skaicius=" . $object->puslapiu_skaicius . ",
          ISBN_kodas='" . $object->ISBN_kodas . "',
          virselio_tipas='" . $object->virselio_tipas . "',
          recenzija='" . $object->recenzija . "'
          WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyga($object) {
    global $mysqli;
    $query = "DELETE FROM Knyga WHERE id = " . $object->id;
    mysqli_query($mysqli, $query);
}

?>
