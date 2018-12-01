<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectUzsakymas($id) {
    global $mysqli;
    $query = "SELECT * FROM Uzsakymas WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['kiekis'], $row['fk_Knyga'], $row['fk_Knygu_sarasas']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyUzsakymas($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Uzsakymas" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Uzsakymas($row['kiekis'], $row['fk_Knyga'], $row['fk_Knygu_sarasas ']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertUzsakymas($object) {
    global $mysqli;
    $query = "INSERT INTO Uzsakymas (kiekis, fk_Knyga, fk_Knygu_sarasas , namo_numeris ) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->kiekis) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_Knyga) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_Knygu_sarasas) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateUzsakymas($object) {
    global $mysqli;
    $query = "UPDATE Uzsakymas SET 
          kiekis='" . $this->kiekis . "',
          fk_Knyga='" . $this->fk_Knyga . "',
          fk_Knygu_sarasas ='" . $this->fk_Knygu_sarasas . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeUzsakymas($object) {
    global $mysqli;
    $query = "DELETE FROM Uzsakymas WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>