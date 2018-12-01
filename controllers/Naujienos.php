<?php
include_once("../configuration/config.php");
//Paima 1 elementą iš duombazės pagal jo ID
function selectNaujienos($id){
    $query =  "SELECT * FROM Naujienos WHERE id = ".$id;
    if($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Naujienos($row['pavadinimas'], $row['tekstas'], $row['parasymo_data'], $row['publikavimo_data']);
        $temp->id = $row['id'];
        return $temp;
    }
}
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyNaujienos($object, $where = null){
    if($where == null){
        $where = "";
    }else{
        $where = " WHERE ".$where;
    }
    $result = [];
    $query = "SELECT * FROM Naujienos".$where;
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Naujienos($row['pavadinimas'], $row['tekstas'], $row['parasymo_data'], $row['publikavimo_data']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}
//Įterpia elementą į duombazę
function insertNaujienos($object){
    $query =  "INSERT INTO Naujienos (pavadinimas, tekstas, parasymo_data, publikavimo_data) VALUE (
          '".mysqli_real_escape_string($mysqli, $object->pavadinimas)."', 
          '".mysqli_real_escape_string($mysqli, $object->tekstas)."', 
          NOW(), 
          ".mysqli_real_escape_string($mysqli, $object->publikavimo_data)."
          
        )";
    mysqli_query($mysqli, $query);
}
//Atnaujina elementą duombazėje
function updateNaujienos($object){
    $query = "UPDATE Naujienos SET 
          pavadinimas='".$object->pavadinimas."',
          tekstas='".$object->tekstas."',
          parasymo_data='".$object->parasymo_data."',
          publikavimo_data='".$object->publikavimo_data."'
          WHERE id = ".$object->id;
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeNaujienos($object){
    $query = "DELETE FROM Naujienos WHERE id = ".$object->id;
    mysqli_query($mysqli, $query);
}