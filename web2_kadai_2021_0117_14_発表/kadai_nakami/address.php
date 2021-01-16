
<?php
//$_POSTが存在するか？（POST送信されていればnot Empty です）
if(!empty($_POST)) {
    //1．POST値取得
    $latlon = $_POST["latlon"];//住所受信
echo $latlon;
echo '受け取れました';

  define("TESTFILE","./address.txt");//受け取った値をtxtファイルに書き込む
  $fh = fopen(TESTFILE, "w");
  fwrite($fh,$latlon );
  fclose($fh);

    //2. 未入力チェック
    if (!$lat ) {
        $error['latlon'] = 'ありません';
    }
}else{
    echo "Error:1";
    exit();
}
//************************************************************************************
// DB
//************************************************************************************
//１．DB接続
//try {
//    //dbname=gs_db
//    //host=localhost
//    //Password:MAMP='root', XAMPP=''
//    $pdo = new PDO('mysql:dbname=map_db;charset=utf8;host=localhost','root','root');
//} catch (PDOException $e) {
//    exit('DBConnectError:'.$e->getMessage());
//}
//
////３．SQL文作成 //*の箇所とテーブル名を変更！！
//$sql = "INSERT INTO map_tables(latlon)VALUES(:latlon)";
//$stmt = $pdo->prepare($sql);
//
////４．SQL文の値へPOST値を渡す//*の箇所を変更！！
////（POST数に合わせて増やす）
//$stmt->bindValue(":latlon", $latlon);
////5. SQL実行
//$status = $stmt->execute();
//
////6. 画面遷移(select.php)
//if($status==false) {
//    //execute（SQL実行時にエラーがある場合）
//    $error = $stmt->errorInfo();
//    exit("SQLError:".$error[2]);
//}else{
//    //何もしない
//}
?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <script>
        location.href = "kadai.php";
    </script>
</body>
</html>
-->
