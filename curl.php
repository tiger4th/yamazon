<?php

//カテゴリ取得
$id = '1';

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
$urlC = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/categorySearch?appid=".$app_id."&category_id=".$id;

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

curl_setopt($ch, CURLOPT_URL, $urlC);
$responseC = curl_exec($ch);
$resC = json_decode($responseC, true);

if(!isset($resC["ResultSet"])){
	echo '<link rel="stylesheet" type="text/css" href="./style.css" />ただいまご利用いただけません。しばらくお待ちください。<br /><a href="http://minrev.main.jp/">トップページに戻る</a>';
	exit;
}


//アフィリエイトウィジェット
$keyword = "特価";
$category = "";

$query = "";

if(isset($_GET['query'])){
	$query = $_GET['query'];
}


if(isset($resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"])){
	$category = $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"];
}

if($query != ""){
	$keyword = $query;
}else{
	$urlW = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/queryRanking?appid=".$app_id."&hits=2&category_id=".$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"];

	curl_setopt($ch, CURLOPT_URL, $urlW);
	$responseW = curl_exec($ch);
	$resW = json_decode($responseW, true);

	if(isset($resW["ResultSet"][0]["Result"][0]["Query"]) && substr($resW["ResultSet"][0]["Result"][0]["Query"], 0, 1) != "-"){
		if($resW["ResultSet"][0]["Result"][0]["Query"] != "あすつく" && !ctype_digit($resW["ResultSet"][0]["Result"][0]["Query"])){
			$keyword = rawurlencode($resW["ResultSet"][0]["Result"][0]["Query"]);
		}else{
			$keyword = rawurlencode($resW["ResultSet"][0]["Result"][1]["Query"]);
		}
	}else{
		$keyword = $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Medium"];
		$keyword = str_replace("全般", "", $keyword);
		$keyword = str_replace("その他", "", $keyword);
		$keyword = str_replace("関連用品", "", $keyword);
		$keyword = str_replace("用品作成", "", $keyword);
		$keyword = str_replace("用品", "", $keyword);
		$keyword = explode("、", $keyword);
		$keyword = explode("（", $keyword[0]);
		$keyword = explode("用", $keyword[0]);
		if(isset($keyword[1])){$keyword[0] = $keyword[1];}
		$keyword = $keyword[0];
	}
}

//変数
$newest  = "";
$newer   = "";
$older   = "";
$blinker = "";
$res = array();

$sort    = "-score";
$results = 15;
$start   = 1;

if(isset($_GET['sort']) && ($_GET['sort'] == '-sold' || $_GET['sort'] == '+price' || $_GET['sort'] == '-price' || $_GET['sort'] == '-score' || $_GET['sort'] == '-review_count')){
	$sort = rawurlencode($_GET['sort']);
}
if(isset($_GET['start']) && ctype_digit($_GET['start'])){
	$start = $_GET['start'];
}


//商品情報取得
$url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/json/itemSearch?appid=".$app_id."&affiliate_type=yid&affiliate_id=FD.RWZqlDqeHYKdLMFcQUA--&hits=".$results."&category_id=".$id."&sort=".$sort."&offset=".($start-1)."&query=".rawurlencode($query);

curl_setopt($ch, CURLOPT_URL, $url);
$response = curl_exec($ch);
$res = json_decode($response, true);

if(!isset($res["ResultSet"])){
	$res["ResultSet"][0] = "";
	$res["ResultSet"]["totalResultsAvailable"] = 0;
	$res["ResultSet"]["totalResultsReturned"] = 0;
	$category = $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["ParentId"];
}

if(!isset($res["ResultSet"]["totalResultsReturned"]) || $res["ResultSet"]["totalResultsReturned"] <= 0){
	if($query != ""){
		$tweet[0]["text"]  = "<span class=\"sm bold\">\"".$query."\"</span><span class=\"sm bold red\">の検索に一致する商品はありませんでした。</span>";
	}elseif($start == 1){
		$tweet[0]["text"]  = "<span class=\"sm bold red\">このカテゴリには商品がありません。</span>";
	}else{
		$tweet[0]["text"]  = "<span class=\"sm bold red\">商品がありません。</span>";
	}
}

curl_close($ch);

//ページ移動

if(isset($res["ResultSet"]["totalResultsAvailable"]) && $res["ResultSet"]["totalResultsAvailable"] > $results && !isset($text)){
	$base_url = "./index.php?id=".$id."&sort=".$sort;
	if($query != ""){
		$base_url .= "&query=".$query;
	}

	if($start > 1){
		$newest = '<a href="'.$base_url.'">&#171; 先頭</a>&nbsp;';
		$newer = '<a href="'.$base_url.'&start='.($start - $results).'">&#139; 戻る</a>';
	}else{
		$newer = '&#139; 戻る';
	}

	if($res["ResultSet"]["totalResultsAvailable"] > ($start + $results - 1)){
		$older = '<a href="'.$base_url.'&start='.($start + $results).'">次へ &#155;</a>';
	}else{
		$older = '次へ &#155;';
	}
	
	$blinker .= $newest.$newer.' | '.$older;
}
?>
