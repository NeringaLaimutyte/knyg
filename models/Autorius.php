<?php
class Autorius{
    public $id;
    public $vardas;
    public $pavarde;
    public $biografija ;
    public $namo_numeris ;
    public $mysqli;
    //Autorius konstruktorius.
    function __construct($mysqli, $vardas = '', $pavarde = '', $biografija  = '') {
        $this->mysqli = $mysqli;
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->biografija  = $biografija;
    }
}
