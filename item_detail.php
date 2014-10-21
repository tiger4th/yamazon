<div class="item_wrap">

<div class="item_detail">

<div class="item_name">
<span class="la"><?php echo $res["ResultSet"][0]["Result"][$code]["Name"]; ?></span><br />
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Url"]; ?>" target="_blank"><span class="xs"><?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Name"]; ?></span></a><br />

<?php if($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] > 0){ ?>
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Review"]["Url"]; ?>" target="_blank"><img src="./image/<?php echo sprintf("%01.2f", round($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] * 2) / 2); ?>.gif" border="0" alt="<?php echo sprintf("%01.2f", round($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] * 2) / 2); ?>" /></a>
<span class="xs"> (<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Review"]["Url"]; ?>" target="_blank"><?php echo number_format($res["ResultSet"][0]["Result"][$code]["Review"]["Count"]); ?>件のカスタマーレビュー</a>)</span><br />
<?php } ?>
</div>

<div class="note">
<table summary="商品情報">

<?php if($dprice > $price){ ?>
<tr>
<td align="right">
<span class="xs gray">参考価格：</span>
</td>
<td>
<span class="sm"><s>￥ <?php echo number_format($dprice); ?></s></span>
</td>
</tr>
<?php } ?>

<tr>
<td align="right">
<span class="xs gray">価格：</span>
</td>
<td>
<span class="la red bold">￥ <?php echo number_format($price); ?></span>
<?php if($res["ResultSet"][0]["Result"][$code]["Shipping"]["Code"] > 1){echo '<span class="sm bold">'.$res["ResultSet"][0]["Result"][$code]["Shipping"]["Name"].'</span>';} ?>
</td>
</tr>

<?php if($dprice > $price){ ?>
<tr>
<td align="right">
<span class="xs gray">OFF：</span>
</td>
<td>
<span class="sm red">￥ <?php
$off = $dprice - $price;
echo number_format($off);
?>
&nbsp;(<?php echo round($off * 100 / $dprice); ?>%)</span>
</td>
</tr>
<?php } ?>

<?php if($res["ResultSet"][0]["Result"][$code]["Point"]["Amount"] > 0){ ?>
<tr>
<td align="right">
<span class="xs gray">ポイント：</span>
</td>
<td>
<span class="sm red"><?php echo number_format($res["ResultSet"][0]["Result"][$code]["Point"]["Amount"]); ?> pt
<?php if($res["ResultSet"][0]["Result"][$code]["Point"]["Times"] > 1){ ?>
 (<?php echo number_format($res["ResultSet"][0]["Result"][$code]["Point"]["Times"]); ?>倍)
<?php } ?></span>
</td>
</tr>
<?php } ?>
</table>

<?php if($res["ResultSet"][0]["Result"][$code]["Availability"] == "instock"){ ?>
<div class="item_stock"><span class="sm bold green">在庫あり。</span></div>
<?php }elseif($res["ResultSet"][0]["Result"][$code]["Availability"] == "outofstock"){ ?>
<div class="item_stock"><span class="sm bold red">現在お取り扱いできません。</span></div>
<?php } ?>

<div class="item_button">
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Url"]."#ItemInfo"; ?>" target="_blank"><img src="./image/btny.gif" border="0" alt="ストアの売り場へ行く" /></a>
&nbsp;
<?php if($res["ResultSet"][0]["Result"][$code]["Review"]["Count"] > 0){ ?>
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Review"]["Url"]; ?>" target="_blank"><img src="./image/btnw.gif" border="0" alt="カスタマーレビューを見る" /></a>
<?php } ?>
</div>

</div>
</div>
</div>

<div class="item_image" align="center">
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Url"]."#ItemInfo"; ?>" target="_blank"><img src="<?php echo $res["ResultSet"][0]["Result"][$code]["Image"]["Medium"]; ?>" border="0" alt="<?php echo $res["ResultSet"][0]["Result"][$code]["Name"]; ?>"></a>
</div>


<?php if($res["ResultSet"][0]["Result"][$code]["Description"] != ""){ ?>
<div class="info_box">
<div class="note">
<span class="bold orange">商品の説明</span>
<div class="info">
<span class="sm"><?php echo str_replace("。", "。<br />", $res["ResultSet"][0]["Result"][$code]["Description"]); ?></span>
</div>
</div>
</div>
<?php } ?>


<?php if($res["ResultSet"][0]["Result"][$code]["JanCode"] != "" || $res["ResultSet"][0]["Result"][$code]["IsbnCode"] != "" || $res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] > 0){ ?>
<div class="info_box">
<div class="note">
<span class="bold orange">登録情報</span>
<div class="info">
<?php if($res["ResultSet"][0]["Result"][$code]["Model"] != ""){ ?>
<span class="sm bold">型番:</span><span class="sm">&nbsp;<?php echo $res["ResultSet"][0]["Result"][$code]["Model"]; ?></span>
<br />
<?php } ?>
<?php if($res["ResultSet"][0]["Result"][$code]["JanCode"] != ""){ ?>
<span class="sm bold">JAN:</span><span class="sm">&nbsp;<?php echo $res["ResultSet"][0]["Result"][$code]["JanCode"]; ?></span>
<br />
<?php } ?>
<?php if($res["ResultSet"][0]["Result"][$code]["IsbnCode"] != ""){ ?>
<span class="sm bold">ISBN:</span><span class="sm">&nbsp;<?php echo $res["ResultSet"][0]["Result"][$code]["IsbnCode"]; ?></span>
<br />
<?php } ?>
<?php if($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] > 0){ ?>
<span class="sm bold">おすすめ度：</span>
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Review"]["Url"]; ?>" target="_blank"><img src="./image/<?php echo sprintf("%01.2f", round($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] * 2) / 2); ?>.gif" border="0" alt="<?php echo sprintf("%01.2f", round($res["ResultSet"][0]["Result"][$code]["Review"]["Rate"] * 2) / 2); ?>" /></a>
<span class="xs"> (<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Review"]["Url"]; ?>" target="_blank"><?php echo number_format($res["ResultSet"][0]["Result"][$code]["Review"]["Count"]); ?>件のカスタマーレビュー</a>)</span><br />
<?php } ?>
</div>
</div>
</div>
<?php } ?>


