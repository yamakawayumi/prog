<?php
//ディレクトリ一覧を取得（２）
$directory = '../';
//特定の文字が入っている場合を除外する
$files = array_diff(scandir($directory), array('..', '.'));
var_dump($files);

////画像を繰返し取得表示

