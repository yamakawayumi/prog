<?php
//$_POSTが存在するか？（POST送信されていればnot Empty です）
if(!empty($_POST)) {
    //************************************************************************************
    // filter_inputとは？
    // DocumentURL=[http://php.net/manual/ja/function.filter-input.php]
    //************************************************************************************
    echo 'ss';
    //1．POST値取得（POST数に合わせて増やす）
    $name = $_POST["name"];
    $lat =  $_POST["lat"];
    $lon =  $_POST["lon"];
    echo $name;
    echo $lat;
    echo $lon;
//    exit();
    
    
    
    //2. 未入力チェック
    if (!$lat ) {
        $error['lat'] = '緯度の値がありません';
    }
    if (!$lon ) {
        $error['lon'] = '経度の値がありません';
    }

    
    
    
    
}else{
    echo "Error:1";
    exit();
}

echo 'うｐ';
//************************************************************************************
// FileUpload
//************************************************************************************
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    $file_name = $_FILES["upfile"]["name"];  //"1.jpg"ファイル名取得
   $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
   $file_dir_path = "upload/";  //画像ファイル保管先
    //-----ユニークファイル名-----
    //拡張子取得
    $array = pathinfo($file_name);
    $hased_file_name = hash('sha256', date( "Y年m月d日 H時i分s秒" ) .$file_name) .'.'.$array['extension'];//ハッシュ関数を使う

   
   $img="";
   // FileUpload [--Start--]
   if ( is_uploaded_file( $tmp_path ) ) {
       if ( move_uploaded_file( $tmp_path, $file_dir_path . $hased_file_name ) ) {
               chmod( $file_dir_path . $hased_file_name, 0644 );
               //echo $file_name . "をアップロードしました。";
               $img = '<img src="'. $file_dir_path . $hased_file_name . '" >';
           echo $img;
       } else {
               $img = "Error:アップロードできませんでした。";
       }
   }
 // FileUpload [--End--]
 }else{
     $img = "画像が送信されていません";
 }



echo 'ssf';
//************************************************************************************
// DB
//************************************************************************************
//１．DB接続
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=map_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "INSERT INTO map_tables(name,lat,lon,img,input_date)VALUES(:name,:lat,:lon,:img,sysdate())";
$stmt = $pdo->prepare($sql);//sqlセットする関数

//４．SQL文の値へPOST値を渡す//*の箇所を変更！！
//（POST数に合わせて増やす）
//受け取った変数を検査して無効化させたりするところ、大丈夫であれば上で使う
$stmt->bindValue(":name", $name);
$stmt->bindValue(":lat", $lat);
$stmt->bindValue(":lon", $lon);
$stmt->bindValue(":img", $hased_file_name);

//5. SQL実行（True or False)
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:SQL実行時にエラー".$error[2]);
}else{
    //何もしない
}
?>





<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登録画面</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- ヘッダー -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="file_view.php">写真アップロード</a></div>
            </div>
        </nav>
    </header>
    <!-- ヘッダー -->
    
    <!-- 緯度・経度 -->
    <div>
        <?=$lat?>
        <?=$lon?>
    </div>
    <!-- Upload画像 -->
    <div>
        <?=$img?>
    </div>
    
<script src="js/jquery-2.1.3.min.js"></script>
<script>
    
 
</script>
</body>
</html>