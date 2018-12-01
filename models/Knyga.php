<?php
class Knyga{
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
}
