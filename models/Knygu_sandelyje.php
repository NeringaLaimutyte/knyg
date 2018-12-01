<?php
class Knygu_sandelyje{
    public $id;
    public $kiekis;
    public $fk_Sandelis;
    public $fk_Knyga;
    public $mysqli;
    //Knygu_sandelyje konstruktorius.
    function __construct($mysqli, $kiekis = '', $fk_Sandelis = '', $fk_Knyga  = '') {
        $this->mysqli = $mysqli;
        $this->kiekis = $kiekis;
        $this->fk_Sandelis = $fk_Sandelis;
        $this->fk_Knyga  = $fk_Knyga;
    }
}
