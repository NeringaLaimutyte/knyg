<?php

include_once("configuration/config.php");

//Paima 1 elementą iš duombazės pagal jo ID
function selectKnyguSandelyje($id) {
    global $mysqli;
    $query = "SELECT * FROM Knygu_sandelyje WHERE id = " . $id;
    if ($result = mysqli_query($this->mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga']);
        $temp->id = $row['id'];
        return $temp;
    }
}

//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKnyguSandelyje($object, $where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $result = [];
    $query = "SELECT * FROM Knygu_sandelyje" . $where;
    if ($result = mysqli_query($this->mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Knygu_sandelyje($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga ']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertKnyguSandelyje($object) {
    global $mysqli;
    $query = "INSERT INTO Knygu_sandelyje (kiekis, fk_Sandelis, fk_Knyga , namo_numeris ) VALUE (
          '" . mysqli_real_escape_string($this->mysqli, $this->kiekis) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_Sandelis) . "', 
          '" . mysqli_real_escape_string($this->mysqli, $this->fk_Knyga) . "
          
        )";
    mysqli_query($this->mysqli, $query);
}

//Atnaujina elementą duombazėje
function updateKnyguSandelyje($object) {
    global $mysqli;
    $query = "UPDATE Knygu_sandelyje SET 
          kiekis='" . $this->kiekis . "',
          fk_Sandelis='" . $this->fk_Sandelis . "',
          fk_Knyga ='" . $this->fk_Knyga . "'
          WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

//Ištrina elementą iš duombazės
function removeKnyguSandelyje($object) {
    global $mysqli;
    $query = "DELETE FROM Knygu_sandelyje WHERE id = " . $this->id;
    mysqli_query($this->mysqli, $query);
}

?>
