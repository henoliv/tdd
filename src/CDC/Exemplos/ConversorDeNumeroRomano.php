<?php

namespace CDC\Exemplos;

class ConversorDeNumeroRomano
{
    
    protected $tabela = [
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000,
    ];

    public function converte(string $numeroEmRomano):int
    {
        return isset($this->tabela[$numeroEmRomano])
            ? $this->tabela[$numeroEmRomano]
            : 0;
    }
}
