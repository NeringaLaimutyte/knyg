<?php
include_once("configuration/config.php");
//Paima 1 elementą iš duombazės pagal jo ID
function selectKaina($id) {
    global $mysqli;
    $query = "SELECT * FROM Kaina WHERE id = " . $id;
    if ($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row == NULL){
            return NULL;
        }
        $temp = new Kaina($row['kaina'], $row['pastaba'], $row['PrData'], $row['PaData'], $row['fk_Knyga']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyKaina($where = null) {
    global $mysqli;
    if ($where == null) {
        $where = "";
    } else {
        $where = " WHERE " . $where;
    }
    $results = [];
    $query = "SELECT * FROM Kaina" . $where;
    if ($result = mysqli_query($mysqli, $query)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Kaina($row['kaina'], $row['pastaba'], $row['PrData'], $row['PaData'], $row['fk_Knyga']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
}

function latestKaina($fk_Knyga){
    $fk_Knyga *= 1;
    $result = null;
    if(count($kaina = selectManyKaina("fk_Knyga=".$fk_Knyga." AND PrData < NOW() AND PaData >= NOW()")) == 1){
        $result = $kaina[0];
    }else{
        $result =  selectManyKaina("fk_Knyga=".$fk_Knyga." AND PrData < NOW() AND PaData IS NULL ORDER BY id DESC")[0];
    }
    return $result;
}

//Įterpia elementą į duombazę
function insertKaina($object) {
    global $mysqli;
    $iki = "'" . mysqli_real_escape_string($mysqli, date('Y-m-d', strtotime($object->PaData))) . "'";
    if($object->PaData == ''){
        $iki = "NULL";
    }
    $query = "INSERT INTO Kaina (kaina, pastaba, PrData, PaData, fk_Knyga) VALUE (
          " . mysqli_real_escape_string($mysqli, $object->kaina)*1 . ",  
          '" . mysqli_real_escape_string($mysqli, $object->pastaba) . "',  
          '" . mysqli_real_escape_string($mysqli, date('Y-m-d', strtotime($object->PrData))) . "',  
          ".$iki.",  
          " . mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 . "        
        )";
    mysqli_query($mysqli, $query);
}
//Atnaujina elementą duombazėje
function updateKaina($object) {
    global $mysqli;
    $query = "UPDATE Kaina SET 
          kaina=" . mysqli_real_escape_string($mysqli, $object->kaina)*1 . ",
          pastaba='" . mysqli_real_escape_string($mysqli, $object->pastaba) . "',
          PrData='" . mysqli_real_escape_string($mysqli, $object->PrData) . "',
          PaData='" . mysqli_real_escape_string($mysqli, $object->PaData) . "',
          fk_Knyga=" . mysqli_real_escape_string($mysqli, $object->fk_Knyga)*1 . "
          WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeKaina($object) {
    global $mysqli;
    $query = "DELETE FROM Kaina WHERE id = " . mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}
?>