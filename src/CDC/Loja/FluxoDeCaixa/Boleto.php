<?php

namespace CDC\Loja\FluxoDeCaixa;

class Boleto
{
    private $valor;
    
    public function __construct(float $valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }
}
