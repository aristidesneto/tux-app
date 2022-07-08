<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

$pdo->query('TRUNCATE TABLE contacts');

echo "Dados removidos com sucesso... redirecionando!";
header('Refresh: 2; URL=index.php');