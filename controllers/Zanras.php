<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectZanras($id) {
    global $mysqli;
    $query = "SELECT * FROM zanras WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['pavadinimas']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyZanras($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM zanras" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new zanras($row['pavadinimas']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertZanras($object) {
    global $mysqli;
    $query = "INSERT INTO zanras (pavadinimas) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->pavadinimas) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateZanras($object) {
    global $mysqli;
    $query = "UPDATE zanras SET 
          pavadinimas='" . $this->pavadinimas . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeZanras($object) {
    global $mysqli;
    $query = "DELETE FROM zanras WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
