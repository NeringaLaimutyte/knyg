<?php
class Naujienos{
    public $id;
    public $pavadinimas;
    public $tekstas;
    public $parasymo_data;
    public $publikavimo_data;
    public $mysqli;
    //Naujienos konstruktorius.
    function __construct($mysqli, $pavadinimas = '', $tekstas = '', $parasymo_data = '', $publikavimo_data = '') {
        $this->mysqli = $mysqli;
        $this->pavadinimas = $pavadinimas;
        $this->tekstas = $tekstas;
        $this->parasymo_data = $parasymo_data;
        $this->publikavimo_data = $publikavimo_data;
    }
}