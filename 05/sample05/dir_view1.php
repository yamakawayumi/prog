<?php
//ディレクトリ一覧を取得（１）
$directory = '../';
//ドットが配列に入ってくるためそれを取り除く
$files = array_slice(scandir($directory), 2); //scandir("階層 or フォルダ名")
var_dump(scandir($directory));
//array(4) { [0]=> string(1) "." [1]=> string(2) ".." [2]=> string(8) "sample05" [3]=> string(20) "webProgramming05.pdf" }
////画像を繰返し取得表示
