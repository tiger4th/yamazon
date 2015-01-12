<?php

//変数
$id = '1';

$newest  = "";
$newer   = "";
$older   = "";
$oldest  = "";
$blinker = "";
$res = array();

$sort    = "-score";
$results = 15;
$start   = 1;

$query   = "";
$code    = "";

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_GET['sort']) && ($_GET['sort'] == '-sold' || $_GET['sort'] == '+price' || $_GET['sort'] == '-price' || $_GET['sort'] == '-score' || $_GET['sort'] == '-review_count')){
	$sort = rawurlencode($_GET['sort']);
}
if(isset($_GET['start']) && ctype_digit($_GET['start'])){
	$start = $_GET['start'];
}
if(isset($_GET['query'])){
	$query = $_GET['query'];
}
if(isset($_GET['code'])){
	$code = $_GET['code'];
}


//商品情報取得
$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch?appid=".$app_id."&affiliate_type=vc&affiliate_id=http%3A%2F%2Fck.jp.ap.valuecommerce.com%2Fservlet%2Freferral%3Fsid%3D3146778%26pid%3D883209894%26vc_url%3D&hits=".$results."&category_id=".$id."&sort=".$sort."&offset=".($start-1)."&query=".rawurlencode($query);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

curl_setopt($ch, CURLOPT_URL, $url);
$response = curl_exec($ch);
$res = json_decode($response, true);

if(!isset($res["ResultSet"])){
	$res["ResultSet"][0] = "";
	$res["ResultSet"]["totalResultsAvailable"] = 0;
	$res["ResultSet"]["totalResultsReturned"] = 0;
	$category = $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["ParentId"];
}

if($res["ResultSet"]["totalResultsReturned"] <= 0 || $code == ""){
	echo '<br /><link rel="stylesheet" type="text/css" href="./style.css" />&nbsp;&nbsp;ただいまご利用いただけません。しばらくお待ちください。<br /><br />&nbsp;&nbsp;<a href="http://tiger4th.com/yamazon/">トップページに戻る</a>';
	exit;
}

$price = $res["ResultSet"][0]["Result"][$code]["Price"]["_value"];
if($res["ResultSet"][0]["Result"][$code]["PriceLabel"]["FixedPrice"] > 0){
	$dprice = $res["ResultSet"][0]["Result"][$code]["PriceLabel"]["FixedPrice"];
}elseif($res["ResultSet"][0]["Result"][$code]["PriceLabel"]["DefaultPrice"] > 0){
	$dprice = $res["ResultSet"][0]["Result"][$code]["PriceLabel"]["DefaultPrice"];
}else{
	$dprice = "";
}

// アフィリエイト不可ストアのリンクからアフィリエイトを外す
$black_list = array(
    "dell",
    "n-garden",
    "abita-club",
    "kishindo",
    "morozoff",
);
foreach ($black_list as $black_store) {
    if (strstr($res["ResultSet"][0]["Result"][$code]["Url"], "%2F".$black_store."%2F")) {
        $explode = explode("vc_url=", $res["ResultSet"][0]["Result"][$code]["Url"]);
        $res["ResultSet"][0]["Result"][$code]["Url"] = rawurldecode($explode[1]);
    }
}

//レビュー取得
$sid = $res["ResultSet"][0]["Result"][$code]["Store"]["Id"];
$urlR = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/reviewSearch?appid=".$app_id."&affiliate_type=vc&affiliate_id=http%3A%2F%2Fck.jp.ap.valuecommerce.com%2Fservlet%2Freferral%3Fsid%3D3146778%26pid%3D883209894%26vc_url%3D&results=3&store_id=".$sid;

curl_setopt($ch, CURLOPT_URL, $urlR);
$responseR = curl_exec($ch);
$resR = json_decode($responseR, true);


//カテゴリ取得
$urlC = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/categorySearch?appid=".$app_id."&category_id=".$id;

curl_setopt($ch, CURLOPT_URL, $urlC);
$responseC = curl_exec($ch);
$resC = json_decode($responseC, true);

if(!isset($resC["ResultSet"])){
	echo '<link rel="stylesheet" type="text/css" href="./style.css" />ただいまご利用いただけません。しばらくお待ちください。<br /><a href="http://tiger4th.com/yamazon/">トップページに戻る</a>';
	exit;
}

curl_close($ch);

?>
