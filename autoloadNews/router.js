//服务端 router.js

app.get('/loadMore', function(req, res) {


	var news= [
	{
		link:"http://news.qq.com/a/20170417/000907.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415040323_12088/0",
		title:'一季度中国经济成绩单今公布 有望迎来“开门红”',
		brif:'呵呵哒'
	},

	{

		link:"http://news.qq.com/a/20170417/002421.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415021818_12088/0",
		title:'袁隆平透露超级稻进展：17吨/公顷已有九成把握',
		brif:'么么啊'
	},

	{

		link:"http://news.qq.com/a/20170417/002288.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415022803_12088/0",
		title:'朴槿惠今将被诉：亲信门告一段落 或与铁窗相伴？',
		brif:'呵呵哒'
	},
	
	

		
	{

		link:"http://news.qq.com/a/20170417/002250.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414994170_12088/0",
		title:'美高官：是时候用除武力外一切方式解决朝鲜问题',
		brif:'三胖'
	},
	{

		link:"http://news.qq.com/a/20170417/001652.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414963303_12088/0",
		title:'鲜人民轻松过周末 民众问：半岛局势这么紧张？',
		brif:'呵呵哒'
	},

	{
		link:"http://news.qq.com/a/20170417/000907.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415040323_12088/0",
		title:'一季度中国经济成绩单今公布 有望迎来“开门红”',
		brif:'呵呵哒'
	},

	{

		link:"http://news.qq.com/a/20170417/002421.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415021818_12088/0",
		title:'袁隆平透露超级稻进展：17吨/公顷已有九成把握',
		brif:'么么啊'
	},

	{

		link:"http://news.qq.com/a/20170417/002288.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415022803_12088/0",
		title:'朴槿惠今将被诉：亲信门告一段落 或与铁窗相伴？',
		brif:'呵呵哒'
	},
	
	

		
	{

		link:"http://news.qq.com/a/20170417/002250.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414994170_12088/0",
		title:'美高官：是时候用除武力外一切方式解决朝鲜问题',
		brif:'三胖'
	},
	{

		link:"http://news.qq.com/a/20170417/001652.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414963303_12088/0",
		title:'鲜人民轻松过周末 民众问：半岛局势这么紧张？',
		brif:'呵呵哒'
	},
	{
		link:"http://news.qq.com/a/20170417/000907.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415040323_12088/0",
		title:'一季度中国经济成绩单今公布 有望迎来“开门红”',
		brif:'呵呵哒'
	},

	{

		link:"http://news.qq.com/a/20170417/002421.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415021818_12088/0",
		title:'袁隆平透露超级稻进展：17吨/公顷已有九成把握',
		brif:'么么啊'
	},

	{

		link:"http://news.qq.com/a/20170417/002288.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415022803_12088/0",
		title:'朴槿惠今将被诉：亲信门告一段落 或与铁窗相伴？',
		brif:'呵呵哒'
	},
	
	

		
	{

		link:"http://news.qq.com/a/20170417/002250.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414994170_12088/0",
		title:'美高官：是时候用除武力外一切方式解决朝鲜问题',
		brif:'三胖'
	},
	{

		link:"http://news.qq.com/a/20170417/001652.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414963303_12088/0",
		title:'鲜人民轻松过周末 民众问：半岛局势这么紧张？',
		brif:'呵呵哒'
	},
	{
		link:"http://news.qq.com/a/20170417/000907.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415040323_12088/0",
		title:'一季度中国经济成绩单今公布 有望迎来“开门红”',
		brif:'呵呵哒'
	},

	{

		link:"http://news.qq.com/a/20170417/002421.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415021818_12088/0",
		title:'袁隆平透露超级稻进展：17吨/公顷已有九成把握',
		brif:'么么啊'
	},

	{

		link:"http://news.qq.com/a/20170417/002288.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1415022803_12088/0",
		title:'朴槿惠今将被诉：亲信门告一段落 或与铁窗相伴？',
		brif:'呵呵哒'
	},
	
	

		
	{

		link:"http://news.qq.com/a/20170417/002250.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414994170_12088/0",
		title:'美高官：是时候用除武力外一切方式解决朝鲜问题',
		brif:'三胖'
	},
	{

		link:"http://news.qq.com/a/20170417/001652.htm",
		img:"http://inews.gtimg.com/newsapp_ls/0/1414963303_12088/0",
		title:'鲜人民轻松过周末 民众问：半岛局势这么紧张？',
		brif:'呵呵哒'
	}


	]
	var ind = req.query.page;
    var len = 3;

	
	var bigNews = 	news.slice(ind*len, ind*len+len);//将新闻中的内容3个3个的截取


res.send({
	status:0,
	data:bigNews

});



});