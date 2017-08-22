<?php

namespace CDC\Loja\RH;

class Funcionario
{
    protected $nome;
    protected $salario;
    protected $cargo;

    public function __construct(string $nome, float $salario, int $cargo)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->cargo = $cargo;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSalario()
    {
        return $this->salario;
    }

    public function getCargo()
    {
        return $this->cargo;
    }
}
