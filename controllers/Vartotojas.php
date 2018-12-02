<?php
include_once("configuration/config.php");
//Paima 1 elementą iš duombazės pagal jo ID
function selectVartotojas($id){
    global $mysqli;
    $query =  "SELECT * FROM Vartotojas WHERE id = ".$id;
    if($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $temp = new Vartotojas($row['vardas'], $row['pavarde'], $row['el_pastas'], $row['adresas'], $row['role'],
            $row['isleista_pinigu'], $row['nupirkta_knygu'], $row['bonus_pinigai'], $row['nuolaida'], $row['bonus_narys']);
        $temp->id = $row['id'];
        return $temp;
    }
    return null;
}
//Paima daug elemetų iš duombazės pagal pateiktą sąlygą
function selectManyVartotojas($where = null){
    global $mysqli;
    if($where == null){
        $where = "";
    }else{
        $where = " WHERE ".$where;
    }
    $result = [];
    $query = "SELECT * FROM Vartotojas".$where;
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Vartotojas($row['vardas'], $row['pavarde'], $row['el_pastas'], $row['adresas'], $row['role'],
                $row['isleista_pinigu'], $row['nupirkta_knygu'], $row['bonus_pinigai'], $row['nuolaida'], $row['bonus_narys']);
            $temp->id = $row['id'];
            $result[] = $temp;
        }
    }
    return $result;
}
//Įterpia elementą į duombazę
function insertVartotojas($object, $password){
    global $mysqli;
    $query =  "INSERT INTO Vartotojas (vardas, pavarde, el_pastas, slaptazodis, adresas, role, isleista_pinigu, nupirkta_knygu, 
      bonus_pinigai, nuolaida, bonus_narys) VALUE (
          '".mysqli_real_escape_string($mysqli, $object->vardas)."',
          '".mysqli_real_escape_string($mysqli, $object->pavarde)."',
          '".mysqli_real_escape_string($mysqli, $object->el_pastas)."',
          '".mysqli_real_escape_string($mysqli, $password)."',
          '".mysqli_real_escape_string($mysqli, $object->adresas)."',
          ".mysqli_real_escape_string($mysqli, $object->role).",
          ".mysqli_real_escape_string($mysqli, $object->isleista_pinigu).",
          ".mysqli_real_escape_string($mysqli, $object->nupirkta_knygu).",
          ".mysqli_real_escape_string($mysqli, $object->bonus_pinigai).",
          ".mysqli_real_escape_string($mysqli, $object->nuolaida).",
          ".mysqli_real_escape_string($mysqli, $object->bonus_narys)."          
        )";
    mysqli_query($mysqli, $query);
}
//Atnaujina elementą duombazėje
function updateVartotojas($object){
    global $mysqli;
    $query = "UPDATE Vartotojas SET 
          vardas='".$object->vardas."',
          pavarde='".$object->pavarde."',
          el_pastas='".$object->el_pastas."',
          adresas='".$object->adresas."', 
          role=".$object->role.", 
          isleista_pinigu=".$object->isleista_pinigu.", 
          nupirkta_knygu=".$object->nupirkta_knygu.", 
          bonus_pinigai=".$object->bonus_pinigai.", 
          nuolaida=".$object->nuolaida.", 
          bonus_narys=".$object->bonus_narys.", 
          WHERE id = ".$object->id;
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeVartotojas($object){
    global $mysqli;
    $query = "DELETE FROM Naujienos WHERE id = ".$object->id;
    mysqli_query($mysqli, $query);
}