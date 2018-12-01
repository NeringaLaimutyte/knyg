<?php
class Knygu_sarasas{
    public $id;
    public $data;
    public $fk_Leidykla;
    public $fk_Sandelis;
    public $mysqli;
    //Knygu_sarasas konstruktorius.
    function __construct($mysqli, $data = '', $fk_Leidykla = '', $fk_Sandelis = '') {
        $this->mysqli = $mysqli;
        $this->data = $data;
        $this->fk_Leidykla = $fk_Leidykla;
        $this->fk_Sandelis = $fk_Sandelis;
    }
}
