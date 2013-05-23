<?php 
	$cards[53];
	$i=1;
	$j=1;
	while ($i<13) {
		$cards[$i] = "Blades"."$j";
		$i++;$j++;
	}
	$j=1;
	while ($i<26) {
		$cards[$i] = "Hearts"."$j";
		$i++;$j++;
	}
	$j=1;
	while ($i<39) {
		$cards[$i] = "Flowers"."$j";
		$i++;$j++;
	}
	$j=1;
	while ($i<52) {
		$cards[$i] = "Dimonds"."$j";
		$i++;$j++;
	}
	
	$cards[52]="Joker1";
	$cards[53]="Joker2";
	
	function getACard(){
		$r = round(rand(0,53));
		return $cards[$r];	
	}
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
抽取一张牌
<br />
<?php 
	$card = getACard();
	echo "$card";
	
	echo $cards[rand(0,53)];
?>
</body>
</html>

