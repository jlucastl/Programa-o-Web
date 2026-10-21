<?php
header('Content-Type: text/html; charset=UTF-8');
$recebeuCookie = ($_COOKIE['usuario_logado'] ?? '') === 'true';

if ($recebeuCookie) {
    echo 'Dashboard: cookie de exemplo recebido.';
} else {
    echo 'Dashboard: cookie de exemplo não recebido.';
}
