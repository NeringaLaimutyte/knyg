<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function select($id) {
    global $mysqli;
    $query = "SELECT * FROM Leidykla WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['pavadinimas'], $row['miestas'], $row['el_pasto_adresas'], $row['gatve'], $row['namo_numeris']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectMany($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Leidykla" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Leidykla($row['pavadinimas'], $row['miestas'], $row['el_pasto_adresas'], $row['gatve'], $row['namo_numeris']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insert($object) {
    global $mysqli;
    $query = "INSERT INTO Leidykla (pavadinimas, miestas, el_pasto_adresas, gatve, namo_numeris) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->pavadinimas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->miestas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->el_pasto_adresas) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->gatve) . "', 
          " . mysqli_real_escape_string($this->mysqli, $this->namo_numeris) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function update($object) {
    global $mysqli;
    $query = "UPDATE Leidykla SET 
          pavadinimas='" . $this->pavadinimas . "',
          miestas='" . $this->miestas . "',
          el_pasto_adresas='" . $this->el_pasto_adresas . "',
          el_pasto_adresas='" . $this->gatve . "',
          gatve='" . $this->namo_numeris . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function remove($object) {
    global $mysqli;
    $query = "DELETE FROM Leidykla WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
