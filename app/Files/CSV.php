<?php

namespace App\Files;

class CSV
{
    /*
     * Metodo responsavel por ler um arquivo CSV e retornar um array de dados.
     */
    public static function lerArquivo($arquivo, $cabecalho = true, $delimitador = ';') {
        //verificar se o arquivo existe.
        if (!file_exists($arquivo)) {
            die("Arquivo não encontrado\n");
        }

        // Dados das linhas do arquivo

        $dados = [];

        //Abre o arquivo

        $csv = fopen($arquivo, 'r');

        //Cabecalho dos dados (primeira linha)
        $cabecalhoDados = $cabecalho ? fgetcsv($csv, 0,$delimitador) : [];


        //Itera o arquivo lendo todas as linhas
        while($linha = fgetcsv($csv, 0,$delimitador)){
            $dados[] = $cabecalho ?
                        array_combine($cabecalhoDados, $linha) :
                        $linha;
        }
        //Fecha o Arquivo
        fclose($csv);


        // Retorna os dados processados
        return $dados;
    }

    //Metodo responsavel por incrementar a base de dados
    public static function criarArquivo($arquivo, $dados, $delimitador = ';') {
        //Abrir arquivo para escrita
        $csv = fopen($arquivo, 'a+');

        //Cria o corpo do arquivo CSV

        foreach ($dados as $linha) {
            fputcsv($csv, $linha, $delimitador);
        }

        //Fechar o arquivo
        fclose($csv);

        return true;
    }
}