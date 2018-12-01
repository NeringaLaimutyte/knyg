<?php
class Knygu_sarasai{
    public $id;
    public $data;
    public $fk_Leidykla;
    public $fk_Sandelis;
    public $mysqli;
    //Knygu_sarasas konstruktorius.
    function __construct($mysqli, $data = '', $fk_Leidykla = '', $fk_Sandelis = '') {
        $this->mysqli = $mysqli;
        $this->data = $data;
        $this->fk_Leidykla = $fk_Leidykla;
        $this->fk_Sandelis = $fk_Sandelis;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Knygu_sarasas WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->data = $row['data'];
            $this->fk_Sandelis = $row['fk_Sandelis'];
        }
    }
    //Paima daug elemetų iš duombazės pagal pateiktą sąlygą
    public function selectMany($where = null){
        if($where == null){
            $where = "";
        }else{
            $where = " WHERE ".$where;
        }
        $result = [];
        $query = "SELECT * FROM Knygu_sarasas".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Knygu_sarasas($row['data'], $row['fk_Leidykla'], $row['fk_Sandelis']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Knygu_sarasas (data, fk_Leidykla, fk_Sandelis) VALUE (
          NOW(), 
          '".mysqli_real_escape_string($this->mysqli, $this->fk_Leidykla)."', 
          ".mysqli_real_escape_string($this->mysqli, $this->fk_Sandelis)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Knygu_sarasas SET 
          data='".$this->data."',
          fk_Leidykla='".$this->fk_Leidykla."',
          fk_Sandelis='".$this->fk_Sandelis."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Knygu_sarasas WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
