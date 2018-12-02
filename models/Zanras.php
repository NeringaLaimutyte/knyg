<?php
class Zanras{
    public $id;
    public $pavadinimas;
    //zanras konstruktorius.
    function __construct($pavadinimas = '') {
        $this->pavadinimas = $pavadinimas;
    }
}
