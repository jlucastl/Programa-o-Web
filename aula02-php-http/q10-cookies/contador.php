<?php
$visitas = isset($_COOKIE['visitas']) ? (int) $_COOKIE['visitas'] : 0;
$visitas++;

setcookie('visitas', (string) $visitas, [
    'expires' => time() + 3600,
    'path' => '/q10-cookies/',
    'samesite' => 'Lax',
]);

header('Content-Type: text/html; charset=UTF-8');
echo "Você visitou esta página {$visitas} vez(es).";
