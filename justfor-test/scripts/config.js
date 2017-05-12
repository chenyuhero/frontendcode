requirejs.config({

　　　　paths: {
　　　　　　"jquery" : "tools/jquery",
　　　　　　 "carousel" : "tools/carousel",
			 "loadnews"	: "tools/loadnews",
			 "math" : "tools/math",
			 "Gotop": "tools/Gotop"
　　　　}
　　});

require(['math','carousel','loadnews','Gotop'], function (math,carousel,loadnews,gotop){
　　　　alert(math.add(1,1));
		
		carousel.init($('.carousel'));

		loadnews.init($('.wrap'));
		gotop.init($('body'));
			


		

　　});