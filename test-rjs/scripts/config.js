requirejs.config({

　　　　paths: {
　　　　　　"jquery" : "tools/jquery",
　　　　　　 "carousel" : "tools/carousel",
			 "loadnews"	: "tools/loadnews",
			 "math" : "tools/math",
			 "Gotop": "tools/Gotop"
　　　　}
　　});

require(['carousel','loadnews','Gotop'], function (carousel,loadnews,gotop){
　　　　		
		carousel.init($('.carousel'));

		loadnews.init($('.wrap'));
		gotop.init($('body'));
			


		

　　});