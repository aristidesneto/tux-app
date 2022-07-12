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

$stmt = $pdo->query('SELECT * FROM contacts ORDER BY id');
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $_ENV['APP_NAME'] ?? 'App Demo' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Sistema de Cadastro Inteligente</h1>
                <h4>Versão: <?= get_version() ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12 -left">
                <a class="btn btn-success" href="create.php" >Cadastrar</a>
                <a class="btn btn-danger" href="delete.php">Limpar</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $contact) : ?>
                            <tr>
                                <td><?= $contact['id'] ?></td>
                                <td><?= $contact['name'] ?></td>
                                <td><?= $contact['email'] ?></td>
                                <td><?= $contact['phone'] ?></td>
                                <td><?= $contact['title'] ?></td>
                                <td><?= $contact['created'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>