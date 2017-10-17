<?php

namespace CDC\Loja\FluxoDeCaixa;

use ArrayObject;

class Fatura
{
    private $cliente;
    private $valor;
    private $pagamentos;
    private $pago;
    
    public function __construct(string $cliente, float $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->pagamentos = new ArrayObject();
    }

    public function getCliente(): string
    {
        return $this->cliente;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function getPagamentos(): ArrayObject
    {
        return $this->pagamentos;
    }

    public function setPago(bool $pago)
    {
        $this->pago = $pago;
    }

    public function isPago(): bool
    {
        return $this->pago;
    }
}
