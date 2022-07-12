<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

try {
    $pdo->query('SELECT * FROM contacts');
} catch (\Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
}
