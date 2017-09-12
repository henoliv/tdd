<?php

namespace CDC\Loja\RH;

use CDC\Loja\RH\Cargo;
use CDC\Loja\RH\Funcionario;

class CalculadoraDeSalario
{
    function calculaSalario(Funcionario $funcionario)
    {
        $cargo = new Cargo($funcionario->getCargo());
        
        $classeDeCalculo = $cargo->getRegra();

        return (new $classeDeCalculo)->calcula($funcionario);
    }
}
