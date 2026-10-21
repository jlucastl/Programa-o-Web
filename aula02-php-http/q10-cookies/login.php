<?php
setcookie('usuario_logado', 'true', [
    'expires' => time() + 3600,
    'path' => '/q10-cookies/',
    'samesite' => 'Lax',
]);
header('Location: dashboard.php', true, 302);
exit;
