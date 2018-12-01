<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyga($id) {
    global $mysqli;
    $query = "SELECT * FROM Knyga WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['pavadinimas'], $row['isleidimo_metai'], $row['kalba'], $row['paveikslelio_nuoroda'], $row['aprasymas'], $row['puslapiu_skaicius'], $row['ISBN_kodas'], $row['virselio_tipas'], $row['recenzija']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKnyga($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Knyga" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Naujienos($row['pavadinimas'], $row['isleidimo_metai'], $row['kalba'], $row['paveikslelio_nuoroda'], $row['aprasymas'], $row['puslapiu_skaicius'], $row['ISBN_kodas'], $row['virselio_tipas'], $row['recenzija']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertKnyga($object) {
    global $mysqli;
    $query = "INSERT INTO Knyga (pavadinimas, isleidimo_metai, kalba, paveikslelio_nuoroda, aprasymas, puslapiu_skaicius, ISBN_kodas, virselio_tipas, recenzija) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->pavadinimas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->isleidimo_metai) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->kalba) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->paveikslelio_nuoroda) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->aprasymas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->puslapiu_skaicius) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->ISBN_kodas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->virselio_tipas) . "', 
          " . mysqli_real_escape_string($this->mysqli, $this->recenzija) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyga($object) {
    global $mysqli;
    $query = "UPDATE Knyga SET 
          pavadinimas='" . $this->pavadinimas . "',
          isleidimo_metai='" . $this->isleidimo_metai . "',
          kalba='" . $this->kalba . "',
          kalba='" . $this->paveikslelio_nuoroda . "',
          kalba='" . $this->aprasymas . "',
          kalba='" . $this->puslapiu_skaicius . "',
          kalba='" . $this->ISBN_kodas . "',
          kalba='" . $this->virselio_tipas . "',
          paveikslelio_nuoroda='" . $this->recenzija . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyga($object) {
    global $mysqli;
    $query = "DELETE FROM Knyga WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
