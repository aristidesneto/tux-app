<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function create_database($pdo)
{
    $database = "CREATE TABLE IF NOT EXISTS `contacts` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
          `name` varchar(255) NOT NULL,
          `email` varchar(255) NOT NULL,
          `phone` varchar(255) NOT NULL,
          `title` varchar(255) NOT NULL,
          `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;";

    return $pdo->query($database);
}

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

$pdo = pdo_connect_mysql();

echo "Database created: " . create_database($pdo);

$stmt = $pdo->query('SELECT * FROM contacts ORDER BY id');

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($contacts as $contact) {

    echo "<strong>Nome:</strong> {$contact['name']}<br>";
    echo "<strong>E-mail:</strong> {$contact['email']}<br>";
    echo "<strong>Telefone:</strong> {$contact['phone']}<br>";
    echo "<strong>Cargo:</strong> {$contact['title']}<br>";
    echo "<strong>Data:</strong> {$contact['created']}<br>";

    echo "<hr>";

}