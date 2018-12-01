<?php
class Leidykla{
    public $id;
    public $pavadinimas;
    public $miestas;
    public $el_pasto_adresas;
    public $gatve;
    public $namo_numeris ;
    public $mysqli;
    //Leidykla konstruktorius.
    function __construct($mysqli, $pavadinimas = '', $miestas = '', $el_pasto_adresas = '', $gatve = '', $namo_numeris = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
        $this->miestas = $miestas;
        $this->el_pasto_adresas = $el_pasto_adresas;
        $this->gatve = $gatve;
        $this->namo_numeris = $namo_numeris;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Leidykla WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->pavadinimas = $row['pavadinimas'];
            $this->pavadinimas = $row['miestas'];
            $this->el_pasto_adresas = $row['el_pasto_adresas'];
            $this->gatve = $row['gatve'];
            $this->namo_numeris = $row['namo_numeris'];
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
        $query = "SELECT * FROM Leidykla".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Leidykla($row['pavadinimas'], $row['miestas'], $row['el_pasto_adresas'], $row['gatve'], $row['namo_numeris']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Leidykla (pavadinimas, miestas, el_pasto_adresas, gatve, namo_numeris) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->pavadinimas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->miestas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->el_pasto_adresas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->gatve)."', 
          ".mysqli_real_escape_string($this->mysqli, $this->namo_numeris)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Leidykla SET 
          pavadinimas='".$this->pavadinimas."',
          miestas='".$this->miestas."',
          el_pasto_adresas='".$this->el_pasto_adresas."',
          el_pasto_adresas='".$this->gatve."',
          gatve='".$this->namo_numeris."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Leidykla WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
