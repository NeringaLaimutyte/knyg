<?php
class Zanrai{
    public $id;
    public $fk_Knyga;
    public $fk_zanras;
    public $mysqli;
    //zanras konstruktorius.
    function __construct($mysqli, $fk_Knyga = '', $fk_zanras = '') {
        $this->mysqli = $mysqli;
        $this->fk_Knyga = $fk_Knyga;
        $this->fk_zanras = $fk_zanras;
    }
}
