<?php

require __DIR__.'/vendor/autoload.php';

use \App\Files\CSV;

$dados = CSV::lerArquivo();
