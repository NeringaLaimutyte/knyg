<?php
class Naujienos{
    public $pavadinimas;
    public $tekstas;
    public $data;
    public $publikuota;
    public $auto;
    function __construct($pavadinimas, $tekstas, $data, $publikuota, $auto) {
        $this->pavadinimas = $pavadinimas;
        $this->$tekstas = $tekstas;
        $this->$data = $data;
        $this->$publikuota = $publikuota;
        $this->$auto = $auto;
    }
    public function getNaujienos($where){

    }
    public function getNaujiena($where){

    }
}
?>