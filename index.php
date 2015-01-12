<?php require("./app_id.php"); ?>
<?php require("./curl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="amazon,アマゾン,ヤフー,Yahoo!,ショッピング,オークション,商品<?php
if($id!=1){
	echo ",".str_replace("、", ",", $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Medium"]);
}
?>" />
<meta name="description" content="<?php
if($id==1){
	echo "Yamazonは通販商品検索サービスです。Yahoo!ショッピングの商品を見やすい画面で快適に探すことができます。";
}else{
	echo $resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Medium"]."の通販ならyamazon。YamazonはYahoo!ショッピングの商品検索サービスです。";
}
?>" />
<meta http-equiv="content-Style-type" content="text/css" />
<meta http-equiv="content-Script-type" content="text/javascript" />
<title><?php
	if($id==1){
		echo "Yamazon： Yahoo!ショッピングを快適に閲覧";
	}else{
		echo "Yamazon: ".$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Long"];
	}
?></title>
<link rel="stylesheet" type="text/css" href="./style.css" />
<link rel="shortcut icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="./image/favicon.ico" type="image/vnd.microsoft.icon" />

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20423739-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>

<div id="wrapper">

<?php require("./header.php"); ?>

<div id="container">
<div id="contents">
<div class="pan" align="left">
<?php
if(!isset($tweet)){
	if($id==1){
		echo "<h1><span class='sm'>Yamazonへようこそ。YamazonはYahoo!ショッピングの商品検索サービスです。</span></h1>";
	}else{
		foreach($resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Path"] as $item){
			if (is_array($item)) {
				if($item["Id"]==1){
					echo '<a href="./index.php?id=1&sort='.$sort.'"><span class="sm bold">トップ</span></a>';
				}elseif($item["Id"]==$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"]){
					echo '<span class="sm"> &#155; </span><h1><span class="sm bold orange">'.$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Short"].'</span></h1>';
				}else{
					echo '<span class="sm"> &#155; </span><a href="./index.php?id='.$item["Id"].'&sort='.$sort.'"><span class="sm bold">'.$item["Title"]["Name"].'</span></a>';
				}
			}
		}
	}
}
?>
</div>

<?php if(isset($res["ResultSet"]["totalResultsReturned"]) && $res["ResultSet"]["totalResultsReturned"] > 0 && !isset($tweet)){ ?>
<div class="boxhead" align="left">
<div id="subject">
<span class="xs">検索結果<?php echo number_format($res["ResultSet"]["totalResultsAvailable"]); ?>件中<?php echo number_format($start); ?>件から<?php echo number_format($start + $res["ResultSet"]["totalResultsReturned"] - 1); ?>件までを表示</span>
</div>

<div id="page">
<form action="" method="get">
<span class="xs">並べ替え: </span>
<select name="sort" class="sort" onchange="this.form.submit();">
<option value="-score"<?php if($sort == '-score'){echo ' selected="selected"'; } ?>>おすすめ順</option>
<option value="-sold"<?php if($sort == '-sold'){echo ' selected="selected"'; } ?>>売れている順</option>
<option value="+price"<?php if($sort == '%2Bprice'){echo ' selected="selected"'; } ?>>価格の安い順</option>
<option value="-price"<?php if($sort == '-price'){echo ' selected="selected"'; } ?>>価格の高い順</option>
<option value="-review_count"<?php if($sort == '-review_count'){echo ' selected="selected"'; } ?>>レビュー件数の多い順</option>
</select>
<noscript></noscript>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="query" value="<?php echo $query; ?>">
</form>
</div>

</div>
<?php } ?>

<?php require("./list.php"); ?>

<?php if($blinker != ""){ ?>
<div class="boxhead" align="center">
<span class="sm gray9">
<?php echo $blinker; ?>
</span>
</div>
<?php } ?>

</div>
</div>

<div id="sidebar" align="center">

<div class="box" align="left">
<?php require("./category.php"); ?>
</div>
<br />

<div class="box" align="left">
<a href="http://tiger4th.com/"><span class="sm bold orange">リンク</span></a><br />
<div class="link">
<a href="http://minrev.main.jp/"><img src="./image/banner.png" border="0" alt="みんなの新着レビュー" /></a>
</div>
<a href="http://tiger4th.com/anibuzz/"><img src="./image/anibuzz.png" border="0" alt="anibuzz" /></a>
</div>
<br />

<script type="text/javascript" src="http://i.yimg.jp/images/auct/blogparts/auc_bp.js?s=1&cl=4&qu=<?php echo $keyword; ?>&cid=0&di=0&od=1&ti=&pt=0&dotyid=aucb%2Fp%2FFD.RWZqlDqeHYKdLMFcQUA--&sid=2219441&pid=878398084"></script>
<br /><br />

<div class="box2">
<script type="text/javascript" src="http://i.yimg.jp/images/shp_front/js/adparts/YahooShoppingAdParts.js"></script>
<script type="text/javascript">
YahooShoppingAdParts({
 api:"itemSearch",
 query:{
  query:decodeURIComponent("<?php echo $keyword; ?>"),
  ad_type:"160_600_itemlist",
  yahoo_color_border:"aaaaaa",
  yahoo_color_link:"0000ff",
  yahoo_color_bg:"ffffff",
  yahoo_color_price:"d50000",
  category_id:"<?php echo $category; ?>",
  availability:"1",
  sort:"-score",
  discount:"",
  shipping:"",
  affiliate_type:"vc",
  affiliate_id:"http%3A%2F%2Fck.jp.ap.valuecommerce.com%2Fservlet%2Freferral%3Fsid%3D3146778%26pid%3D883209894%26vc_url%3D",
  appid:"PV4HEDKxg675dy7DXmu9TR8RSxSq75NeUXTcTid5cWXGa5epw19jO1q4exBWeqQsif97"
 },
 iframe:{
  width:160,
  height:600
 }
})
</script>
</div>
</div>

<?php require("./footer.php"); ?>
</div>

<?php require("./button.php"); ?>
</body>
</html>