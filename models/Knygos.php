<?php
class Knygos{
    public $id;
    public $pavadinimas;
    public $isleidimo_metai;
    public $kalba;
    public $paveikslelio_nuoroda;
    public $aprasymas;
    public $puslapiu_skaicius;
    public $ISBN_kodas;
    public $virselio_tipas;
    public $recenzija;
    public $mysqli;
    //Naujienos konstruktorius.
    function __construct($mysqli, $pavadinimas = '', $isleidimo_metai = '', $kalba = '', $paveikslelio_nuoroda = '', 
            $aprasymas = '', $puslapiu_skaicius = '', $ISBN_kodas = '', $virselio_tipas = '', $recenzija = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
        $this->isleidimo_metai = $isleidimo_metai;
        $this->kalba = $kalba;
        $this->paveikslelio_nuoroda = $paveikslelio_nuoroda;
        $this->aprasymas = $aprasymas;
        $this->puslapiu_skaicius = $puslapiu_skaicius;
        $this->ISBN_kodas = $ISBN_kodas;
        $this->virselio_tipas = $virselio_tipas;
        $this->recenzija = $recenzija;
    }
    //Paima 1 elementą iš duombazės pagal jo ID
    public function select($id){
        $query =  "SELECT * FROM Knyga WHERE id = ".$id;
        if($result = mysqli_query($this->mysqli, $query)) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $this->id = $row['id'];
            $this->pavadinimas = $row['pavadinimas'];
            $this->isleidimo_metai = $row['isleidimo_metai'];
            $this->kalba = $row['kalba'];
            $this->paveikslelio_nuoroda = $row['paveikslelio_nuoroda'];
            $this->aprasymas = $row['aprasymas'];
            $this->puslapiu_skaicius = $row['puslapiu_skaicius'];
            $this->ISBN_kodas = $row['ISBN_kodas'];
            $this->virselio_tipas = $row['virselio_tipas'];
            $this->recenzija = $row['recenzija'];
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
        $query = "SELECT * FROM Knyga".$where;
        if($result = mysqli_query($this->mysqli, $query)) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $temp = new Naujienos($row['pavadinimas'], $row['isleidimo_metai'], $row['kalba'], $row['paveikslelio_nuoroda'], 
                        $row['aprasymas'], $row['puslapiu_skaicius'], $row['ISBN_kodas'], $row['virselio_tipas'], $row['recenzija']);
                $temp->id = $row['id'];
                $result[] = $temp;
            }
        }
        return $result;
    }
    //Įterpia elementą į duombazę
    public function insert(){
        $query =  "INSERT INTO Knyga (pavadinimas, isleidimo_metai, kalba, paveikslelio_nuoroda, aprasymas, puslapiu_skaicius, ISBN_kodas, virselio_tipas, recenzija) VALUE (
          '".mysqli_real_escape_string($this->mysqli, $this->pavadinimas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->isleidimo_metai)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->kalba)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->paveikslelio_nuoroda)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->aprasymas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->puslapiu_skaicius)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->ISBN_kodas)."', 
          '".mysqli_real_escape_string($this->mysqli, $this->virselio_tipas)."', 
          ".mysqli_real_escape_string($this->mysqli, $this->recenzija)."
          
        )";
        mysqli_query($this->mysqli, $query);
    }
    //Atnaujina elementą duombazėje
    public function update(){
        $query = "UPDATE Knyga SET 
          pavadinimas='".$this->pavadinimas."',
          isleidimo_metai='".$this->isleidimo_metai."',
          kalba='".$this->kalba."',
          kalba='".$this->paveikslelio_nuoroda."',
          kalba='".$this->aprasymas."',
          kalba='".$this->puslapiu_skaicius."',
          kalba='".$this->ISBN_kodas."',
          kalba='".$this->virselio_tipas."',
          paveikslelio_nuoroda='".$this->recenzija."'
          WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
    //Ištrina elementą iš duombazės
    public function remove(){
        $query = "DELETE FROM Knyga WHERE id = ".$this->id;
        mysqli_query($this->mysqli, $query);
    }
}
