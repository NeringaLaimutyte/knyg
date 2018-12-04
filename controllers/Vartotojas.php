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
    $results = [];
    $query = "SELECT * FROM Vartotojas".$where;
    if($result = mysqli_query($mysqli, $query)) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $temp = new Vartotojas($row['vardas'], $row['pavarde'], $row['el_pastas'], $row['adresas'], $row['role'],
                $row['isleista_pinigu'], $row['nupirkta_knygu'], $row['bonus_pinigai'], $row['nuolaida'], $row['bonus_narys']);
            $temp->id = $row['id'];
            $results[] = $temp;
        }
    }
    return $results;
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
          ".mysqli_real_escape_string($mysqli, $object->role)*1 .",
          ".mysqli_real_escape_string($mysqli, $object->isleista_pinigu)*1 .",
          ".mysqli_real_escape_string($mysqli, $object->nupirkta_knygu)*1 .",
          ".mysqli_real_escape_string($mysqli, $object->bonus_pinigai)*1 .",
          ".mysqli_real_escape_string($mysqli, $object->nuolaida)*1 .",
          ".mysqli_real_escape_string($mysqli, $object->bonus_narys)*1 ."          
        )";
    mysqli_query($mysqli, $query);
}
//Atnaujina elementą duombazėje
function updateVartotojas($object){
    global $mysqli;
    $query = "UPDATE Vartotojas SET 
          vardas='". mysqli_real_escape_string($mysqli, $object->vardas)."',
          pavarde='". mysqli_real_escape_string($mysqli, $object->pavarde)."',
          el_pastas='". mysqli_real_escape_string($mysqli, $object->el_pastas)."',
          adresas='". mysqli_real_escape_string($mysqli, $object->adresas)."', 
          role=". mysqli_real_escape_string($mysqli, $object->role)*1 .", 
          isleista_pinigu=". mysqli_real_escape_string($mysqli, $object->isleista_pinigu)*1 .", 
          nupirkta_knygu=". mysqli_real_escape_string($mysqli, $object->nupirkta_knygu)*1 .", 
          bonus_pinigai=". mysqli_real_escape_string($mysqli, $object->bonus_pinigai)*1 .", 
          nuolaida=". mysqli_real_escape_string($mysqli, $object->nuolaida)*1 .", 
          bonus_narys=". mysqli_real_escape_string($mysqli, $object->bonus_narys)*1 .", 
          WHERE id = ". mysqli_real_escape_string($mysqli, $object->id)*1 ;
    mysqli_query($mysqli, $query);
}
//Ištrina elementą iš duombazės
function removeVartotojas($object){
    global $mysqli;
    $query = "DELETE FROM Naujienos WHERE id = ". mysqli_real_escape_string($mysqli, $object->id);
    mysqli_query($mysqli, $query);
}