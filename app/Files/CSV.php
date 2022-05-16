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

    public static function exibirBasedeDados($arquivo, $cabecalho = true, $delimitador = ';') {
        if(!file($arquivo)){
            die("Arquivo não encontrado\n");
        }
        $dados = [];

        $csv = fopen($arquivo, "r");

        $cabecalhoDados = $cabecalho ? fgetcsv($csv, 0, $delimitador) : [];

        while($linha = fgetcsv($csv, 0, $delimitador)){
            $dados[] = $cabecalho ? array_combine($cabecalhoDados, $linha) : $linha;
        }
        return print_r($dados);

        fclose($csv);
    }


    public static function exibirBase_CadastroContribuintes() {
        echo "<table border='1'>";
        $start_row = 1;
        if(($csv_file = fopen('./files/uploads/cadastro_de_contribuintes/base_de_dados.csv', 'r')) !== FALSE) {
            while(($read_data = fgetcsv($csv_file, 0, ';')) !== FALSE) {
                $column_count = count($read_data);
                echo '<tr>';

                $start_row ++;
                for ($c = 0; $c < $column_count; $c++) {
                    echo '<td>'.$read_data[$c] . '</td>';
                }
                echo '</tr>';
            }
            fclose($csv_file);
        }

        echo '</table>';
    }
}

