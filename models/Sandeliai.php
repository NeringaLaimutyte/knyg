<?php
class Sandeliai{
    public $id;
    public $pavadinimas;
    public $gatve;
    public $miestas ;
    public $namo_numeris ;
    public $mysqli;
    //Sandelis konstruktorius.
    function __construct($mysqli, $pavadinimas = '', $gatve = '', $miestas  = '', $namo_numeris  = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
        $this->gatve = $gatve;
        $this->miestas  = $miestas ;
        $this->namo_numeris  = $namo_numeris ;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Sandelis WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->pavadinimas = $row['pavadinimas'];
            $this->gatve  = $row['gatve '];
            $this->miestas  = $row['miestas '];
            $this->namo_numeris  = $row['namo_numeris '];
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
        $query = "SELECT * FROM Sandelis".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Sandelis($row['pavadinimas'], $row['gatve'], $row['miestas '], $row['namo_numeris ']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Sandelis (pavadinimas, gatve, miestas , namo_numeris ) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->pavadinimas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->gatve)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->miestas)."', 
          ".mysqli_real_escape_string($this->mysqli, $this->namo_numeris )."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Sandelis SET 
          pavadinimas='".$this->pavadinimas."',
          gatve='".$this->gatve."',
          miestas ='".$this->miestas ."',
          namo_numeris ='".$this->namo_numeris ."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Sandelis WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
