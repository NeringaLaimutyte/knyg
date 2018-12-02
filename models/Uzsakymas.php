<?php
class Uzsakymas{
    public $id;
    public $kiekis;
    public $fk_Knyga;
    public $fk_Knygu_sarasas;
    //Uzsakymas konstruktorius.
    function __construct($kiekis = 0, $fk_Knyga = 0, $fk_Knygu_sarasas  = 0) {
        $this->kiekis = $kiekis;
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_Knygu_sarasas  = $fk_Knygu_sarasas;
    }
}
