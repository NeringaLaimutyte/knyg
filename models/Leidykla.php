<?php
class Leidykla{
    public $id;
    public $pavadinimas;
    public $miestas;
    public $el_pasto_adresas;
    public $gatve;
    public $namo_numeris ;
    //Leidykla konstruktorius.
    function __construct($pavadinimas = '', $miestas = '', $el_pasto_adresas = '', $gatve = '', $namo_numeris = '') {
        $this->pavadinimas = $pavadinimas;
        $this->miestas = $miestas;
        $this->el_pasto_adresas = $el_pasto_adresas;
        $this->gatve = $gatve;
        $this->namo_numeris = $namo_numeris;
    }
}
