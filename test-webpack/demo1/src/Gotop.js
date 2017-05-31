
var $ = require('./jquery');

var Gotop = (function(){




			function init($ct){
          		$ct.each(function(index,node){
            	new GoTop($(node))
          })

        }

			function GoTop($ct,target){

			    this.ct=$ct;
			    this.target=$('<button class="gotopbtn">GoTop</button>');
			    
			    this.createNode();
			    this.bindEvent();
			}
			  GoTop.prototype.bindEvent = function(){
			  console.log('绑定事件成功！')
			    var _this = this;
			    var $window = $(window);
			    $window.on('scroll', function(){
			        var $top = $window.scrollTop();
			        if($top > 100){
			            _this.target.css('display' , 'block');
			        }else{
			            _this.target.css('display' , 'none');
			        }
			    })
			    this.target.on('click', function(){
			        _this.ct.animate({
			            scrollTop: 0
			        })
			    })
			}


			GoTop.prototype.createNode=function(){
			    this.ct.append(this.target);
			    console.log('创建节点成功！')
			}

//1. `ct`属性，GoTop 对应的 DOM 元素的容器
//2.  `target`属性， GoTop 对应的 DOM 元素
//3.  `bindEvent` 方法， 用于绑定事件
//4 `createNode` 方法， 用于在容器内创建节点
	return {

        init : init
      }




})();

module.exports = Gotop;