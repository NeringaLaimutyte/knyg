<?php
class Autoriai{
    public $id;
    public $fk_Knyga;
    public $fk_Autorius;
    //Autorius konstruktorius.
    function __construct($fk_Knyga = 0, $fk_Autorius = 0) {
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_Autorius = $fk_Autorius;
    }
}
