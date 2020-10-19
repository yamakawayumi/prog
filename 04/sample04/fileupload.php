<!--
課題
ユニークなファイル名にする方法
時間とファイル名を組み合わせたものからハッシュ値にする
-->

􏰤􏰿􏰙􏰥􏰏􏰭􏰑􏰕􏰾􏰼􏰡􏰬􏰮􏰪􏰫􏰣􏰏􏰢􏱀􏰝
<?php
if(isset($_FILES["upfile"])){
    $timestamp = time() ;//時間取得
    $file_name = $_FILES["upfile"]["name"]; //ファイル名取得
    //拡張子取得
    $array = pathinfo($file_name);
    $hased_file_name = hash('sha256', date( "Y年m月d日 H時i分s秒" ) .$file_name) .'.'.$array['extension'];//ハッシュ関数を使う
    echo $hased_file_name;
    $tmp_path = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"一時的保存するTemp􏰫􏰭􏰥􏰣フォルダパスを取得する
    ///Applications/MAMP/tmp/php/phpKcRPlB
    $file_dir_path = "upload/";
    $img="";
}
// FileUpload [--Start--]
if ( is_uploaded_file( $tmp_path ) ) {//ファイルがPOST通信でアップされたものかを確認する方法
    if ( move_uploaded_file( $tmp_path, $file_dir_path . $hased_file_name ) ) {
    // ファイルへのアクセスを制限
    //所有者に読み込み、書き込みの権限を与え、その他には読み込みだけ許可する。
    chmod( $file_dir_path . $hased_file_name, 0644 );
    $img = '<img src="'. $file_dir_path . $hased_file_name . '" >';
    }
}else {
    $img = 'アップロードできませんでした􏰧􏰾􏰬􏰯􏰐􏰙􏰪􏰛􏰤􏰻􏰦􏰪􏰕􏰜􏰖'; //Error􏰏􏰆 =􏰣􏰩􏰿􏰑􏰲:􏰰􏰐
    echo 'アップロードできませんでした􏰧􏰾􏰬􏰯􏰐􏰙􏰪􏰛􏰤􏰻􏰦􏰪􏰕􏰜􏰖'; //Error􏰏􏰆 =􏰣􏰩􏰿􏰑􏰲:􏰰􏰐
} 􏰋􏰛􏰛􏰚􏰁􏰂􏰂
//move_uploaded_fileとは
//クライアントからのリクエストでアップロードされたファイルの保存場所を変更する際に使用するのがmove_uploaded_file関数です。
//アップロードされたファイルはまず、/tmpなどの一時フォルダに保存されます。
//
//そのままでは、一定の時間が経つと一時フォルダの中身は削除されるので、アップロードされたファイルを今後使用する場合は
//勝手に削除される可能性がない専用のディレクトリに保存する必要がありるため、その際にmove_uploaded_file関数を利用します。
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>

<?php echo $img; ?>



</body>
</html>