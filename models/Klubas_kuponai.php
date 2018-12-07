<?php
class Kuponas{
    public $id;
    public $suma;
    public $galiojimo_data;
    //Naujienos konstruktorius.
    function __construct($suma = 0, $galiojimo_data = '') {
        $this->suma = $suma;
        $this->galiojimo_data = $galiojimo_data;
    }
}