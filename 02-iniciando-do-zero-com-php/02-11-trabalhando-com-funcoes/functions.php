<?php

//Função com argumentos obrigatórios.
function functionName($arg1, $arg2, $arg3)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

//Função com argumentos opcionais, o segundo é "setado" como true como um valor default
//Já o terceiro é "setado" como null.
function optionArgs($arg1, $arg2 = true, $arg3 = null)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

// Static Arguments.
// A variavel sendo estatica vai sendo sempre atulizada ao inves de sempre ser reescrita conforme a função vai
// sendo chamada.
function payTotal($price)
{
    static $total;
    $total += $price;

    return "<p>O total a pagar é R$ " . number_format($total, 2, ",", ".") . "</p>";
}

// Dinamic arguments.
// Isso é usado quando o numero de argumentos a ser passado é muito grande ou a função vai receber diferentes numeros de
// argumentos conforme vai sendo chamada.
function myTeam()
{
    $teamNames = func_get_args();
    $teamCount = func_num_args();
    return ["members" => $teamNames, "count" => $teamCount];
}