<?php

namespace App\Files;

class CSV
{
    /*
     * Metodo responsavel por ler um arquivo CSV e retornar um array de dados.
     */
    public static function lerArquivo($arquivo, $cabecalho = true, $delimitador = ',') {
        echo "<pre>";
        print_r($arquivo);
        echo "</pre>"; exit;
    }
}