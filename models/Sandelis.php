<?php
class Sandelis{
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
}
