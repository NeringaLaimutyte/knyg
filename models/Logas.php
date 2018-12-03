<?php
class Logas{
    public $id;
    public $data;
    public $IP;
    public $URL;
    public $laikas;
    public $fk_Vartotojas;
    //Logo konstruktorius.
    function __construct($data = 0, $IP = '0.0.0.0', $URL = '/', $laikas = '', $fk_Vartotojas = 0) {
        $this->data = $data;
        $this->IP = $IP;
        $this->URL = $URL;
        $this->laikas = $laikas;
        $this->fk_Vartotojas = $fk_Vartotojas;
    }
}
