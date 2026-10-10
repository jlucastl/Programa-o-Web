<?php
const MEDIA_APROVACAO = 7;

$n1 = 6.5;
$n2 = 8.0;
$media = ($n1 + $n2) / 2;
$situacao = $media >= MEDIA_APROVACAO ? "Aprovado" : "Em recuperação";
?>
<p>Notas: <?= $n1 ?> e <?= $n2 ?></p>
<p>Média: <?= $media ?></p>
<p>Situação: <?= $situacao ?></p>
