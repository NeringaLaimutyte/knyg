<?php
class Knygu_sarasas{
    public $id;
    public $data;
    public $fk_Leidykla;
    public $fk_Sandelis;
    //Knygu_sarasas konstruktorius.
    function __construct($data = '', $fk_Leidykla = 0, $fk_Sandelis = 0) {
        $this->data = $data;
        $this->fk_Leidykla = $fk_Leidykla;
        $this->fk_Sandelis = $fk_Sandelis;
    }
}
