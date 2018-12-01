<?php
class Zanrai{
    public $id;
    public $pavadinimas;
    public $mysqli;
    //zanras konstruktorius.
    function __construct($mysqli, $pavadinimas = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM zanras WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->pavadinimas = $row['pavadinimas'];
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
        $query = "SELECT * FROM zanras".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new zanras($row['pavadinimas']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO zanras (pavadinimas) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->pavadinimas)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE zanras SET 
          pavadinimas='".$this->pavadinimas."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM zanras WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
