<?php
class Vartotojas{
    public $id;
    public $vardas;
    public $pavarde;
    public $el_pastas;
    public $adresas;
    public $role;
    public $isleista_pinigu;
    public $nupirkta_knygu;
    public $bonus_pinigai;
    public $nuolaida;
    public $bonus_narys;
    //Naujienos konstruktorius.
    function __construct($vardas = '', $pavarde = '', $el_pastas = '', $adresas = '', $role = 0, $isleista_pinigu = 0,
                         $nupirkta_knygu = 0, $bonus_pinigai = 0, $nuolaida = 0, $bonus_narys = 1) {
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->el_pastas = $el_pastas;
        $this->adresas = $adresas;
        $this->role = $role;
        $this->isleista_pinigu = $isleista_pinigu;
        $this->nupirkta_knygu = $nupirkta_knygu;
        $this->bonus_pinigai = $bonus_pinigai;
        $this->nuolaida = $nuolaida;
        $this->bonus_narys = $bonus_narys;
    }
    public function getRoles(){
        $result = [false, false, false, false];
        $bool = [false, true];
        $temp = $this->role;
        for($i = 0; $i < 4; $i++){
            $result[3-$i] = $bool[(int) floor($temp/pow(2, 3-$i))];
            $temp = $temp%pow(2, 3-$i);
        }
        return $result;
    }
}