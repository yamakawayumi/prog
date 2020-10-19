<?php
echo 'aaaa';
if(isset($_FILES["upfile"])&& $_FILES["upfile"]["error"]==0{
    $file_name = $_FILES["upfile"]["name"];
    $tmp_path = $_FILES["upfile"]["tmp_name"];//一時保存場所
    $file_dir_path = "upload/";
    if(is_uploaded_file($tmp_path)){
        if(move_uploaded_file($tmp_path,$file_dir_path.$file_name)){//upload/に移動する
            chmod(file_dir_path.$file_name,0644);
            $img = '<img src"'.$file_dir_path.$file_name.'">';
        }
    }
}else{
    
}






?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
<?php
   echo $img;
   ?>




</body>
</html>