<div class="info_box">
<div class="note">
<span class="bold orange">このページをご覧になっているお客様におすすめのスポンサーリンクはこちら</span>
<div class="info">
<!-- admax -->
<script type="text/javascript" src="http://adm.shinobi.jp/s/c74b41a83ba7a1a27b179a7cc9a8fc0c"></script>
<!-- admax -->
</div>
</div>
</div>


<?php if($res["ResultSet"][0]["Result"][$code]["Store"]["Name"] != ""){ ?>
<div class="info_box">
<div class="note">
<span class="bold orange">ストア情報</span>
<div class="info">
<a href="<?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Url"]; ?>" target="_blank">
<img src="<?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Image"]["Medium"]; ?>" border="0" alt="<?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Name"]; ?>"><br />
<span class="sm"><?php echo $res["ResultSet"][0]["Result"][$code]["Store"]["Name"]; ?></span><br />
</a>
<span class="sm bold">ストア評価：</span>
<img src="./image/<?php echo sprintf("%01.2f", $res["ResultSet"][0]["Result"][$code]["Store"]["Ratings"]["Rate"]); ?>.gif" border="0" alt="<?php echo sprintf("%01.2f", $res["ResultSet"][0]["Result"][$code]["Store"]["Ratings"]["Rate"]); ?>" />
<span class="xs"> (<?php echo number_format($res["ResultSet"][0]["Result"][$code]["Store"]["Ratings"]["Count"]); ?>件のカスタマーレビュー)</span><br />
<?php if($res["ResultSet"][0]["Result"][$code]["Store"]["IsBestStore"] == "true"){ ?>
<span class="sm">Yahoo!ショッピングベストストア受賞ストア</span><br />
<?php } ?>
</div>
</div>
</div>
<?php } ?>


<?php if($resR["ResultSet"]["totalResultsReturned"] > 0){ ?>
<div class="info_box">
<div class="note">
<span class="bold orange">このストアのカスタマーレビュー</span>
<div class="info">
<?php foreach($resR["ResultSet"]["Result"] as $item){ ?>
<?php if($item["Recommend"] > 0){ ?>
<span class="sm"><?php echo $item["Recommend"]; ?>人の方が、｢このレビューが参考になった｣と投票しています。</span><br />
<?php } ?>
<img src="./image/<?php echo $item["Ratings"]["Rate"]; ?>.gif" alt="<?php echo $item["Ratings"]["Rate"]; ?>点" />
<span class="sm bold"><?php echo $item["ReviewTitle"]; ?></span><span class="sm">, <?php
	$time = substr($item["Update"], 0, 10);
	$time = str_replace('-', '/', $time);
	echo $time; 
?></span><br />
<span class="xs bold orange">レビュー対象商品: </span><a href=<?php echo $item["Target"]["Url"]."#ItemInfo"; ?> target="_blank"><span class="xs bold"><?php echo $item["Target"]["Name"]; ?></span></a><br />
<span class="sm"><?php echo $item["Description"]; ?></span><br />
<br />
<?php } ?>
</div>
</div>
</div>
<?php } ?>


<div class="info_box">
<div class="note">
<span class="bold orange">おすすめ商品</span>
<div class="info">
<script type="text/javascript" src="http://i.yimg.jp/images/shp_front/js/adparts/YahooShoppingAdParts.js"></script><script type="text/javascript">YahooShoppingAdParts({api:"contentMatchItem",query:{url:window.location.href,ad_type:"728_120_itemlinelist",yahoo_color_border:"ffffff",yahoo_color_link:"003399",yahoo_color_bg:"ffffff",yahoo_color_price:"990000",affiliate_type:"yid",affiliate_id:"FD.RWZqlDqeHYKdLMFcQUA--",appid:"PV4HEDKxg675dy7DXmu9TR8RSxSq75NeUXTcTid5cWXGa5epw19jO1q4exBWeqQsif97"},iframe:{width:728,height:120}})</script>
</div>
</div>
</div>


<?php if(isset($resC["ResultSet"])){ ?>
<div class="info_box">
<div class="note">
<span class="bold orange">関連商品を探す</span>
<div class="info">
<?php
if($id==1){
	echo '<a href="./index.php?id=1&sort='.$sort.'"><span class="sm">すべてのカテゴリー</span></a>';
}else{
	foreach($resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Path"] as $item){
		if (is_array($item)) {
			if($item["Id"]==1){
				echo '<a href="./index.php?id=1&sort='.$sort.'"><span class="sm">すべてのカテゴリー</span></a>';
			}elseif($item["Id"]==$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"]){
				echo '<span class="sm"> > </span><a href="./index.php?id='.$item["Id"].'&sort='.$sort.'"><span class="sm">'.$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Short"].'</span></a>';
			}else{
				echo '<span class="sm"> > </span><a href="./index.php?id='.$item["Id"].'&sort='.$sort.'"><span class="sm">'.$item["Title"]["Name"].'</span></a>';
			}
		}
	}
}
?>
</div>
</div>
</div>
<?php } ?>


<!-- admax -->
<script type="text/javascript" src="http://adm.shinobi.jp/s/7845e27c473521a10aa868e5344061dc"></script>
<!-- admax -->