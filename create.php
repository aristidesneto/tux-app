<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

$database = "CREATE TABLE IF NOT EXISTS `contacts` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone` varchar(255) NOT NULL,
        `title` varchar(255) NOT NULL,
        `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;";

$pdo->query($database);

$contacts = "INSERT INTO `contacts` (`name`, `email`, `phone`, `title`, `created`) VALUES
('John Doe', 'johndoe@example.com', '2026550143', 'Lawyer', '2019-05-08 17:32:00'),
('David Deacon', 'daviddeacon@example.com', '2025550121', 'Employee', '2019-05-08 17:28:44'),
('Will Dan', 'willdan@example.com', '2025550121', 'Employee', '2019-05-08 17:28:44'),
('Sam White', 'samwhite@example.com', '2004550121', 'Employee', '2019-05-08 17:29:27'),
('Colin Chaplin', 'colinchaplin@example.com', '2022550178', 'Supervisor', '2019-05-08 17:29:27');";

$pdo->query($contacts);

echo "Dados inseridos com sucesso... redirecionando!";
header('Refresh: 2; URL=index.php');
