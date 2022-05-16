<?php

namespace App\Files;

class CSV
{
    //Funcao responsavel por escrever de forma incremental um arquivo geral atraves de cada upload
    public static function uploadDeArquivo($csv_file, $diretorio) {
        $novoArquivo = fopen($diretorio."/base_de_dados.csv", "a+");
        $file = fopen($csv_file, 'a+');
        $header_arr = fgetcsv($file);
        $lines = array();

        foreach ($header_arr as $k=>$v) {
            fputcsv($novoArquivo, (array)$v, ";" );
        }

        while(!feof($file) && ($line = fgetcsv($file)) !== false) {
            $lines[] = $line;
            foreach ($line as $k=>$v) {
                fputcsv($novoArquivo, (array)$v, ";");
            }
        }



        //Fechar arquivo
        fclose($file);
    }

    public static function exibirBasedeDados($arquivo, ) {

    }
}