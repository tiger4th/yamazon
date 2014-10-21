<div id="header">
<div id="boxlogo" align="center">
<?php echo '<a href="./index.php?id=1&sort='.$sort.'"><img src="./image/logo.png" border="0" alt="yamazon" /></a>'; ?>
</div>

<div id="ad">
<!-- admax -->
<script type="text/javascript" src="http://adm.shinobi.jp/s/3a9112ad497e868568d15747e01cfddd"></script>
<!-- admax -->
</div>

</div>

<div id="search">
<form action="index.php" method="get">

<table>
<tr>
<td width="50px">
<span class="smw bold">検索&nbsp;&nbsp;</span>
</td>
<td>
<select name="id" class="id">
<option value="1"<?php if($id == "1"){echo ' selected="selected"';} ?>>すべてのカテゴリー</option>
<option value="13457"<?php if($id == "13457"){echo ' selected="selected"';} ?>>ファッション</option>
<option value="2498"<?php if($id == "2498"){echo ' selected="selected"';} ?>>食品</option>
<option value="2500"<?php if($id == "2500"){echo ' selected="selected"';} ?>>ダイエット、健康</option>
<option value="2501"<?php if($id == "2501"){echo ' selected="selected"';} ?>>コスメ、香水</option>
<option value="2502"<?php if($id == "2502"){echo ' selected="selected"';} ?>>パソコン、周辺機器</option>
<option value="2504"<?php if($id == "2504"){echo ' selected="selected"';} ?>>AV機器、カメラ</option>
<option value="2505"<?php if($id == "2505"){echo ' selected="selected"';} ?>>家電</option>
<option value="2506"<?php if($id == "2506"){echo ' selected="selected"';} ?>>家具、インテリア</option>
<option value="2507"<?php if($id == "2507"){echo ' selected="selected"';} ?>>花、ガーデニング</option>
<option value="2508"<?php if($id == "2508"){echo ' selected="selected"';} ?>>キッチン、生活雑貨、日用品</option>
<option value="2503"<?php if($id == "2503"){echo ' selected="selected"';} ?>>DIY、工具、文具</option>
<option value="2509"<?php if($id == "2509"){echo ' selected="selected"';} ?>>ペット用品、生き物</option>
<option value="2510"<?php if($id == "2510"){echo ' selected="selected"';} ?>>楽器、趣味、学習</option>
<option value="2511"<?php if($id == "2511"){echo ' selected="selected"';} ?>>ゲーム、おもちゃ</option>
<option value="2497"<?php if($id == "2497"){echo ' selected="selected"';} ?>>ベビー、キッズ、マタニティ</option>
<option value="2512"<?php if($id == "2512"){echo ' selected="selected"';} ?>>スポーツ</option>
<option value="2513"<?php if($id == "2513"){echo ' selected="selected"';} ?>>レジャー、アウトドア</option>
<option value="2514"<?php if($id == "2514"){echo ' selected="selected"';} ?>>自転車、車、バイク用品</option>
<option value="2516"<?php if($id == "2516"){echo ' selected="selected"';} ?>>CD、音楽ソフト</option>
<option value="2517"<?php if($id == "2517"){echo ' selected="selected"';} ?>>DVD、映像ソフト</option>
<option value="10002"<?php if($id == "10002"){echo ' selected="selected"';} ?>>本、雑誌、コミック</option>
</select>
</td>
<td width="80%">
<input type="text" name="query" class="query" value="<?php echo $query; ?>">
</td>
<td>
<input type="image" src="./image/go.gif" alt="GO">
</td>
<td>
&nbsp;
</td>
<td>
<a href="https://odhistory.shopping.yahoo.co.jp/cgi-bin/cart-list" target="_blank"><img src="./image/btnb.gif" border="0" alt="カートを見る" /></a>
</td>
</tr>
</table>
</form>
</div>
