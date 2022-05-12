<?php

require __DIR__.'/vendor/autoload.php';
use \App\Files\CSV;


    if(isset($_POST['upload']) && $_POST['upload'] == 'Upload CSV') {
        $upload_dir = getcwd().DIRECTORY_SEPARATOR.'/files';
        if($_FILES['csv']['error'] == UPLOAD_ERR_OK){
            $tmp_name = $_FILES['csv']['tmp_name'];
            $name = basename($_FILES['csv']['name']);
            $csvfile = $upload_dir.'/'.$name;
            move_uploaded_file($tmp_name, $csvfile);
            echo "Finalizado";

            $dados = $_FILES;

            $sucesso = CSV::criarArquivo(__DIR__ . '/files/arquivo-escrita.csv', $dados, ';');

            var_dump($sucesso);
        }
    }





?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Upload Arquivos CSV</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
        <input  type="file" name="csv"/>
        <input type="submit" name="upload" value="Upload CSV"/>
    </form>
</body>
</html>