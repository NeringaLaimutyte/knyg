<?php
class Uzsakymai{
    public $id;
    public $kiekis;
    public $fk_Knyga;
    public $fk_Knygu_sarasas ;
    public $namo_numeris ;
    public $mysqli;
    //Uzsakymas konstruktorius.
    function __construct($mysqli, $kiekis = '', $fk_Knyga = '', $fk_Knygu_sarasas  = '') {
        $this->mysqli = $mysqli;
        $this->kiekis = $kiekis;
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_Knygu_sarasas  = $fk_Knygu_sarasas;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Uzsakymas WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->kiekis = $row['kiekis'];
            $this->fk_Knyga  = $row['fk_Knyga '];
            $this->fk_Knygu_sarasas  = $row['fk_Knygu_sarasas '];
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
        $query = "SELECT * FROM Uzsakymas".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Uzsakymas($row['kiekis'], $row['fk_Knyga'], $row['fk_Knygu_sarasas ']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Uzsakymas (kiekis, fk_Knyga, fk_Knygu_sarasas , namo_numeris ) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->kiekis)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->fk_Knyga)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->fk_Knygu_sarasas)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Uzsakymas SET 
          kiekis='".$this->kiekis."',
          fk_Knyga='".$this->fk_Knyga."',
          fk_Knygu_sarasas ='".$this->fk_Knygu_sarasas ."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Uzsakymas WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
