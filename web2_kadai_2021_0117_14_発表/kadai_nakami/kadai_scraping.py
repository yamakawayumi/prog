
# web２の課題である20210117
import json
import requests
import requests
from bs4 import BeautifulSoup
import time
import os
no_1_shop_name = ''
no_1_shop_name = ''
no_1_shop_url = ''
station_name  = 0
station_lon = 0
station_lat = 0
area = '' #
train_line = ''#線路
moryori_train_name = ''

no1_shop_name = 0
no1_url = 0
no1_rating_score  = 0

station_all = []
#2----------------------------------------------------
#----------------------------------------------------
def create_txt():#DBの代わり
    os.makedirs('./train',exist_ok=True)#ディレクトリが存在しない場合は作る
    atai = station_name+','+train_line+','+station_lat+','+station_lon+','+no1_shop_name+','+no1_rating_score+','+no1_url+','+moryori_train_name
    with open('./train/'+station_name+'.txt', "w") as f:
        f.write(atai)
# ----------------------------------------------------
# ----------------------------------------------------
def area_tabelg_hyouka_get(station_name):#駅名の周りにある評価の高いスイーツ点を取得する
    global no1_shop_name
    global no1_url
    global no1_rating_score 
    # ----------------------------------------------------
    # ----------------------------------------------------
    #食べログのホームページで検索条件（エリア、スイーツ）を入力しPOSTする
                # <input id="sa" type="text" name="sa" size="15" autocomplete="off" maxlength="50" value="" placeholder="エリア・駅 [例:銀座、渋谷]" class="p-global-search__input js-header-val js-search-area-input p-global-search-suggest__input">
                # スイーツ <input id="sk" type="text" name="sk" size="30" maxlength="50" value="" placeholder="キーワード [例:焼肉、店名、個室]" autocomplete="off" class="p-global-search__input js-header-val js-search-keyword-input p-global-search-suggest__input">
                # フォームタグのaction宛先 <form id="rstsearch_form" class="p-global-search" name="FrmSrchFreeWord" method="get" action="https://tabelog.com/rst/rstsearch/" Accept-charset="UTF-8">
    payload = {
        'sa': station_name,#渋谷
        'sk':'スイーツ'
    }
    site = requests.post('https://tabelog.com/rst/rstsearch/', data=payload)#食べログのホームページで検索条件（エリア、スイーツ）を入力しPOSTする
    # ----------------------------------------------------
    # ----------------------------------------------------
    soup_html = BeautifulSoup(site.text, 'html.parser')#この1行でHTMLからデータを引き出すことができる
    ranking_shop_url_1 = soup_html.find_all('a', class_='navi-rstlst__label navi-rstlst__label--rank') #クラス名指定してaタグを取得
    ranking_shop_url_1 = ranking_shop_url_1[0].get('href') #url取得
    site = requests.post(ranking_shop_url_1)#urlからページを取得
    soup_html_ranking = BeautifulSoup(site.text, 'html.parser')#この1行でHTMLからデータを引き出すことができる
                #ランキングNo.1のタグから
                # <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" target="_blank" rel="noopener" data-list-dest="item_top" data-ranking="1" href="https://tabelog.com/nagano/A2001/A200106/20001965/">手作りアイス フィオーレ</a>
    #---------------------------------------------------
    #店名を取得---------------------------------
                # <h4 class="list-rst__rst-name">
                #     <span class="list-rst__rank-no"><span class="c-ranking-badge"><span class="c-ranking-badge__no list-rst__rank-badge-no c-ranking-badge__no--no1 list-rst__rank-badge-no--no1 cpy-ranking"><i class="c-ranking-badge__contents u-text-num list-rst__rank-badge-contents">1</i></span></span></span><a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" target="_blank" rel="noopener" data-list-dest="item_top" data-ranking="1" href="https://tabelog.com/nagano/A2001/A200106/20001965/">手作りアイス フィオーレ</a>
                # </h4>
                # <span class="list-rst__rank-no"><span class="c-ranking-badge"><span class="c-ranking-badge__no list-rst__rank-badge-no c-ranking-badge__no--no1 list-rst__rank-badge-no--no1 cpy-ranking"><i class="c-ranking-badge__contents u-text-num list-rst__rank-badge-contents">1</i></span></span></span>
    no1_shop = soup_html_ranking.find_all('a', class_='list-rst__rst-name-target cpy-rst-name js-ranking-num') 
                # [<a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="1" href="https://tabelog.com/nagano/A2001/A200106/20001965/" rel="noopener" target="_blank">手作りアイス フィオーレ</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="2" href="https://tabelog.com/nagano/A2001/A200106/20015140/" rel="noopener" target="_blank">和菓子しおざき</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="3" href="https://tabelog.com/nagano/A2001/A200106/20018442/" rel="noopener" target="_blank">ミミエデン</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="4" href="https://tabelog.com/nagano/A2001/A200106/20009807/" rel="noopener" target="_blank">パティスリーCercle</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="5" href="https://tabelog.com/nagano/A2001/A200106/20021563/" rel="noopener" target="_blank">カフェ ステイゴールド</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="6" href="https://tabelog.com/nagano/A2005/A200503/20023086/" rel="noopener" target="_blank">高原堂パン店</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="7" href="https://tabelog.com/nagano/A2001/A200106/20019486/" rel="noopener" target="_blank">ピクニックコート ベイシア中野店</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="8" href="https://tabelog.com/nagano/A2001/A200106/20022023/" rel="noopener" target="_blank">コラボ・カフェりーぷ 中野店</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="9" href="https://tabelog.com/nagano/A2001/A200106/20018421/" rel="noopener" target="_blank">銀座コージーコーナー イオン中野</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="10" href="https://tabelog.com/nagano/A2001/A200106/20015028/" rel="noopener" target="_blank">吾妻屋製菓</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="11" href="https://tabelog.com/nagano/A2001/A200106/20016768/" rel="noopener" target="_blank">バロンミヨシ</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="12" href="https://tabelog.com/nagano/A2001/A200106/20023949/" rel="noopener" target="_blank">ジョリーアンジュ</a>, <a class="list-rst__rst-name-target cpy-rst-name js-ranking-num" data-list-dest="item_top" data-ranking="13" href="https://tabelog.com/nagano/A2001/A200106/20021549/" rel="noopener" target="_blank">ホイップ工房</a>]
    no1_shop_name = no1_shop[0].string#ランキングNO.1の店の名前を取得
    #---------------------------------------------------
    #店の個別ページURLを取得---------------------------------
    no1_url = no1_shop[0].get('href') # ランキングNO.1の店のURLを取得（例:https://tabelog.com/chiba/A1203/A120301/12019863/)
    print(no1_url)
    #--------------------------------------------------
    #五段階評価を取得---------------------------------
                # <span class="c-rating__val c-rating__val--strong list-rst__rating-val">3.18</span>
    no1_shop = soup_html_ranking.find_all('span', class_='c-rating__val c-rating__val--strong list-rst__rating-val') #ランキング順に整列されているaタグを探す
    no1_rating_score = no1_shop[0].string #spanの文字列を取得 例3.23
    print('  評価点数：{}点'.format(no1_rating_score), end='')
    # <span class="c-rating__val c-rating__val--strong list-rst__rating-val">3.18</span>
    time.sleep(1)
