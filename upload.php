<?php
    if(isset($_POST['upload']) && $_POST['upload'] == 'Upload CSV' ) {
        $upload_dir = getcwd().DIRECTORY_SEPARATOR.'/uploads';
        if($_FILES['csv']['error'] == UPLOAD_ERR_OK){
            $tmp_name=$_FILES['csv']['tmp_name'];
            $name = basename($_FILES['csv']['name']);
            move_uploaded_file($tmp_name, $upload_dir.'/'.$name);
            echo "Finalizado";
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
    <form action="" method="post" enctype="multipart/form-data">
        <input  type="file" name="csv"/>
        <input type="submit" name="upload" value="Upload CSV"/>
    </form>
</body>
</html>