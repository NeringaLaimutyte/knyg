<?php
class Knygu_sandelyje{
    public $id;
    public $kiekis;
    public $fk_Sandelis;
    public $fk_Knyga;
    //Knygu_sandelyje konstruktorius.
    function __construct($kiekis = 0, $fk_Sandelis = 0, $fk_Knyga  = 0) {
        $this->kiekis = $kiekis;
        $this->fk_Sandelis = $fk_Sandelis;
        $this->fk_Knyga  = $fk_Knyga;
    }
}
