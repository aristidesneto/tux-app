<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function pdo_connect_mysql()
{
    $DATABASE_HOST = $_ENV['DB_HOST'];
    $DATABASE_PORT = $_ENV['DB_PORT'];
    $DATABASE_USER = $_ENV['DB_USER'];
    $DATABASE_PASS = $_ENV['DB_PASS'];
    $DATABASE_NAME = $_ENV['DB_NAME'];

    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';port=' . $DATABASE_PORT . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

function get_version()
{
    return trim(exec('git log --pretty="%h" -n1 HEAD'));
}

$pdo = pdo_connect_mysql();
