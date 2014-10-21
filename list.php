<div class="boxnb" align="left">

<?php if(!isset($tweet)){ ?>

<?php foreach($res["ResultSet"][0]["Result"] as $key => $item){ ?>
<?php if(!is_int($key)){continue;}?>

<div class="data">
<table summary="商品リスト">
<tr>
<td valign="top"><span class="xs"><?php echo $start+$key; ?>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>

<td>&nbsp;&nbsp;
<a href="item.php?id=<?php echo $id; ?>&sort=<?php echo $sort; ?>&start=<?php echo $start; ?>&query=<?php echo $query; ?>&code=<?php echo $key; ?>"><img src="<?php echo $item["Image"]["Small"]; ?>" border="0" alt="<?php echo $item["Name"]; ?>" /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td><a href="item.php?id=<?php echo $id; ?>&sort=<?php echo $sort; ?>&start=<?php echo $start; ?>&query=<?php echo $query; ?>&code=<?php echo $key; ?>"><span class="sm bold"><?php echo $item["Name"]; ?></span></a><br />
<span class="sm red bold">&yen; <?php echo number_format($item["Price"]["_value"]); ?></span><br />
<?php if($item["Point"]["Amount"] > 0){ ?>
<span class="xs">ポイント：<span class="red"><?php echo number_format($item["Point"]["Amount"]); ?> pt
<?php if($item["Point"]["Times"] > 1){ ?>
 (<?php echo number_format($item["Point"]["Times"]); ?>倍)
<?php } ?>
</span></span>
<br />
<?php } ?>
<?php if($item["Review"]["Rate"] > 0){ ?>
<a href="<?php echo $item["Review"]["Url"]; ?>" target="_blank"><img src="./image/<?php echo sprintf("%01.2f", round($item["Review"]["Rate"] * 2) / 2); ?>.gif" border="0" alt="<?php echo sprintf("%01.2f", round($item["Review"]["Rate"] * 2) / 2); ?>" /></a>
<span class="xs"> (<a href="<?php echo $item["Review"]["Url"]; ?>" target="_blank"><?php echo number_format($item["Review"]["Count"]); ?></a>)</span><br />
<?php } ?>
<?php if($item["Shipping"]["Code"] > 1){echo '<span class="xs bold">'.$item["Shipping"]["Name"].'</span><br />';} ?>
</td>
</tr>
</table>
<br />
</div>
<?php } ?>

<?php } else {?>
<?php foreach($tweet as $item){ ?>
<?php echo $item["text"]; ?>
<?php } ?>
<?php }?>

</div>