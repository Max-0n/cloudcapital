<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
	<?php
	$from = array (3290.56,3191.92,3364.89,2829.92,2854.22,3004.92,3020.11,2912.64,2666.29,2691.3,2588.87,2447.99,2695.53,2597.94,2632.97,2210.6,2284.63,2101.79,2294.79,2260.29,1991.2,2025.16,2045.37);
//15.7
	$dealer = null;
	$oldCapital = 0;
	$capital = 55940.74;

	$db = mysql_connect("37.140.192.204", "u5932866_mysql", "19apl19");
	if (!$db) die('Could not connect to MySQL: ' . mysql_error());
	mysql_select_db("u5932866_mysql",$db);
	mysql_query("SET NAMES 'UTF8'");
	
	$sql="SELECT * FROM cases";
	$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
	$count = mysql_num_rows($result);
	
	echo('Total Actives:'.$count.'<br><br>');
	echo('toMMGP:<textarea cols="90" rows="31">');
	
	for($i=0;$i<=$count;$i++){
		$sql2="SELECT * FROM cases WHERE id='$i'";
		$result2 = mysql_query($sql2);
		$row = mysql_fetch_assoc($result2);

		if($dealer!=$row["dealing-room"]) {
			if($dealer!=null)echo ("[/INDENT]");
			$dealer=$row["dealing-room"];
			if($dealer=="Forex-Trend")
			echo("\n\n[B]".'[URL="http://fx-trend.com/ru/pamm/agent/530918/"]'.$dealer."[/URL][/B]\n[INDENT]");
			if($dealer=="Panteon")
			echo("\n\n[B]".'[URL="http://panteon-finance.com/invite/to295950.html"]'.$dealer."[/URL][/B]\n[INDENT]");
		}
		
		if ($row){
			echo '[URL="'.$row["ref-link"].'"]'.$row[trader].'[/URL]: [B]'.round(($row[deposit]/$capital*100),2)."%[/B]\n";
		}
	}
	echo ("[/INDENT]\n</textarea><br>");
	mysql_close($db);?>	
	</body>
</html>