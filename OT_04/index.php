<?php
//Função para realizar cálculos
function calcular($num1, $num2, $operacao){
    switch ($operacao){
        case 'soma':
            return $num1 + $num2;
        case 'subtracao':
            return $num1 - $num2;
        case 'multiplicacao':
            return $num1 * $num2;
        case 'divisao':
            return $num2 != 0 ? $num1 / $num2 : "Erro: Divisão por zero";
        default:
            return "Operação inválida!";
    }
}