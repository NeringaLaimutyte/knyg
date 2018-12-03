<?php
class Kaina{
    public $id;
    public $kaina;
    public $pastaba;
    public $PrData;
    public $PaData;
    public $fk_Knyga;
    //zanras konstruktorius.
    function __construct($kaina = 0, $pastaba = '', $PrData = 0, $PaData = 0, $fk_Knyga = 0) {
        $this->kaina = $kaina;
        $this->pastaba = $pastaba;
        $this->PrData = $PrData;
        $this->PaData = $PaData;
        $this->fk_Knyga = $fk_Knyga;
    }
}
