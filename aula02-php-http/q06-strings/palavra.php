<?php
$palavra = $_GET['palavra'] ?? "Ceará";

$tamanho = mb_strlen($palavra);
$classificacao = $tamanho <= 5 ? "Palavra curta" : "Palavra longa";
?>
<p>Palavra: <?= $palavra ?></p>
<p>strlen: <?= strlen($palavra) ?></p>
<p>mb_strlen: <?= $tamanho ?></p>
<p>strtoupper: <?= strtoupper($palavra) ?></p>
<p>mb_strtoupper: <?= mb_strtoupper($palavra) ?></p>
<p>Classificação: <?= $classificacao ?></p>