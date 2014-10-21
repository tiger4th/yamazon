<?php require("./curl_item.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="amazon,アマゾン,ヤフー,Yahoo!,ショッピング,オークション,商品<?php
if($id!=1){
	echo ",".str_replace("、", ",", $res["ResultSet"][0]["Result"][$code]["Category"]["Current"]["Name"]);
}
?>" />
<meta name="description" content="<?php
if($id==1){
	echo "Yamazonは通販商品検索サービスです。Yahoo!ショッピングの商品を見やすい画面で簡単に探すことができます。";
}else{
	echo $res["ResultSet"][0]["Result"][$code]["Category"]["Current"]["Name"]."の通販ならyamazon。YamazonはYahoo!ショッピングの商品検索サービスです。";
}
?>" />
<meta http-equiv="content-Style-type" content="text/css" />
<meta http-equiv="content-Script-type" content="text/javascript" />
<title><?php echo "Yamazon: ".$res["ResultSet"][0]["Result"][$code]["Name"].": ".$res["ResultSet"][0]["Result"][$code]["Category"]["Current"]["Name"]; ?></title>
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

<?php require("./item_detail.php"); ?>

<?php require("./footer.php"); ?>

<?php require("./button.php"); ?>
</body>
</html>