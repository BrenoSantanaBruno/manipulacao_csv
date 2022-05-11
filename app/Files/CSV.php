<?php

namespace App\Files;

class CSV
{
    /*
     * Metodo responsavel por ler um arquivo CSV e retornar um array de dados.
     */
    public static function lerArquivo($arquivo, $cabecalho = true, $delimitador = ',') {
        //verificar se o arquivo existe.
        if (!file_exists($arquivo)) {
            die("Arquivo não encontrado\n");
        }

        // Dados das linhas do arquivo

        $dados = [];

        //Abre o arquivo

        $csv = fopen($arquivo, 'r');

        //Itera o arquivo lendo todas as linhas
        while($linha = fgetcsv($csv, 0,$delimitador)){
            echo "<pre>";
            print_r($linha);
            echo "</pre>";
        }
    }
}