<?php
include_once("configuration/config.php");
//Paima 1 elementą iš duombazės pagal jo ID
function selectNaujienos($id){
    global $mysqli;
    $query =  "SELECT * FROM Naujienos WHERE id = ".$id;
    if($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row == NULL){
            return NULL;
        }
        $temp = new Naujienos($row['pavadinimas'], $row['tekstas'], $row['parasymo_data'], $row['publikavimo_data']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyNaujienos($where = null){
    global $mysqli;
    if($where == null){
        $where = "";
    }else{
        $where = " WHERE ".$where;
    }
    $results = [];
    $query = "SELECT * FROM Naujienos".$where;
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Naujienos($row['pavadinimas'], $row['tekstas'], $row['parasymo_data'], $row['publikavimo_data']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}
//Įterpia elementą į duombazę
function insertNaujienos($object){
    global $mysqli;
    $query =  "INSERT INTO Naujienos (pavadinimas, tekstas, parasymo_data, publikavimo_data) VALUE (
          '".mysqli_real_escape_string($mysqli, $object->pavadinimas)."', 
          '".mysqli_real_escape_string($mysqli, $object->tekstas)."', 
          NOW(), 
          '".mysqli_real_escape_string($mysqli, $object->publikavimo_data)."'
          
        )";
    mysqli_query($mysqli, $query);
}
//Atnaujina elementą duombazėje
function updateNaujienos($object){
    global $mysqli;
    $query = "UPDATE Naujienos SET 
          pavadinimas='". mysqli_real_escape_string($mysqli, $object->pavadinimas)."',
          tekstas='". mysqli_real_escape_string($mysqli, $object->tekstas)."',
          publikavimo_data='". mysqli_real_escape_string($mysqli, $object->publikavimo_data)."'
          WHERE id = ". mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeNaujienos($object){
    global $mysqli;
    $query = "DELETE FROM Naujienos WHERE id = ". mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}