<?php
require __DIR__.'/vendor/autoload.php';
use \App\Files\CSV;

$chamar_funcao = '';
$diretorio = '';
if(isset($_POST['upload']) && $_POST['upload'] == 'Upload CSV') {
    $upload_dir = getcwd().DIRECTORY_SEPARATOR.'/files/uploads/';
    if($_FILES['csv']['error'] == UPLOAD_ERR_OK){
        $tmp_name = $_FILES['csv']['tmp_name'];
        $name = strval(time())." ".basename($_FILES['csv']['name']);
        $csvfile = $upload_dir.'/'.$name;
        move_uploaded_file($tmp_name, $csvfile);
        echo "Finalizado";

if($_POST['upload_directory'] == 'cadastro_de_contribuintes') {
    $diretorio = './files/uploads/cadastro_de_contribuintes/';
}



        $chamar_funcao = CSV::uploadDeArquivo($csvfile, $diretorio);

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
        <input type="hidden" name="MAX_FILE_SIZE" value=""/>
        <input  type="file" name="csv"/>
            <input type="radio" name="upload_directory" value="cadastro_de_contribuintes">
                <label for="cadastro_de_contribuintes">Cadastro de Contribuintes</label><br>

            <input type="radio" name="upload_directory" value="guia_boletos_cancelados">
                <label for="guia_boletos_cancelados">Guia Boletos Cancelados</label><br>

            <input type="radio" name="upload_directory" value="guia_boletos_emitidos">
                <label for="guia_boletos_emitidos">Guia Boletos Emitidos</label>

            <input type="radio" name="upload_directory" value="nfse_emitidas">
                <label for="nfse_emitidas">NFSe Emitidas</label>

        <input type="submit" name="upload" value="Upload CSV"/>
    </form>
    <div>
        <?php
//            off
        ?>
    </div>
</body>
</html>