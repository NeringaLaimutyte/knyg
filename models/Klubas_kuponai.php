<?php
class Kuponas{
    public $id;
	public $kodas;
    public $suma;
    public $galiojimo_data;
    //Naujienos konstruktorius.
    function __construct($suma = 0, $kodas='', $galiojimo_data = '') {
		$this->kodas = $kodas;
        $this->suma = $suma;
        $this->galiojimo_data = $galiojimo_data;
    }
}