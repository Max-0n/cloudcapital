VK.init({apiId: 3597712, onlyWidgets: true});
VK.Widgets.Like("vk_like", {type: "mini", height: 18});
VK.Widgets.Comments("vk_comments", {limit: 10, width: "720", attach: "*"});

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));