<?php
class Autoriai{
    public $id;
    public $fk_Knyga;
    public $fk_Autorius;
    public $mysqli;
    //Autorius konstruktorius.
    function __construct($mysqli, $fk_Knyga = '', $fk_Autorius = '') {
        $this->mysqli = $mysqli;
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_Autorius = $fk_Autorius;
    }
}
