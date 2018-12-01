<?php
class Naujienos{
    public $id;
    public $pavadinimas;
    public $tekstas;
    public $parasymo_data;
    public $publikavimo_data;
    public $mysqli;
    function __construct($mysqli, $pavadinimas = '', $tekstas = '', $parasymo_data = '', $publikavimo_data = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
        $this->tekstas = $tekstas;
        $this->parasymo_data = $parasymo_data;
        $this->publikavimo_data = $publikavimo_data;
    }
    public function select($id){
        $query =  "SELECT * FROM Naujienos WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->pavadinimas = $row['pavadinimas'];
            $this->parasymo_data = $row['parasymo_data'];
            $this->publikavimo_data = $row['publikavimo_data'];
        }
    }
    public function selectMany($where = null){
        if($where == null){
            $where = "";
        }else{
            $where = " WHERE ".$where;
        }
        $result = array();
        $query = "SELECT * FROM Naujienos".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Naujienos($row['pavadinimas'], $row['tekstas'], $row['parasymo_data'], $row['publikavimo_data']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    public function insert(){
        $query =  "INSERT INTO Naujienos (pavadinimas, tekstas, parasymo_data, publikavimo_data) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->pavadinimas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->tekstas)."', 
          NOW(), 
          ".mysqli_real_escape_string($this->mysqli, $this->publikavimo_data)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    public function update(){
        $query = "UPDATE Naujienos SET 
          pavadinimas='".$this->pavadinimas."',
          tekstas='".$this->tekstas."',
          parasymo_data='".$this->parasymo_data."',
          publikavimo_data='".$this->publikavimo_data."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    public function remove(){
        $query = "DELETE FROM Naujienos WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}