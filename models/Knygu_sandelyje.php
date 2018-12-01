<?php
class Knygu_sandelyje{
    public $id;
    public $kiekis;
    public $fk_Sandelis;
    public $fk_Knyga;
    public $mysqli;
    //Knygu_sandelyje konstruktorius.
    function __construct($mysqli, $kiekis = '', $fk_Sandelis = '', $fk_Knyga  = '') {
        $this->mysqli = $mysqli;
        $this->kiekis = $kiekis;
        $this->fk_Sandelis = $fk_Sandelis;
        $this->fk_Knyga  = $fk_Knyga;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Knygu_sandelyje WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->kiekis = $row['kiekis'];
            $this->fk_Sandelis  = $row['fk_Sandelis '];
            $this->fk_Knyga  = $row['fk_Knyga '];
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
        $query = "SELECT * FROM Knygu_sandelyje".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Knygu_sandelyje($row['kiekis'], $row['fk_Sandelis'], $row['fk_Knyga ']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Knygu_sandelyje (kiekis, fk_Sandelis, fk_Knyga , namo_numeris ) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->kiekis)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->fk_Sandelis)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->fk_Knyga)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Knygu_sandelyje SET 
          kiekis='".$this->kiekis."',
          fk_Sandelis='".$this->fk_Sandelis."',
          fk_Knyga ='".$this->fk_Knyga ."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Knygu_sandelyje WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
