<?php

$numero = -5; //altere aqui para testar o código!

echo "Número: $numero\n";


if ($numero == 0) {
    echo "<p>O número é zero (par).</p>";
} else {
    $sinal = ($numero > 0) ? "positivo" : "negativo";
    $paridade = ($numero % 2 == 0) ? "par" : "ímpar";
    echo "<p>O número é $sinal e $paridade.</p>";
}
?>