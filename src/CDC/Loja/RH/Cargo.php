<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\TabelaCargos;

class Cargo
{
    private $cargos = [
        TabelaCargos::DESENVOLVEDOR => "CDC\Loja\RH\DezOuVintePorCento",
        TabelaCargos::DBA => "CDC\Loja\RH\QuinzeOuVinteECincoPorCento",
        TabelaCargos::TESTADOR => "CDC\Loja\RH\QuinzeOuVinteECincoPorCento"
    ];

    private $regra;

    public function __construct($regra)
    {
        if (isset($this->cargos[$regra])) {
            $this->regra = $this->cargos[$regra];
        } else {
            throw new \RuntimeException("Cargo inválido");
        }
    }

    public function getRegra()
    {
        return $this->regra;
    }
}
