<?php
class Uzsakymas{
    public $id;
    public $kiekis;
    public $fk_Knyga;
    public $fk_Knygu_sarasas;
    public $mysqli;
    //Uzsakymas konstruktorius.
    function __construct($mysqli, $kiekis = '', $fk_Knyga = '', $fk_Knygu_sarasas  = '') {
        $this->mysqli = $mysqli;
        $this->kiekis = $kiekis;
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_Knygu_sarasas  = $fk_Knygu_sarasas;
    }
}
