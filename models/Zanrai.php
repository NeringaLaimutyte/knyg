<?php
class Zanrai{
    public $id;
    public $fk_Knyga;
    public $fk_zanras;
    public $mysqli;
    //zanras konstruktorius.
    function __construct($fk_Knyga = 0, $fk_zanras = 0) {
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_zanras = $fk_zanras;
    }
}