#2----------------------------------------------------
def lat_lon_area():#緯度経度から最寄りの駅名を取得
    global train_line
    global moryori_train_name
    global station_name
    global station_lon 
    global station_lat 
    global station_all
    with open('address.txt') as f:#現在地の緯度経度を読み込む（DBの代わり）
        address = f.read()
    print(address)
    pos_description = address.split(',')#カンマで分けてリストに格納する
    y = str(pos_description[0])#緯度
    x = str(pos_description[1])#経度
    # 35.6798711,139.91500059999
#----------------------------------------------------
# API使用：#http://express.heartrails.com/api.html#nearest
#----------------------------------------------------
    #現在地から最寄りの駅名取得#線路取得 
    url = 'http://express.heartrails.com/api/json?method=getStations&x='+x+'&y='+y#経度緯度URL
    result = requests.get(url)
    result_json = json.loads(result.text)
    result = result_json['response']
    result = result['station']
    result = result[0]
    moryori_train_name = result['name']#現在地から最寄りの駅名取得
    train_line = result['line']#線路取得 例:東京メトロ東西線

    url = 'http://express.heartrails.com/api/json?method=getStations&line='+train_line#経度緯度URL
    result = requests.get(url)
    print(result)
    result_json = json.loads(result.text)
    print(result_json)
    result = result_json['response']
    #resultの中身# {'station': [{'name': '中野', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.665835, 'y': 35.705765, 'postal': '1640001', 'prev': None, 'next': '落合'}, {'name': '落合', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.687284, 'y': 35.710976, 'postal': '1610034', 'prev': '中野', 'next': '高田馬場'}, {'name': '高田馬場', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.704745, 'y': 35.713338, 'postal': '1690075', 'prev': '落合', 'next': '早稲田'}, {'name': '早稲田', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.721319, 'y': 35.705723, 'postal': '1620042', 'prev': '高田馬場', 'next': '神楽坂'}, {'name': '神楽坂', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.734546, 'y': 35.70379, 'postal': '1620805', 'prev': '早稲田', 'next': '飯田橋'}, {'name': '飯田橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.745986, 'y': 35.701725, 'postal': '1020072', 'prev': '神楽坂', 'next': '九段下'}, {'name': '九段下', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.751948, 'y': 35.695589, 'postal': '1020073', 'prev': '飯田橋', 'next': '竹橋'}, {'name': '竹橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.756817, 'y': 35.690662, 'postal': '1000003', 'prev': '九段下', 'next': '大手町'}, {'name': '大手町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.766086, 'y': 35.684801, 'postal': '1000004', 'prev': '竹橋', 'next': '日本橋'}, {'name': '日本橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.773516, 'y': 35.682078, 'postal': '1030027', 'prev': '大手町', 'next': '茅場町'}, {'name': '茅場町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.780005, 'y': 35.679752, 'postal': '1030025', 'prev': '日本橋', 'next': '門前仲町'}, {'name': '門前仲町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.796209, 'y': 35.671851, 'postal': '1350047', 'prev': '茅場町', 'next': '木場'}, {'name': '木場', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.807042, 'y': 35.669351, 'postal': '1350042', 'prev': '門前仲町', 'next': '東陽町'}, {'name': '東陽町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.817596, 'y': 35.669629, 'postal': '1350016', 'prev': '木場', 'next': '南砂町'}, {'name': '南砂町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.83065, 'y': 35.668796, 'postal': '1360076', 'prev': '東陽町', 'next': '西葛西'}, {'name': '西葛西', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.859259, 'y': 35.664631, 'postal': '1340088', 'prev': '南砂町', 'next': '葛西'}, {'name': '葛西', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.872458, 'y': 35.663554, 'postal': '1340083', 'prev': '西葛西', 'next': '浦安'}, {'name': '浦安', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.893193, 'y': 35.665932, 'postal': '2790002', 'prev': '葛西', 'next': '南行徳'}, {'name': '南行徳', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.902311, 'y': 35.672687, 'postal': '2720143', 'prev': '浦安', 'next': '行徳'}, {'name': '行徳', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.914254, 'y': 35.682686, 'postal': '2720133', 'prev': '南行徳', 'next': '妙典'}, {'name': '妙典', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.924209, 'y': 35.690935, 'postal': '2720115', 'prev': '行徳', 'next': '原木中山'}, {'name': '原木中山', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.942029, 'y': 35.703517, 'postal': '2730035', 'prev': '妙典', 'next': '西船橋'}, {'name': '西船橋', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.958972, 'y': 35.707127, 'postal': '2730032', 'prev': '原木中山', 'next': None}]}
    result = result['station']
    # # [{'name': '中野', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.665835, 'y': 35.705765, 'postal': '1640001', 'prev': None, 'next': '落合'}, {'name': '落合', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.687284, 'y': 35.710976, 'postal': '1610034', 'prev': '中野', 'next': '高田馬場'}, {'name': '高田馬場', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.704745, 'y': 35.713338, 'postal': '1690075', 'prev': '落合', 'next': '早稲田'}, {'name': '早稲田', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.721319, 'y': 35.705723, 'postal': '1620042', 'prev': '高田馬場', 'next': '神楽坂'}, {'name': '神楽坂', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.734546, 'y': 35.70379, 'postal': '1620805', 'prev': '早稲田', 'next': '飯田橋'}, {'name': '飯田橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.745986, 'y': 35.701725, 'postal': '1020072', 'prev': '神楽坂', 'next': '九段下'}, {'name': '九段下', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.751948, 'y': 35.695589, 'postal': '1020073', 'prev': '飯田橋', 'next': '竹橋'}, {'name': '竹橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.756817, 'y': 35.690662, 'postal': '1000003', 'prev': '九段下', 'next': '大手町'}, {'name': '大手町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.766086, 'y': 35.684801, 'postal': '1000004', 'prev': '竹橋', 'next': '日本橋'}, {'name': '日本橋', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.773516, 'y': 35.682078, 'postal': '1030027', 'prev': '大手町', 'next': '茅場町'}, {'name': '茅場町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.780005, 'y': 35.679752, 'postal': '1030025', 'prev': '日本橋', 'next': '門前仲町'}, {'name': '門前仲町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.796209, 'y': 35.671851, 'postal': '1350047', 'prev': '茅場町', 'next': '木場'}, {'name': '木場', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.807042, 'y': 35.669351, 'postal': '1350042', 'prev': '門前仲町', 'next': '東陽町'}, {'name': '東陽町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.817596, 'y': 35.669629, 'postal': '1350016', 'prev': '木場', 'next': '南砂町'}, {'name': '南砂町', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.83065, 'y': 35.668796, 'postal': '1360076', 'prev': '東陽町', 'next': '西葛西'}, {'name': '西葛西', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.859259, 'y': 35.664631, 'postal': '1340088', 'prev': '南砂町', 'next': '葛西'}, {'name': '葛西', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.872458, 'y': 35.663554, 'postal': '1340083', 'prev': '西葛西', 'next': '浦安'}, {'name': '浦安', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.893193, 'y': 35.665932, 'postal': '2790002', 'prev': '葛西', 'next': '南行徳'}, {'name': '南行徳', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.902311, 'y': 35.672687, 'postal': '2720143', 'prev': '浦安', 'next': '行徳'}, {'name': '行徳', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.914254, 'y': 35.682686, 'postal': '2720133', 'prev': '南行徳', 'next': '妙典'}, {'name': '妙典', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.924209, 'y': 35.690935, 'postal': '2720115', 'prev': '行徳', 'next': '原木中山'}, {'name': '原木中山', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.942029, 'y': 35.703517, 'postal': '2730035', 'prev': '妙典', 'next': '西船橋'}, {'name': '西船橋', 'prefecture': '千葉県', 'line': '東京メトロ東西線', 'x': 139.958972, 'y': 35.707127, 'postal': '2730032', 'prev': '原木中山', 'next': None}]}
    for line in result:#{'name': '中野', 'prefecture': '東京都', 'line': '東京メトロ東西線', 'x': 139.665835, 'y': 35.705765, 'postal': '1640001', 'prev': None, 'next': '落合'}
        station_name = line['name']#駅名
        station_lon = str(line['x'])#駅の経度
        station_lat = str(line['y'])#駅の緯度
        station_all.append(station_name)#リストに格納
        #2---------------------------------------------------
        area_tabelg_hyouka_get(station_name)#駅名の周りにある評価の高いスイーツの店を取得するする関数
        #3---------------------------------------------------
        create_txt()

#----------------------------------------------------
#Main-1---------------------------------------------------
lat_lon_area()#緯度経度から最寄りの路線名と駅名を取得する関数


