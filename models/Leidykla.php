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
}
