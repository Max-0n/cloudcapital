<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="../list.css" rel="stylesheet" type="text/css">
		<title>Облачный капитал - Портфель инвестора</title>
		<meta name="keywords" content="Cloud, Capital, Разбогатеть, Инвестирование, ПАММ, PAMM, Портфель, Облачный, Капитал">
		<meta name="description" content="Инвестирование в интернете. Мой инвестиционный портфель и его история будут постепенно обновляться.">
		<meta name="author" content="Максим Рожков">
		<link rel="icon" type="image/png" href="../favicon.png" />
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?95"></script>
		<script type="text/javascript" src="../social.js"></script>
		<script type="text/javascript" src="../max0n.js"></script>
		<script type="text/javascript" src="../max0nSVG.js"></script>
		<script>
		window.onload = function () {
			var R = 170,
			<?php require('../dbconnect.php');
				$sqlcapital="SELECT * FROM capital";
				$resultcapital = mysql_query($sqlcapital) or die("SQL Error: ".mysql_error());
				$countcapital = mysql_num_rows($resultcapital);
				echo "arrStats = [[";
				for ($i=0;$i<$countcapital;$i++) {
					$row = mysql_fetch_assoc($resultcapital);
					if($row[link]) echo ('['.$row[percent].',"'.$row[link].'"]');
					else echo ('['.$row[percent].']');
					if(($i+1)%12==0)echo "],[";
					else if($i+1<$countcapital)echo ",";
				}
				echo "]];\n";
			?>
			//alert('arrStats[0][0][0] = '+arrStats[0][0][0]+'\narrStats[0][0][1] = '+arrStats[0][0][1]+'\narrStats[0][0].length = '+arrStats[0][0].length);
			statStory(arrStats); document.getElementById("tx2").textContent = arrStats.length+2012; //для статистики
			angleVal = 0,
			drawPath = new Array(),
			spanArr = new Array(),
			textArr = new Array(),
			rand = getRandomInt(90, 360),
			valArray=[<?php
				$sql="SELECT * FROM cases";
				$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
				$count = mysql_num_rows($result);
				for ($i=0;$row = mysql_fetch_assoc($result);$i++) {
					$valArray[$i][0] = $row[trader];
					$valArray[$i][1] = $row[deposit];
					$valArray[$i][2] = $row[color];
					$valArray[$i][3] = $row["ref-link"];
					$valArray[$i][4] = $row["dealing-room"];
				}
				for ($i=0;$i<$count;$i++) {
					//если цвет отсутствует
					if(!$valArray[$i][2]) {
						$fromRGB = $valArray[$i-1][2];
						$toRGB = '';
						$step = 0;
						//ищем следующий известный RGB
						while(strlen($toRGB)<6){
							$step++;
							if($valArray[$i+$step][2]) {
								$toRGB=$valArray[$i+$step][2];
								$step++;
							}
						}
						//шаг для каждого цвета
						$sR= ((base_convert(substr($toRGB, 1, 2), 16, 10)-base_convert(substr($fromRGB, 1, 2), 16, 10))/$step);
						$sG= ((base_convert(substr($toRGB, 3, 2), 16, 10)-base_convert(substr($fromRGB, 3, 2), 16, 10))/$step);
						$sB= ((base_convert(substr($toRGB, 5, 2), 16, 10)-base_convert(substr($fromRGB, 5, 2), 16, 10))/$step);
						//генерация недостающего цвета
						$valArray[$i][2] = '#';
						$valArray[$i][2] .= base_convert((round(base_convert(substr($fromRGB, 1, 2), 16, 10)+$sR)), 10, 16);
						$valArray[$i][2] .= base_convert((round(base_convert(substr($fromRGB, 3, 2), 16, 10)+$sG)), 10, 16);
						$valArray[$i][2] .= base_convert((round(base_convert(substr($fromRGB, 5, 2), 16, 10)+$sB)), 10, 16);
					}
					//генерируем массив для JS
					echo('["'.$valArray[$i][0].'", '.$valArray[$i][1].', "'.$valArray[$i][2].'", "'.$valArray[$i][3].'", "'.$valArray[$i][4].'"]');
					if($i!=$count-1) echo(",\n");
				}?>];
			for(c=0,capital=0;c<valArray.length;c++){	//Вычисляем капитал:
				capital += valArray[c][1];
			}
			capital=Math.round(capital*100)/100;		//Округление до сотых

			//Функция постоения дуг.
    		function makeArc(value, rad, makeAngle){
				var alpha = 3.6 * (value/(capital/100)),
				angle = (360)/capital*(makeAngle),
				a = (rand-angle-alpha) * Math.PI/180,
				b = (rand-angle) * Math.PI/180,
				sx = 400 + rad * Math.cos(b),
				sy = 250 - rad * Math.sin(b),
				x = 400 + rad * Math.cos(a),
				y = 250 - rad * Math.sin(a),
				path = "M "+sx+","+sy+" A "+rad+","+rad+" 0 "+(+(alpha> 180))+" 1 "+x+","+y;
				return path;
    		}
			//Находим холст для SVG
			var svg = document.getElementById("svg");
			
			for(p=0;p<valArray.length;p++){
				// создаём дуги
				drawPath[p]=document.createElementNS("http://www.w3.org/2000/svg", "path");
				drawPath[p].setAttribute("stroke-width", "10px");
				drawPath[p].setAttribute("stroke", valArray[p][2]);
				drawPath[p].setAttribute("fill", "none");
				drawPath[p].setAttribute("d", makeArc(0,90,0));
				svg.appendChild(drawPath[p]);
				
				(function(p,angleVal){
					//анимированно замкнуть кольцо
					animate({
						duration: 1900,
						delta: makeEaseInOut(quad),
						step: function(delta) {
							drawPath[p].setAttribute("d", makeArc(delta*valArray[p][1],(delta*(R-90))+90,delta*angleVal));
						}
					});
					//анимированно увеличить ширину элементов
					animate({
						el: drawPath[p],
						duration: 1900,
						delta: makeEaseInOut(quad),
						step: function(delta) {
							drawPath[p].setAttribute("stroke-width", (delta*100)+"px");
						}
					});
					//при наведении...
					drawPath[p].onmouseover = function(){
						svg.removeChild(textArr[0]);
						spanArr[2].textContent = valArray[p][4];
						spanArr[3].textContent = valArray[p][0];
						spanArr[4].textContent = '$'+valArray[p][1];
						svg.appendChild(textArr[1]);
						animate({
							el: drawPath[p],
							duration: 2000,
							delta: makeEaseOut(elastic),
							step: function(delta) {
								drawPath[p].setAttribute("stroke-width", (delta*(140-100)+100)+"px");
								drawPath[p].setAttribute("opacity", (delta*(0.4-1)+1));
							}
						});
					};
					//при отводе...
					drawPath[p].onmouseout = function(){
						svg.removeChild(textArr[1]);
						spanArr[0].textContent = 'Capital';
						spanArr[1].textContent = '$'+capital;
						svg.appendChild(textArr[0]);
						animate({
							el: drawPath[p],
							duration: 2000,
							delta: makeEaseOut(elastic),
							step: function(delta) {
								drawPath[p].setAttribute("stroke-width", (delta*(100-140)+140)+"px");
								drawPath[p].setAttribute("opacity", (delta*(1-0.4)+0.4));
							}
						});
					};
					//при клике...
					drawPath[p].onclick = function(){
						window.open(valArray[p][3], "_blank");
					};
				})(p,angleVal);
				//Переменная отступа от начала координат
				angleVal = angleVal+valArray[p][1];				
			}

			//Блоки с текстом
			for(span=0;span<5;span++){						
				if(span<2){
					// создаём текстовые блоки (в которых будут строки «tspan»)
					textArr[span] = document.createElementNS("http://www.w3.org/2000/svg", "text");
					textArr[span].setAttribute("text-anchor", "middle");
					textArr[span].setAttribute("font-family", "Helvetica");
					textArr[span].setAttribute("opacity", "1");
					textArr[span].setAttribute("stroke-width", "0");
					textArr[span].setAttribute("text-rendering", "geometricPrecision");

					//2 строки при отводе мышкой...
					spanArr[span] = document.createElementNS("http://www.w3.org/2000/svg", "tspan");
					spanArr[span].setAttribute("x", "400");
					spanArr[span].setAttribute("dy", "50");
					if(span==0){
						textArr[span].setAttribute("font-size", "40");
						textArr[span].setAttribute("font-weight", "bold");
						textArr[span].setAttribute("y", "190");
						spanArr[0].textContent = 'Capital';
					}
					if(span==1){
						textArr[span].setAttribute("font-size", "22");
						textArr[span].setAttribute("font-weight", "none");
						textArr[span].setAttribute("y", "200");
						spanArr[1].textContent = '$'+capital;
					}
					textArr[0].appendChild(spanArr[span]);
					svg.appendChild(textArr[span]);
				}
				//3 строки при наведении мышкой...
				if(span>=2){
					spanArr[span] = document.createElementNS("http://www.w3.org/2000/svg", "tspan");
					spanArr[span].setAttribute("x", "400");
					spanArr[span].setAttribute("dy", "30");
					textArr[1].appendChild(spanArr[span]);
				}
			}
		}
		</script>
	</head>
	<body>
		<svg id="capitalo" width="800" height="270">
		<a xlink:href="/" xlink:title="Облачный капитал" fill="#fff">
		<?php include "../logo.php";?>
		</a>
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
		<svg>
		</svg>
		<div id="wrapper">
			<div id="main">
				<h1>Облачный портфель</h1>
				<svg id="svg" width="800" height="500" fill="#0088cc" style="background: #f2f7f8;"></svg>
				<p>Я отбираю активы, по нескольким критериям: опыт торговли трейдера, просадка, доходность, капитал в управлении. Со временем, я буду лучше диверсифицировать портфель, вводя новые активы и распределяя между ними «облачный капитал». На данный момент у меня следущие активы:</p>
				<ul><?php
				$sql="SELECT * FROM cases";
				$result = mysql_query($sql) or die("SQL Error: ".mysql_error());
				while ($row = mysql_fetch_assoc($result)) {
					echo('<li><em>'.$row["dealing-room"].':</em> <a href="'.$row["ref-link"].'" target="_blank" rel="nofollow">'.$row[trader]."</a></li>\n");
				}mysql_close($db);?>
				</ul>
			<p>
				<i>Помните! Прошлое активов не гарантирует их прибыльность в будущем. Инвестирование несёт определённые риски, поэтому не инвестируйте деньги, потеря который плохо скажется на вашем состоянии.</i>
			</p>
				<br><br>
			</div>
			<div id="likes">
				<a href="https://twitter.com/share" class="twitter-share-button" data-via="cl0udcapital" data-lang="ru">Твитнуть</a>
				<div id="vk_like"></div>
			</div>		
			<div id="vk_comments"></div>					
			<div id="footer">
				<a href="http://vk.com/max0n_up" target="_blank">Copyright &copy; 2013 Максим Рожков. All rights reserved.</a>
			</div>
			<div style="height:0px; overflow:hidden; margin-top: -20px;">
			<!-- Yandex.Metrika informer --><a href="http://metrika.yandex.ru/stat/?id=23708857&amp;from=informer" target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/23708857/3_0_FFFFFFFF_FFFFFFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:23708857,lang:'ru'});return false}catch(e){}"/></a><!-- /Yandex.Metrika informer --><!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter23708857 = new Ya.Metrika({id:23708857, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/23708857" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
			</div>
		</div>
	</body>
</html>
