require('./web.css');


var $ = require('./jquery');

var loadnews= require('./loadnews.js');
 	loadnews.init($('.wrap'));

var Gotop = require('./Gotop.js'); 
	Gotop.init($('body'));

var lunbo = require('./carousel.js');
 	lunbo.init($('.carousel'));
 


