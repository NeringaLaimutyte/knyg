<?php
class Autoriai{
    public $id;
    public $vardas;
    public $pavarde;
    public $biografija ;
    public $namo_numeris ;
    public $mysqli;
    //Autorius konstruktorius.
    function __construct($mysqli, $vardas = '', $pavarde = '', $biografija  = '') {
        $this->mysqli = $mysqli;
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->biografija  = $biografija;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Autorius WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->vardas = $row['vardas'];
            $this->pavarde  = $row['pavarde '];
            $this->biografija  = $row['biografija '];
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
        $query = "SELECT * FROM Autorius".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Autorius($row['vardas'], $row['pavarde'], $row['biografija ']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Autorius (vardas, pavarde, biografija , namo_numeris ) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->vardas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->pavarde)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->biografija)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Autorius SET 
          vardas='".$this->vardas."',
          pavarde='".$this->pavarde."',
          biografija ='".$this->biografija ."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Autorius WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
