// ---------- Показ и обработка статистики ------------ */
function statStory(arrStats) {
	//показать статистику последнего года
	showStat(arrStats[arrStats.length-1]);
	var arrText = new Array(),
	svgStats = document.getElementById("capitalo");
	//Определяем текстовые теги
	for(cap=0;cap<4;cap++){
		arrText[cap]=document.getElementById("tx"+(cap));
	}
	//при наведении...
	svgStats.onmouseover = function(){
		arrText[0].setAttribute("opacity", 0.7);
	};
	//при отводе...
	svgStats.onmouseout = function(){
		arrText[0].setAttribute("opacity", 0.1);
	};
	//при нажатии на стрелку влево...
	arrText[1].onclick = function(){
		if(arrText[2].textContent>2013){
			arrText[2].textContent = --arrText[2].textContent;
			showStat(arrStats[arrText[2].textContent-2013]);
		}
		if(arrText[2].textContent==2013)arrText[1].setAttribute("opacity", 0);
		if(arrText[2].textContent<arrStats.length+2012 && arrText[3].getAttribute("opacity")!=1) arrText[3].setAttribute("opacity", 1);
	}
	//при нажатии на стрелку вправо...
	arrText[3].onclick = function(){
		if(arrText[2].textContent<arrStats.length+2012){
			arrText[2].textContent = ++arrText[2].textContent;
			showStat(arrStats[arrText[2].textContent-2013]);
			if(arrText[1].getAttribute("opacity")!=1) arrText[1].setAttribute("opacity", 1);
		}
	if(arrText[2].textContent==arrStats.length+2012) arrText[3].setAttribute("opacity", 0);
	}
}

//Функция анимированного показа истории статистики
function showStat(arrShow){
	var arrRect = new Array(),
	arrText = new Array();
	for(cap=0;cap<3;cap++){
		arrText[cap]=document.getElementById("tx"+(4+cap));
	}
	//анимация появления ежемесячной статистики
	animate({
		el: arrRect[0],
		duration: 5000,
		delta: makeEaseOut(elastic),
		step: function(delta) {
			for(var cap=0;cap<12;cap++){
				arrRect[cap].setAttribute("height", Math.round((delta*Math.abs(arrShow[cap][0])*15)*100)/100);
				if(arrShow[cap][0]>0) arrRect[cap].setAttribute("y", 240-Math.round((delta*Math.abs(arrShow[cap][0])*15)*100)/100 );
				else if(arrRect[cap].getAttribute("y")!=240) arrRect[cap].setAttribute("y", 240);
			}
		}
	});
	for(var cap=0;cap<12;cap++){
		arrRect[cap]=document.getElementById("m"+(cap+1));
		if(!arrShow[cap]) arrShow[cap]=[0];
		(function(cap){
			arrRect[cap].onclick = function(){
				window.open(arrShow[cap][1], "_self");
			};
			arrRect[cap].onmouseover = function(){
				arrText[0].setAttribute("x", arrRect[cap].getAttribute("x")-15 );
				arrText[0].setAttribute("y", arrRect[cap].getAttribute("y")-50 );
				switch(cap){
					case 0: arrText[1].textContent = "ЯНВ";
					break;
					case 1: arrText[1].textContent = "ФЕВ";
					break;
					case 2: arrText[1].textContent = "МАР";
					break;
					case 3: arrText[1].textContent = "АПР";
					break;
					case 4: arrText[1].textContent = "МАЙ";
					break;
					case 5: arrText[1].textContent = "ИЮН";
					break;
					case 6: arrText[1].textContent = "ИЮЛ";
					break;
					case 7: arrText[1].textContent = "АВГ";
					break;
					case 8: arrText[1].textContent = "СЕН";
					break;
					case 9: arrText[1].textContent = "ОКТ";
					break;
					case 10: arrText[1].textContent = "НОЯ";
					break;
					case 11: arrText[1].textContent = "ДЕК";
				}
				arrText[2].textContent = arrShow[cap][0]+"%";
				animate({
					duration: 100,
					delta: makeEaseOut(linear),
					step: function(delta) {
						arrText[0].setAttribute("opacity", delta*1);
					}
				});
			};
			arrRect[cap].onmouseout = function(){
				animate({
					duration: 100,
					delta: makeEaseOut(linear),
					step: function(delta) {
						arrText[0].setAttribute("opacity", delta*(0-1)+1);
					}
				});
			};})(cap);
	}//End of "for" - cycle
}