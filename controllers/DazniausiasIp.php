<?php
include_once 'configuration/config.php';
include_once 'models/Vartotojas.php';
include_once 'models/Logas.php';
include_once 'controllers/Logas.php';
function dazniausiasIP($id){
    global $mysqli;
    $query =  "SELECT IP
               FROM Logas
               WHERE fk_Vartotojas = ".$id*1 ."
               GROUP BY IP
               ORDER BY COUNT(IP) DESC
               LIMIT 1";
    if($result = mysqli_query($mysqli, $query)) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if($row == NULL){
            return NULL;
        }
        return $row['IP'];
    }
    return null;
}