<?php
$nome = $_GET['nome'] ?? 'Visitante';

echo "Olá, " . htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
