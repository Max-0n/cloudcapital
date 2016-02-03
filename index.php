<?php
	if(!$_GET[page]&&!$_GET[article]) $page=1;
	require('dbconnect.php');
	$sql="SELECT * FROM articles WHERE id>0";
	$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
	$count = mysql_num_rows($result);
	if($_GET[page]*5-$count>4||$_GET[page]<0||$_GET[article]>$count||$_GET[article]<0){
		header('Location: /'); //если нет страницы, вернуть на главную
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="list.css" rel="stylesheet" type="text/css">
		<?php
			if($_GET[article]){
				$sql="SELECT * FROM articles WHERE id='$_GET[article]'";
				$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
				$row = mysql_fetch_assoc($result);
				echo '<title>Облачный капитал - '.$row[title].'</title>
		<meta name="keywords" content="'.$row[keywords].'">
		<meta name="description" content="'.$row[description].'">
		<meta name="author" content="Максим Рожков">
		<link rel="icon" type="image/png" href="/favicon.png" />
		<script type="text/javascript" src="//vk.com/js/api/openapi.js"></script>
		<script type="text/javascript" src="/social.js"></script>
		<script type="text/javascript" src="/max0n.js"></script>
		<script>
		window.onload = function() {
			max0n.launcher();
		}
		</script>
	</head>
	<body>
		<svg width="800" height="200">
		<a xlink:href="/" xlink:title="Облачный капитал" fill="#FFFFFF">';
		include('logo.php');
		echo '
		</a>
		</svg>
		<div id="wrapper"><div id="main"><h1>'.$row[title].'</h1>'.$row[content].'<span>'.$row[date].' | #'.$row[id].'</span></div>
		<div id="likes">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="cl0udcapital" data-lang="ru">Твитнуть</a>
			<div id="vk_like"></div>
		</div>	
		<div id="vk_comments"></div>';
			mysql_close($db);
			}else if ($_GET[page]||$page){
				if($_GET[page])$page = $_GET[page];
				echo '<title>Облачный капитал</title>
		<meta name="keywords" content="Cloud, Capital, Разбогатеть, Инвестирование, ПАММ, PAMM">
		<meta name="description" content="Инвестирование в интернете. На личном примере я показываю как достичь финансовой независимости создав «облачный капитал».">
		<meta name="author" content="Максим Рожков">
		<link rel="icon" type="image/png" href="/favicon.png" />
		<script type="text/javascript" src="/max0n.js"></script>';
		if($page==1)echo'<script type="text/javascript" src="/max0nSVG.js"></script>';
		echo '<script>';
			$sqlcapital="SELECT * FROM capital";
			$resultcapital = mysql_query($sqlcapital) or die("SQL Error: ".mysql_error());
			$countcapital = mysql_num_rows($resultcapital);
			
			echo "arrStats = [[";
				for ($i=0;$i<$countcapital;$i++) {
					$row = mysql_fetch_assoc($resultcapital);
					if($row[link]) echo ('['.$row[percent].',"'.$row[link].'"]');
					else echo ('['.$row[percent].']');
					if(($i+1)%12==0 && ($i+1)<$countcapital)echo "],[";
					else if($i+1<$countcapital)echo ",";
			}echo ']];
		window.onload = function(){
			if(max0n.launcherArray.length>0) max0n.launcher();';
			if($page==1)
			echo'statStory(arrStats);
			document.getElementById("tx2").textContent = arrStats.length+2012;';
			echo'
		}
		</script>
		<style type="text/css">
			a, a:link, a:visited, a:active  {color: #1d1e1e;}
			#main:hover { 
				background: #ccf1ff;
			}
			#main {
				margin: 0px auto 20px;
			}
		</style>
	</head>
	<body>';
		if($page==1) {echo '<svg id="capitalo" width="800" height="270" >
		<g fill="#FFFFFF">';
		include('logo.php');
		echo '</g>
		<g stroke="#fff" fill="#66bad6">
			<rect id="m1" x="50" y="240" width="40" height="0"/>
			<rect id="m2" x="110" y="240" width="40" height="0"/>
			<rect id="m3" x="170" y="240" width="40" height="0"/>
			<rect id="m4" x="230" y="240" width="40" height="0"/>
			<rect id="m5" x="290" y="240" width="40" height="0"/>
			<rect id="m6" x="350" y="240" width="40" height="0"/>
			<rect id="m7" x="410" y="240" width="40" height="0"/>
			<rect id="m8" x="470" y="240" width="40" height="0"/>
			<rect id="m9" x="530" y="240" width="40" height="0"/>
			<rect id="m10" x="590" y="240" width="40" height="0"/>
			<rect id="m11" x="650" y="240" width="40" height="0"/>
			<rect id="m12" x="710" y="240" width="40" height="0"/>
			<polyline stroke-width="2" points="30,240 780,240" />
		</g>
		<svg id="tx0" x="350" y="247" width="100" height="20" opacity="0.1" background="#ccc">
			<g id="tx1">
				<circle cx="10" cy="10" r="10" fill="#555"/>
				<path d="M 2.5 10 L 13.7 3.5 V 16.5 z" fill="#fff"/>
			</g>
			<text id="tx2" x="50" y="16" fill="#555" text-anchor="middle" font-family="Helvetica" font-size="16"></text>
			<g id="tx3" opacity="0">
				<circle cx="90" cy="10" r="10" fill="#555"/>
				<path d="M 97.5 10 L 86.3 3.5 V 16.5 z" fill="#fff"/>
			</g>
		</svg>
		<svg id="tx4" width="70" height="45" opacity="0">
			<rect id="pBox" width="70" height="45" opacity="0.8" fill="#fff" rx="5" ry="5"/>
			<polyline stroke-width="1" stroke="#f1f2f3" points="0,23 70,23" />
			<text fill="#555" font-family="Helvetica" font-size="14" text-anchor="middle">
				<tspan id="tx5" x="35" dy="17"></tspan>
				<tspan id="tx6" x="35" dy="22"></tspan>
			</text>
		</svg>
		
		</svg>';}
		else {echo '<svg width="800" height="200">
			<a xlink:href="/" xlink:title="Облачный капитал" fill="#FFFFFF">';
			include('logo.php');
			echo '
			</a>
			</svg>';
		}
		echo '<div id="wrapper">';
				for($i=$count-5*($page-1);$i>$count-5*$page;$i--){
					$sql2="SELECT * FROM articles WHERE id='$i'";
					$result2 = mysql_query($sql2);
					$row = mysql_fetch_assoc($result2);
					if ($row){
					$ohNo = strpos($row[content], '</p>');
		echo '<a href="?article='.$row[id].'" title="'.$row[keywords].'" id="main">
				<h2>'.$row[title].'</h2>'.substr($row[content], 0, $ohNo).'</p><span>'.$row[date].' | #'.$row[id].'</span></a>';
					}
				}mysql_close($db);
			}
			if(!$_GET[article]){
				echo '<div id="navigation">';
				if(($page*5-$count)<0){
					echo'<a rel="prev" href="?page='.($page+1).'" title="Прошлая страница"><svg width="20" height="20" ><path d="M 2.5 10 L 13.7 3.5 V 16.5 z" fill="#aabac8"/></svg></a>';
				}
				if($page>1){
				
					echo '<a rel="next" href="?page='.($page-1).'" title="Следущая страница"><svg width="20" height="20" ><path d="M 17.5 10 L 6.3 3.5 V 16.5 z" fill="#aabac8"/></svg></a>';
				}
				echo '</div>';
			}?>
			<script>
			if(max0n.launcherArray.length>0) window.onscroll = function() {max0n.launcher();}
			</script>
			<div id="footer">
				<a href="http://vk.com/max0n_up" target="_blank">Copyright &copy; 2013-<?php echo date('Y', time());?>  Максим Рожков. All rights reserved.</a>
			</div>
			<div style="height:0px; overflow:hidden; margin-top: -20px;">
			<!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=23708857&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/23708857/3_0_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:23708857,lang:'ru'});return false}catch(e){}"/></a><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter23708857 = new Ya.Metrika({id:23708857, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/23708857" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
			</div>
		</div>
		<?php
		if(!$_GET[article])echo '
		<div id="buttons">
			<a href="?article=1" title="Как стать инвестором?">От раба до инвестора</a>
			<a href="?article=2" title="Золотые правила инвесторов">Правила инвестора</a>
			<a href="?article=3" title="Как правильно относиться к рискам">Разбор рисков</a>
			<a href="?article=4" title="Виды диверсификации">Диверсификация</a>
			<a href="/case" title="Инвестиционный портфель">Портфель</a>
		</div>';
		?>
	</body>
</html>
