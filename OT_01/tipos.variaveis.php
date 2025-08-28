<?php

    $nome = "Ana";
    $idade = 38;
    $saldoBancario = 500;
    $valorCompra = 50.00;
    $saldoAposCompra = $saldoBancario - $valorCompra;

    echo "<p>=== RELATÓRIO FINANCEIRO ===</p><br>";
    echo "<p> Nome: $nome </p>";
    echo "<p>Idade: $idade anos</p>";
    echo "<p>Saldo inicial: R$ " . number_format($saldoBancario, 2, ',', '.') . "</p>";
    echo "<p>Valor da compra: R$ " . number_format($valorCompra, 2, ',', '.') . "</p>";
    echo "<p>Saldo após compra: R$ " . number_format($saldoAposCompra, 2, ',', '.') . "</p>";
    echo "<p>============================"."</p>";


?>