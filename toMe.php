<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="http://cloudcapital.ru/max0n.js"></script>
			<style>
				#eg {
					color: #66ace1;
				}
			</style>
		<script>window.onload = function(){
			if(max0n.launcherArray.length>0) max0n.launcher();}
		</script>
	</head>
	<body>

		<div style="border: 1px dotted #aaa; height: 800px; width: 800px; text-align: center; ">
		<svg style="width: 800px; height: 400px; ">
			<defs>
				<linearGradient id="grad1" x1="0%" y1="100%" x2="0%" y2="0%">
					<stop offset="-10%" style="stop-color:#66ace1; stop-opacity:0.1" />
					<stop offset="100%" style="stop-color:#66ace1;stop-opacity:0.8" />
				</linearGradient>
			</defs>
			<g stroke="#9a9b9c" >
				<circle cx="40" cy="200" r="1" />
				<circle cx="40" cy="40" r="1" />
				<circle cx="40" cy="360" r="1" />
				<circle cx="100" cy="360" r="1" />
				<circle cx="160" cy="360" r="1" />
				<circle cx="220" cy="360" r="1" />
				<circle cx="280" cy="360" r="1" />
				<circle cx="340" cy="360" r="1" />
				<circle cx="400" cy="360" r="1" />
				<circle cx="460" cy="360" r="1" />
				<circle cx="520" cy="360" r="1" />
				<circle cx="580" cy="360" r="1" />
				<circle cx="640" cy="360" r="1" />
				<circle cx="700" cy="360" r="1" />
				<circle cx="760" cy="360" r="1" />
				<line x1="40" y1="40" x2="40" y2="360" />
				<line x1="40" y1="360" x2="760" y2="360" />
				<g stroke-dasharray="2,5" opacity="0.4">
					<line x1="40" y1="40" x2="760" y2="40"/>
					<line x1="40" y1="200" x2="760" y2="200"/>
					<line x1="100" y1="40" x2="100" y2="360"/>
					<line x1="160" y1="40" x2="160" y2="360"/>
					<line x1="220" y1="40" x2="220" y2="360"/>
					<line x1="280" y1="40" x2="280" y2="360"/>
					<line x1="340" y1="40" x2="340" y2="360"/>
					<line x1="400" y1="40" x2="400" y2="360"/>
					<line x1="460" y1="40" x2="460" y2="360"/>
					<line x1="520" y1="40" x2="520" y2="360"/>
					<line x1="580" y1="40" x2="580" y2="360"/>
					<line x1="640" y1="40" x2="640" y2="360"/>
					<line x1="700" y1="40" x2="700" y2="360"/>
					<line x1="760" y1="40" x2="760" y2="360"/>
				</g>
			</g>
			<text x="400" y="380" fill="#555" text-anchor="middle">
				<tspan x="70">ЯНВ</tspan>
				<tspan x="130">ФЕВ</tspan>
				<tspan x="190">МАР</tspan>
				<tspan x="250">АПР</tspan>
				<tspan x="310">МАЙ</tspan>
				<tspan x="370">ИЮН</tspan>
				<tspan x="430">ИЮЛ</tspan>
				<tspan x="490">АВГ</tspan>
				<tspan x="550">СЕН</tspan>
				<tspan x="610">ОКТ</tspan>
				<tspan x="670">НОЯ</tspan>
				<tspan x="730">ДЕК</tspan>
				<tspan x="22" y="45">150%</tspan>
				<tspan x="20" y="205">125%</tspan>
				<tspan x="20" y="365">100%</tspan>			
			</text>
			<path  id="chart1" stroke="#66ace1" stroke-linecap="butt" fill="none" stroke-width="2"/>
			<path  id="chart2" fill="url(#grad1)"/>
		</svg>
		<script>
			max0n.launcherArray.push(["chart1",function(){
				var arrWeeks = [[0.28,-1.47,0.23,1.83],
							[-0.18,1.37,0.73,0.97],
							[1.26,-0.52,0.12,0.42,0.72],
							[1.82,0.73,0.84,0.82],
							[-0.95,0.59,1.27,1.8,1.17],
							[1.78,0.33,1.77,0.16],
							[1.03,1.03,1.34,0.98],
							[1.67,1.08,2.03,-2.99,0.71],
							[1.29,1.51,1.38,1.57],
							[1.26,-1.06,-1.34,1.39,0.69],
							[0.85,0.74,1.83,-1.19],
							[0.88,1.06,1.37,1.35]];
				chart1 = document.getElementById("chart1");
				chart2 = document.getElementById("chart2");
				animate({
					el : chart1,
					duration: 1500,
					delta: makeEaseOut(back, 1.5),
					step: function(delta) {
						chart1.setAttribute("d", "M40 360");
						chart2.setAttribute("d", "M40 360");
						cashWeeks = 100;
						for(var i=0; i<arrWeeks.length; i++){
							
							for(var j=0; j<arrWeeks[i].length; j++){
							
								cashWeeks = cashWeeks+(cashWeeks*arrWeeks[i][j])/100;
								casHeight = (Math.round((cashWeeks-100)*100)/100);
								if(arrWeeks[i].length==4){
									chart1.setAttribute("d", chart1.getAttribute("d")+" L"+(40+(60*i)+15+(15*j))+" "+(360-casHeight*delta*6.4));
									chart2.setAttribute("d", chart2.getAttribute("d")+" L"+(40+(60*i)+15+(15*j))+" "+(360-casHeight*delta*6.4));
								}
								if(arrWeeks[i].length==5){
									chart1.setAttribute("d", chart1.getAttribute("d")+" L"+(40+(60*i)+12+(12*j))+" "+(360-casHeight*delta*6.4));
									chart2.setAttribute("d", chart2.getAttribute("d")+" L"+(40+(60*i)+12+(12*j))+" "+(360-casHeight*delta*6.4));
								}
							}
						}
					chart2.setAttribute("d", chart2.getAttribute("d")+" L760 360");
					}
				});
			}]);
		</script>
		<div style="background: #f2f7f8; height:400px; width:800px;">
		<div style="width: 714px; float: left; margin: 42px; color: #fff;">
			<div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px;"></div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">1 неделя</div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">2 неделя</div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">3 неделя</div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">4 неделя</div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">5 неделя</div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">За месяц</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ЯНВ</div>
				<div style="margin: 1px; background: #55d881; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.28%</div>
				<div style="margin: 1px; background: #f76969; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-1.47%</div>
				<div style="margin: 1px; background: #55d881; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.23%</div>
				<div style="margin: 1px; background: #55d881; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.83%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc; padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.89%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ФЕВ</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-0.18%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.37%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.73%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.97%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+3.03%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">МАР</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.26%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-0.52%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.12%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.42%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.72%</div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+2%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">АПР</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.82%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.73%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.84%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.82%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+4.25%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">МАЙ</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-0.95%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-0.59%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.27%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.8%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.17%</div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+4.01%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ИЮН</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.78%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.33%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.77%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.16%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+4.15%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ИЮЛ</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.03%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.03%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.34%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.98%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+4.45%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">АВГ</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.67%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.08%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+2.03%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-2.99%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.71%</div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+2.43%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">СЕН</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.29%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.51%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.38%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.57%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+5.88%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ОКТ</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.26%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-1.06%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-1.34%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.39%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.69%</div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.89%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">НОЯ</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.85%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.74%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.83%</div>
				<div style="margin: 1px; background: #f76969;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">-1.19%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+2.2%</div>
			</div>
			<div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">ДЕК</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+0.88%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.06%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.37%</div>
				<div style="margin: 1px; background: #55d881;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+1.35%</div>
				<div style="margin: 1px; float: left; width: 100px; height: 22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #50c9cc;padding: 2px 0px; float: left; width: 100px; border-radius: 5px;">+4.74%</div>
			</div>
			<div>
				<div style="float: left; width: 510px; height:22px; border-radius: 5px;"></div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 5px 0px 0 5px;">2014 год:</div>
				<div style="margin: 1px; background: #66ace1;padding: 2px 0px; float: left; width: 100px; border-radius: 0 5px 5px 0;">+46.49%</div>
			</div>
		</div>
		</div>
		</div>
		<script>
			if(max0n.launcherArray.length>0) window.onscroll = function() {max0n.launcher();}
		</script>
	</body>
</html>