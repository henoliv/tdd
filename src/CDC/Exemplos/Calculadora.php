<?php

namespace CDC\Exemplos;

class Calculadora
{
    function soma()
    {
        return array_sum(func_get_args());
    }
}
