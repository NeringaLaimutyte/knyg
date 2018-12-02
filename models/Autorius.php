<?php
class Autorius{
    public $id;
    public $vardas;
    public $pavarde;
    public $biografija ;
    //Autorius konstruktorius.
    function __construct($vardas = '', $pavarde = '', $biografija  = '') {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->biografija  = $biografija;
    }
}
