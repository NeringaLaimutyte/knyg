<?php
class Naujienos{
    public $id;
    public $pavadinimas;
    public $tekstas;
    public $parasymo_data;
    public $publikavimo_data;
    //Naujienos konstruktorius.
    function __construct($pavadinimas = '', $tekstas = '', $parasymo_data = '', $publikavimo_data = '') {
        $this->pavadinimas = $pavadinimas;
        $this->tekstas = $tekstas;
        $this->parasymo_data = $parasymo_data;
        $this->publikavimo_data = $publikavimo_data;
    }
}