<?php
class Sandelis{
    public $id;
    public $pavadinimas;
    public $gatve;
    public $miestas ;
    public $namo_numeris ;
    //Sandelis konstruktorius.
    function __construct($pavadinimas = '', $gatve = '', $miestas  = '', $namo_numeris  = '') {
        $this->pavadinimas = $pavadinimas;
        $this->gatve = $gatve;
        $this->miestas  = $miestas ;
        $this->namo_numeris  = $namo_numeris ;
    }
}
