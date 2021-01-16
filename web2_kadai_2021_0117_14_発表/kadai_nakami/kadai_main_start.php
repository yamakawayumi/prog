
<?php
$file_name_all = ['中野', '落合', '高田馬場', '早稲田', '神楽坂', '飯田橋', '九段下', '竹橋', '大手町', '日本橋', '茅場町', '門前仲町', '木場', '東陽町', '南砂町', '西葛西', '葛西', '浦安', '南行徳', '行徳', '妙典', '原木中山', '西船橋'];
$station_data = [];
$str_len = count($file_name_all);
for($i=0;i<$str_len;$i++){
    $file = './train/'.$file_name_all[$i].'.txt';
    $fh = fopen($file, "r");
    $line = fgets($fh);
    $result = explode(',', $line);
    array_push($station_data, $result);
    if ($i == 23) {
            break;
    }
}
$result= $station_data[0];
?>





<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<style>html,body{height:100%;}body{padding:0;margin:0;}h1{padding:0;margin:0;font-size:50%;}</style>
</head>
<div id="myMap" style='width:100%;height:100%;float:left;'></div>
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ai8bHfzmLlI91H53Zvfy2UIvFaog3WwWNjsCNvUQg7vjwRqxkQACr1xZnfTmpoRQ' async defer></script>
<script src="../js/BmapQuery.js"></script>
<script src="jquery-2.1.3.min.js"></script>
<!--    <form action="address.php" method="post"><input name="address" value="'+latlon+'"><button id="address_button">sdfghjhgfds</button></form>-->
<script>
    function GetMap(){
        const map = new Bmap("#myMap");
        map.geolocation(function(data) {
            map.startMap(35.713338,139.704745,"load", 14);
            //location
            lat = String(data.coords.latitude);//現在の位置情報を取得（緯度）
            lon = String(data.coords.longitude);//現在の位置情報を取得（経度）
    //            var latlon = lat+','+lon;
            //------------------------------------------------------------------------
            //緯度経度をサーバーに自動送信する
            //------------------------------------------------------------------------
    //            $('form').html('<form action="address.php" method="post"><input name="address" value="'+latlon+'"><button id="address_button">sdfghjhgfds</button></form>');
    //            document.getElementById('address_button').click()
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

