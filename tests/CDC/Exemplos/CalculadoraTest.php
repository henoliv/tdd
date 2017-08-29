<?php

namespace CDC\Exemplos;

use CDC\Loja\Test\TestCase;
use CDC\Exemplos\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testDeveSomarDoisNumerosPositivos()
    {
        return $this->assertEquals(4, (new Calculadora())->soma(2, 2));
    }

    public function testDeveSomarPositivoComNegativo()
    {
        return $this->assertEquals(0, (new Calculadora())->soma(2, -2));
    }

    public function testDeveSomarNegativoComPositivo()
    {
        return $this->assertEquals(0, (new Calculadora())->soma(-2, 2));
    }

    public function testDeveSomarDoisNumerosNegativos()
    {
        return $this->assertEquals(-4, (new Calculadora())->soma(-2, -2));
    }

    public function testDeveSomarComZero()
    {
        return $this->assertEquals(2, (new Calculadora())->soma(2, 0));
        return $this->assertEquals(2, (new Calculadora())->soma(0, 2));
    }
}
