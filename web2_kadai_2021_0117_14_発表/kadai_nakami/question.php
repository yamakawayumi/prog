<?php
$file_name_all = ['中野', '落合', '高田馬場', '早稲田', '神楽坂', '飯田橋', '九段下', '竹橋', '大手町', '日本橋', '茅場町', '門前仲町', '木場', '東陽町', '南砂町', '西葛西', '葛西', '浦安', '南行徳', '行徳', '妙典', '原木中山', '西船橋'];
$station_data = [];//配列格納
for($i=0;i<$str_len;$i++){
    $file = './train/'.$file_name_all[$i].'.txt';
    $fh = fopen($file, "r");
    $line = fgets($fh);
    $result = explode(',', $line);
    array_push($station_data, $result);
    if ($i == 23) {
            break;
    }
$d = $station_data[0];
    echo $d[0];
    echo $d[0];
    echo $d[0];
    echo $d[0];
    echo $d[0];
    echo $d[0];
}
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
<!--    <form action="address.php" method="post"><input name="address" value="'+latlon+'"><button id="address_button">sdfghjhgfds</button></form>-->
   <script>
       console.log('<?=$d[0]?>');
       const a = '<?= json_encode($station_data) ?>';
       
//       const a = '<?= $station_data[0] ?>';
       console.log(a);
       console.log('<?=$d[0]?>');
    function GetMap(){
        const map = new Bmap("#myMap");
        map.geolocation(function(data) {
            map.startMap(35.713338,139.704745,"load", 14);
            const options = [];
            var file_count = <?=$file_name_all?>;
            for (let i = 0; i < file_count; i++) {//12駅分表示する
    //            $file_name_all = ['中野', '落合', '高田馬場', '早稲田', '神楽坂', '飯田橋', '九段下', '竹橋', '大手町', '日本橋', '茅場町', '門前仲町', '木場', '東陽町', '南砂町', '西葛西', '葛西', '浦安', '南行徳', '行徳', '妙典', '原木中山', '西船橋'];
                for (let j = 0; j < 6; j++) {//6[中野],[東京メトロ東西線],[35.705765],[139.665835].[手作りアイス],[3.18],[https://tabelog.com/nagano/A2001/A20010]
                    <?=$result = $station_data[j]?>//iのjsの値をphpに組み込むことが可能か
                    
                    var station_name = '<?=$result[0]?>';//駅名
                    var lat = Number(<?=$result[2]?>); //緯度
                    var lon = Number(<?=$result[3]?>); //経度
                    var shop_name = '<?=$result[4]?>';//店名
                    var hyouka = '<?=$result[5]?>';//評価
                    var url_name = '<?=$result[6]?>';//url
                    options[i]={
                        "lat":lat,//緯度
                        "lon":lon,//経度
                        "title":'---'+station_name+'駅---'+shop_name,
                        "pinColor":pincolor,
                        "height":500,
                        "width":400,
                        "description": '評価：'+hyouka+'URL：'+url_name,
                        "show":true
                    };
                }
                map.infoboxLayers(options,true);
            }
        });
    };
</script>
</body>
</html>