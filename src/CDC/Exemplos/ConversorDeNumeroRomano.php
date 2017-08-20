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
        $acumulador = 0;
        $ultimoVizinhoDaDireita = 0;

        for ($i=strlen($numeroEmRomano)-1; $i >=0; $i--) {
            $numeroCorrente = $numeroEmRomano[$i];

            $atual = isset($this->tabela[$numeroCorrente])
            ? $this->tabela[$numeroCorrente]
            : 0;

            $multiplicador = $atual < $ultimoVizinhoDaDireita ? -1 : 1;
        
            $acumulador += ($atual*$multiplicador);

            $ultimoVizinhoDaDireita = $atual;
        }

        return $acumulador;
    }
}
