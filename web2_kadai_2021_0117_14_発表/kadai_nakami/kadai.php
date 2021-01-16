
<?php
$file_name_all = ['中野', '落合', '高田馬場', '早稲田', '神楽坂', '飯田橋', '九段下', '竹橋', '大手町', '日本橋', '茅場町', '門前仲町', '木場', '東陽町', '南砂町', '西葛西', '葛西', '浦安', '南行徳', '行徳', '妙典', '原木中山', '西船橋'];
$station_data = [];
$str_len = count($file_name_all);
echo $str_len;
for($i=0;i<$str_len;$i++){
    $file = './train/'.$file_name_all[$i].'.txt';
    $fh = fopen($file, "r");
    // ファイルから一行読み込む
    $line = fgets($fh);
    // 読み込んだ行を出力する
//    echo $line;
    $result = explode(',', $line);
//    $station_data = [$result];
    array_push($station_data, $result);
//    var_dump($station_data);
    if ($i == 23) {
            break;    /* ここでは、'break 1;'と書くこともできます */
        }
//    echo $result;
//例：南砂町,東京メトロ東西線,35.668796,139.83065,エイト デイズ ア スィート SUNAMO店,3.28,https://tabelog.com/tokyo/A1313/A131303/13056563/,西葛西
//消さないことカッコ
}
echo '11111111111111111111111111111111111111111111111111111';
//$station_data[0]の中身は[中野],[東京メトロ].../中野の情報が全て入った配列


//echo var_dump($station_data);
//echo $station_data[0];
//echo $station_data[1];
//echo $station_data[0];
//$station_data[[[南砂町],[東京メトロ東西線]],[],[],[]];

$result= $station_data[0];//12$station_data[1]$station_data[2].......$station_data[12]$station_data[0]    [[南砂町],[東京メトロ東西線]],[];
echo $result[0];//中野
echo $station_data[1];
//$data[0]//7[南砂町],[東京メトロ東西線]
//$count = 0;
//function plus(){
//    $count = $count+1;
//    return $count;
//}
//$result = $station_data[0];//0~12153
?>





<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Tracking polyline Draw.</title>
<style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}</style>
<!--<style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}#geocode{font-size: 120%;}</style>-->
</head>
<body>



<!-- MAP[START] -->
<h1>Tracking polyline Draw.</h1>
<div id="myMap" style='width:100%;height:100%;float:left;'></div>
<!--
<button id="start_tracking">Start Tracking</button>
<button id="stop_tracking">Stop Tracking</button>
<button id="clear_map">Map Clear</button>
 MAP[END] 
<div id="speed">0</div>
-->
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ai8bHfzmLlI91H53Zvfy2UIvFaog3WwWNjsCNvUQg7vjwRqxkQACr1xZnfTmpoRQ' async defer></script>
<script src="../js/BmapQuery.js"></script>
<script src="jquery-2.1.3.min.js"></script>
<!--<script src="geocode.html"></script>-->

<!--
<form action="address.php" method="post"><input name="address"  value="1"><input name="hensyu_submit" type="submit" value="送信">
</form>
-->
    <form action="address.php" method="post"><input name="address" value="'+latlon+'"><button id="address_button">sdfghjhgfds</button></form>
<!--住所をサーバーに送信する処理[START]-->
<!--
<form  action="address.php" method="post">
    <input  name="address"  value="1">
    <button  type="hidden" id="address_button">
</form>
-->
<!--住所をサーバーに送信する処理[END]-->
<script>

    //****************************************************************************************
    // BingMaps&BmapQuery
    //****************************************************************************************
    //Init
function GetMap(){
    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    const map = new Bmap("#myMap");
    
    //------------------------------------------------------------------------
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);
    //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
    //------------------------------------------------------------------------

    
    //------------------------------------------------------------------------
    //3. Tracking Event & Draw
    //   map.startTracking("color", lineWidth, "#id(speed view)", console.log[true or false]);
    //------------------------------------------------------------------------

    //Clear Map.
