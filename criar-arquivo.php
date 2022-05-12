<?php

require __DIR__.'/vendor/autoload.php';

use \App\Files\CSV;

$dados = [
    [
        'ID',
        'Nome',
        'Descricao'
    ],

    [ 422,
        'Produto teste',
        'Produto de teste da integracao'

    ],

    [ 212,
        'Produto de Amostra',
        'Produto de Amostra da integracao'

    ],

    [ 622,
        'Produto Dev',
        'Produto de Dev da integracao'

    ]
];

$sucesso = CSV::criarArquivo(__DIR__ . '/files/arquivo-escrita.csv', $dados, ';');

var_dump($sucesso);