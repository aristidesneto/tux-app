<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';

$pdo->query('TRUNCATE TABLE contacts');
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
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-success">
                    Puts!!! Seus dados já eram.
                    <a href="index.php" class="btn btn-success">Voltar</a>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>