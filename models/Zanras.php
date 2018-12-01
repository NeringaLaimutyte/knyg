<?php
class Zanras{
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
}
