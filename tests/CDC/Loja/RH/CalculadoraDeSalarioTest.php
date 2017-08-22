<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use CDC\Loja\RH\CalculadoraDeSalario;
use CDC\Loja\RH\Funcionario;
use CDC\Loja\RH\TabelaCargos;
use PHPUnit_Framework_TestCase as PHPUnit;

class CalculadoraDeSalariotest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "Andre",
            1500.0,
            TabelaCargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(1500.0*0.9, $salario, null, 0.00001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "Andre",
            4000.0,
            TabelaCargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(4000.0*0.8, $salario, null, 0.00001);
    }

    public function testCalculoSalarioDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            "Andre",
            500.0,
            TabelaCargos::DBA
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);

        $this->assertEquals(500.0*0.85, $salario, null, 0.00001);
    }
}