//    document.getElementById("clear_map").onclick=function(){
//        map.clearMap();         //Clear Map.
//        map.clearTrackingData(); //Delete track&Speed data
//    }
//
        map.geolocation(function(data) {
            map.startMap(35.713338,139.704745,"load", 14);
            //location
            lat = String(data.coords.latitude);//現在の位置情報を取得（緯度）
            lon = String(data.coords.longitude);//現在の位置情報を取得（経度）
            var latlon = lat+','+lon;
            count = '15分以上いるので、時間を計測を開始します';
            console.log(count);
            //------------------------------------------------------------------------
            //緯度経度をサーバーに送信する7
            //------------------------------------------------------------------------
            $('form').html('<form action="address.php" method="post"><input name="address" value="'+latlon+'"><button id="address_button">sdfghjhgfds</button></form>');
            document.getElementById('address_button').click()
                console.log('ボタ123456789098765432123456789876543245678ン2がクリックされました！');

            //------------------------------------------------------------------------
            //テキスト情報を読み込む
            //------------------------------------------------------------------------
        //------------------------------------------------------------------------
        //スタート1
        //------------------------------------------------------------------------
    
                        
//例：南砂町,東京メトロ東西線,35.668796,139.83065,エイト デイズ ア スィート SUNAMO店,3.28,https://tabelog.com/tokyo/A1313/A131303/13056563/,西葛西
//        $station_data = [];
//        $str_len = count($file_name_all);
//        echo $str_len;
//            $file = './train/'.$file_name_all[i].'.txt';
//            $fh = fopen($file, "r");
//            // ファイルから一行読み込む
//            $line = fgets($fh);
//            // 読み込んだ行を出力する
//        //    echo $line;
//            $result = explode(',', $line);
//        //    $station_data = [$result];
//            array_push($station_data, $result);
//        //    var_dump($station_data);
//            if ($i == 23) {
//                    break;    /* ここでは、'break 1;'と書くこともできます */
//                }
            var pincolor = '#ff8c00'
            var file_count = <?=$str_len?>;
            var station_name = '<?=$result[0]?>';//駅名
            var lat = Number(<?=$result[2]?>); //緯度
            var lon = Number(<?=$result[3]?>); //経度
            var shop_name = '<?=$result[4]?>';//店名
            var hyouka = '<?=$result[5]?>';//評価
            var url_name = '<?=$result[6]?>';//url
            var moryori_station_name = '<?=$result[7]?>';
            const options = [];
            options[0]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": '評価：'+hyouka+'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[1];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[1]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[2];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[2]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[3];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[3]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[4];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[4]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[5];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[5]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[6];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[6]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":+'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[7];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[7]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[8];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[8]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[9];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[9]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[10];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[10]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[11];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[11]={
                "lat":lat,//緯度
                "lon":lon,//経度
                 "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[12];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[12]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[13];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[13]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[14];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[14]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[15];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[15]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[16];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[16]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[17];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[17]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[18];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[18]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[19];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[19]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[20];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[20]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[21];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[21]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[22];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[22]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description": 'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[23];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[23]={
                "lat":lat,//緯度
                "lon":lon,//経度
                "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };
            <?php $result = $station_data[24];?>
            station_name = '<?=$result[0]?>';//駅名
            lat = Number(<?=$result[2]?>); //緯度
            lon = Number(<?=$result[3]?>); //経度
            shop_name = '<?=$result[4]?>';//店名
            hyouka = '<?=$result[5]?>';//評価
            url_name = '<?=$result[6]?>';//url
            moryori_station_name = '<?=$result[7]?>';
            options[24]={
                "lat":lat,//緯度
                "lon":lon,//経度
                 "title":'---'+station_name+'駅---'+shop_name+'---'+'評価：'+hyouka,
                "pinColor":pincolor,
                "height":500,
                "width":400,
                "description":'URL：'+url_name,
                "show":true
             };

             map.infoboxLayers(options,true);
    });

}
</script>
<h1>'<?=$result[7]?>'</h1>
</body>
</html>

