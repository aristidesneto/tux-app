<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

$pdo->query('TRUNCATE TABLE contacts');

header('Refresh: 2; URL=index.php');
echo "Dados removidos com sucesso... redirecionando!";