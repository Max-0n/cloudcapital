<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
	<?php
	$from = array (2903.5,3365.38,3507.54,2829.92,2890.59,2882.02,3103.23,2921.27,2800.16,2745.95,2719.32,2593.59,2740.03,2597.94,2632.97,2090.85,2284.63,2101.79,2294.79,2260.29,2033.45,2025.16,2045.37);
//15.7
	$dealer = null;
	$oldCapital = 0;
	$capital = 0;

	$db = mysql_connect("37.140.192.204", "u5932866_mysql", "19apl19");
	if (!$db) die('Could not connect to MySQL: ' . mysql_error());
	mysql_select_db("u5932866_mysql",$db);
	mysql_query("SET NAMES 'UTF8'");
	
	$sql="SELECT * FROM cases";
	$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
	$count = mysql_num_rows($result);
	
	echo('Total Actives:'.$count.'<br>toMMGP:');
	echo('<textarea cols="90" rows="33">');
	
	for($i=0;$i<=$count;$i++){
		$sql2="SELECT * FROM cases WHERE id='$i'";
		$result2 = mysql_query($sql2);
		$row = mysql_fetch_assoc($result2);
		$profit = $row[deposit]-$from[$i-1];
		$oldCapital = $oldCapital+$from[$i-1];
		$capital = $capital+$row[deposit];
		
		if($dealer!=$row["dealing-room"]) {
			if($dealer!=null) echo ("[/INDENT]");
			$dealer=$row["dealing-room"];
			if($dealer=="Forex-Trend") echo("\n[B]".$dealer."[/B]\n[INDENT]");
			else echo("\n\n[B]".$dealer."[/B]\n[INDENT]");
		}
		
		if ($row){
			echo $row[trader].': [B]$'.$row[deposit].'[/B] [COLOR="';
				if($profit>0) echo 'Green"]+';
				else if($profit<0) {$profit*=(-1);echo 'Red"]-';}
				else echo 'Grey"]';
			echo '$'.round($profit, 2).' ('.round($profit/$from[$i-1]*100, 2)."%)[/COLOR]\n";
		}
	}
	echo ("[/INDENT]\n");
	
	echo("\nОблачный капитал: [B]$".$capital.'[/B] [COLOR="');
		$totalProfit = $capital-$oldCapital;
		if($totalProfit>0) echo 'Green"][B]+$';
		else if($totalProfit<0) {$totalProfit*=(-1); echo 'Red"][B]-$';}
		else echo 'Grey"][B]$';
	
	echo(round($totalProfit, 2).' ('.round($totalProfit/$oldCapital*100, 2).'%)[/B][/COLOR]');
	
	echo ("</textarea><br>");
	
	//для сайта ниже: ###############################################################
	$dealer = null;
	$oldCapital = 0;
	$capital = 0;
	echo('<br>toWebSite:<textarea cols="195" rows="35" style="background:#ccf1ff;">');
	for($i=0;$i<=$count;$i++){
		$sql2="SELECT * FROM cases WHERE id='$i'";
		$result2 = mysql_query($sql2);
		$row = mysql_fetch_assoc($result2);
		$profit = $row[deposit]-$from[$i-1];
		$oldCapital = $oldCapital+$from[$i-1];
		$capital = $capital+$row[deposit];
		
		
		if($dealer!=$row["dealing-room"]) {
			if($dealer!=null)echo ("</ul>");
			$dealer=$row["dealing-room"];
			if($dealer=="Forex-Trend")
				echo("\n".'<p><a href="http://fx-trend.com/pamm/rating?agent=530918" title="ПАММ\'ы  Fx-trend" rel="nofollow" target="_blank"><em>Fx-trend</em></a></p>'."\n<ul>\n");
			else if($dealer=="Panteon")
				echo("\n\n".'<p><a href="http://panteon-finance.com/invite/to295950.html" title="Регистрация в Panteon Finance" rel="nofollow" target="_blank"><em>Panteon</em></a></p>'."\n<ul>\n");
		}
		
		if ($row){
			echo "\t".'<li><a href="'.$row["ref-link"].'" title="ПАММ\'ы  '.$row["dealing-room"].'" rel="nofollow" target="_blank">'.$row[trader].'</a>: <b>$'.$row[deposit].'</b> <font color="';
				if($profit>0) echo 'green">+';
				else if($profit<0) {$profit*=(-1);echo 'red">-';}
				else echo 'grey">';
			echo '$'.round($profit, 2).'<i> ('.round($profit/$from[$i-1]*100, 2)."%)</i></font></li>\n";
		}
	}
	echo ("</ul>\n");
	
	echo('<p><a href="http://cloudcapital.ru/case" title="Облачный капитал" target="_blank"><em>Облачный капитал:</em></a> <b>$'.$capital.'</b> <font color="');
		$totalProfit = $capital-$oldCapital;
		if($totalProfit>0) echo 'green">+$';
		else if($totalProfit<0) {$totalProfit*=(-1); echo 'red">-$';}
		else echo 'grey">$';
	
	echo(round($totalProfit, 2).'<i> ('.round($totalProfit/$oldCapital*100, 2).'%)</i></font></p>');
	
	echo ("</textarea><br>\n\n");

	echo 'Массив депозитов:<br>arr = (';
		for($i=1;$i<=$count;$i++){
			$sql2="SELECT * FROM cases WHERE id='$i'";
			$result2 = mysql_query($sql2);
			$row = mysql_fetch_assoc($result2);
			echo $row[deposit];
			if($i==$count) echo '';
			else echo ',';
		}
	echo ');';
	mysql_close($db);
	
	echo("<br>[X,".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10).",".(rand(10, 30)/10)."]");
	?>	
	
	
	
	
	</body>
</html>
