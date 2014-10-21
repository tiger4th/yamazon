<?php
echo '<span class="sm bold orange">カテゴリー</span><br />';

$i=1;
foreach($resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Path"] as $item){
	if (is_array($item) && $item["Id"]!=1) {
		echo '<span class="sm">';
		for($j = 1; $j <= $i; $j++){
			echo "&nbsp;&nbsp;";
		}
		echo '</span>';
		if($item["Id"]==$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Id"]){
			echo '<span class="sm bold">'.$resC["ResultSet"][0]["Result"]["Categories"]["Current"]["Title"]["Short"].'</span><br />';
		}else{
			echo '<a href="./index.php?id='.$item["Id"].'&sort='.$sort.'"><span class="sm">&#139;&nbsp;'.$item["Title"]["Name"].'</span></a><br />';
		}
		$i++;
	}
}

foreach($resC["ResultSet"][0]["Result"]["Categories"]["Children"] as $item){ 
	if(isset($item["Title"]["Short"])){
		echo '<span class="sm">';
		for($j = 1; $j <= $i; $j++){
			echo "&nbsp;&nbsp;";
		}
		echo '</span>';
		echo '<a href="./index.php?id='.$item["Id"].'&sort='.$sort.'"><span class="sm">'.$item["Title"]["Short"].'</span></a><br />';
	}
}

?>