<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectSandelis($id) {
    global $mysqli;
    $query = "SELECT * FROM Sandelis WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['pavadinimas'], $row['gatve'], $row['miestas'], $row['namo_numeris']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManySandelis($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Sandelis" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Sandelis($row['pavadinimas'], $row['gatve'], $row['miestas '], $row['namo_numeris ']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertSandelis($object) {
    global $mysqli;
    $query = "INSERT INTO Sandelis (pavadinimas, gatve, miestas , namo_numeris ) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->pavadinimas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->gatve) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->miestas) . "', 
          " . mysqli_real_escape_string($this->mysqli, $this->namo_numeris) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateSandelis($object) {
    global $mysqli;
    $query = "UPDATE Sandelis SET 
          pavadinimas='" . $this->pavadinimas . "',
          gatve='" . $this->gatve . "',
          miestas ='" . $this->miestas . "',
          namo_numeris ='" . $this->namo_numeris . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeSandelis($object) {
    global $mysqli;
    $query = "DELETE FROM Sandelis WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
