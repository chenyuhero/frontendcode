var $ = require('./jquery');

var Loadnews = (function(){

    function init ($ct){
          $ct.each(function(index,node){
            new loadnews($(node))
          })

        }



    function loadnews($wrap){

      this.wrap=$wrap;
      this.init();
      this.bind();

      this.start();

    }

    loadnews.prototype.init = function() {
      //节点
      var $item=this.$item=this.wrap.find(".item"),
          $picct=this.$picct=this.wrap.find("#pic-ct"),
          $load=this.$load=this.wrap.find('.loadmore');


    //参数
    var _this = this;
        this.curPage = 1;
        this.perPageCount = 10;
        this.colSumHeight = [];
        this.nodeWidth = this.$item.outerWidth(true);
        this.colNum = parseInt(this.$picct.width()/_this.nodeWidth);
        
        
        for(var i = 0; i < _this.colNum; i++){
             _this.colSumHeight[i] = 0
        }
      

    //初始化函数
        }

    loadnews.prototype.bind = function() {
        var _this=this;

        console.log("事件绑定了");
        _this.$load.on('click',function(){
          
          _this.start();
          console.log("事件启动了");
    })



    };
    loadnews.prototype.start = function() {
        var _this=this;
        this.getData(function(newsList){
               
        $.each(newsList, function(idx, news){
          var $node = _this.getNode(news)
          $node.find('img').load(function(){
            _this.$picct.append($node)
           
            _this.waterFallPlace($node)
          })
        })
      })
      
    };
    loadnews.prototype.getData = function(callback) {
        var _this=this;
       $.ajax({
          url: 'http://platform.sina.com.cn/slide/album_tech',
          dataType: 'jsonp',   
          jsonp:"jsoncallback",
          data: {
            app_key: '1271687855',
            num: _this.perPageCount,
            page: _this.curPage
          }
        }).done(function(ret){
          if(ret && ret.status && ret.status.code === "0"){
            callback(ret.data);   //如果数据没问题，那么生成节点并摆放好位置
            _this.curPage++
          }else{
            console.log('get error data');
          }
        });

    };
    loadnews.prototype.getNode = function(item) {
        var tpl = ''
        tpl += '<li class="item">';
        tpl += ' <a href="'+ item.url +'" class="link"><img src="' + item.img_url + '" alt=""></a>';
        tpl += ' <h4 class="header">'+ item.short_name +'</h4>';
        tpl += '<p class="desp">'+item.short_intro+'</p>';
        tpl += '</li>';
      
      return $(tpl)
    };
    loadnews.prototype.waterFallPlace = function($node) {
            var _this=this;
            this.idx = 0,
            minSumHeight = _this.colSumHeight[0];
            
        for(var i=0; i<_this.colSumHeight.length; i++){
          if(_this.colSumHeight[i] < minSumHeight){
              _this.idx = i;
            minSumHeight = _this.colSumHeight[i];
          }
        }
        
        $node.css({
          left: _this.nodeWidth * _this.idx,
          top: minSumHeight,
          opacity: 1
        });

        this.colSumHeight[_this.idx] = $node.outerHeight(true) + _this.colSumHeight[_this.idx];
        this.$picct.height(Math.max.apply(null,_this.colSumHeight));

    };




      return {

        init : init
      }

})()


module.exports = Loadnews;