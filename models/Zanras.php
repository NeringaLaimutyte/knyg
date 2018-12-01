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
}
