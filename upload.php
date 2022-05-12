<?php
require __DIR__.'/vendor/autoload.php';
use \App\Files\CSV;

    $display_table = '';
    if(isset($_POST['upload']) && $_POST['upload'] == 'Upload CSV') {
        $upload_dir = getcwd().DIRECTORY_SEPARATOR.'/files';
        if($_FILES['csv']['error'] == UPLOAD_ERR_OK){
            $tmp_name = $_FILES['csv']['tmp_name'];
            $name = strval(time())." ".basename($_FILES['csv']['name']);
            $csvfile = $upload_dir.'/'.$name;
            move_uploaded_file($tmp_name, $csvfile);
            echo "Finalizado";
            $display_table = CSV::uploadDeArquivo($csvfile);

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
        <input type="submit" name="upload" value="Upload CSV"/>
    </form>
    <div>
        <?php
//            if (strlen($display_table)>0) {
//                echo $display_table;
//            }
        ?>
    </div>
</body>
</html>