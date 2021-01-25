<?php
$station_data = [];//配列格納
    $file = './train/中野.txt';
    $fh = fopen($file, "r");
    $line = fgets($fh);
    $result = explode(',', $line);
    array_push($station_data, $result);
    $json = json_encode($station_data);
//エラー
//$station_data = [[[中野],[東京メトロ東西線],[35.705765],[139.665835].[手作りアイス],[3.18],[https:/tabelog.com/nagano/A2001/A200106/20001965/]],
//                 [[落合],[東京メトロ東西線],[35.705765],[139.665835].[sssssアイス],[2.18],[https:/tabelog.com/nagano/A2001/A200106/20001965/]]];

//$station_data = [[[中野],[東京メトロ東西線],[35.705765],[139.665835].[手作りアイス],[3.18],[https://tabelog.com/nagano/A2001/A200106/20001965/]],
//                 [[落合],[東京メトロ東西線],[35.705765],[139.665835].[sssssアイス],[2.18],[https://tabelog.com/nagano/A2001/A200106/20001965/]]];

//$station_data[0]は[中野],[東京メトロ東西線],[35.705765],[139.665835].[手作りアイス],[3.18],[https://tabelog.com/nagano/A2001/A200106/20001965/]
//$station_data[1]は[落合],[東京メトロ東西線],[35.705765],[139.665835].[sssssアイス],[2.18],[https://tabelog.com/nagano/A2001/A200106/20001965/]
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}</style>
</head>
<body>
<div id="myMap" style='width:100%;height:100%;float:left;'></div>
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ai8bHfzmLlI91H53Zvfy2UIvFaog3WwWNjsCNvUQg7vjwRqxkQACr1xZnfTmpoRQ' async defer></script>
<script src="../js/BmapQuery.js"></script>
<script src="jquery-2.1.3.min.js"></script>
<script>
    const data = JSON.parse('<?=$json?>');  //JSON文字列→配列に変換
    console.log(data[0]);
</script>
</body>
</html>