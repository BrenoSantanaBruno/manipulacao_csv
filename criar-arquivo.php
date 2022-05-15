<?php

require __DIR__.'/vendor/autoload.php';
include 'upload.php';
use \App\Files\CSV;

$dados = $arquivo_uploaded;

$sucesso = CSV::criarArquivo(__DIR__ . '/files/guias_boletos_cancelados.csv', $dados, ';');

var_dump($sucesso);