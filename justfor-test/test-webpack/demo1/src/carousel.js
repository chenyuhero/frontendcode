     

var $ = require('./jquery');

var Carousel = (function(){

          function init ($ct){
          $ct.each(function(index,node){
            new carousel($(node))
          })

        }

          function carousel($ct){
            this.ct=$ct;
            this.init();
            this.bind();
            
        }

        carousel.prototype.init = function() {
          var    $imgCt =this.$imgCt=this.ct.find(".img-ct"),
                 $preBtn=this.$preBtn=this.ct.find(".btn-pre"),
                 $nexBtn=this.$nexBtn=this.ct.find('.btn-next'),
                 $bullet=this.$bullet=this.ct.find('.bullet');
                this.pageIndex=0;
                this.imgLength=$imgCt.children().length;  
                this.turn();
        }

        carousel.prototype.bind = function() {
             var _this= this;
             this.$nexBtn.on('click',function(e){
              e.preventDefault()
              _this.playNext();

            })
            this.$preBtn.on('click',function(e){
              e.preventDefault()
              _this.playPre();

            })

            this.$bullet.find('li').on('click', function(){
            _this.pageIndex = $(this).index();
            _this.turn();   
          })
        }    

        carousel.prototype.playNext = function() {
          var _this= this;
           _this.pageIndex++;
          if(_this.pageIndex==_this.imgLength){
            _this.pageIndex=0
            _this.turn()
          }else{
          _this.turn()
          }
        }

        carousel.prototype.playPre= function() {
          var _this= this;
         _this.pageIndex--;
          if(_this.pageIndex <0){
            _this.pageIndex=_this.imgLength-1
           _this.turn()
          }else{
            _this.turn()
          }
        }

        carousel.prototype.turn= function() {
          this.fade(this.$imgCt)
          this.setBullet(this.$bullet)
        }

        carousel.prototype.autoplay= function() {
          var _this=this;
           clock = setInterval(function(){
                  _this.playNext();
                }, 2000); 
        }


        carousel.prototype.fade= function(e) {
          e.children().fadeOut(500).eq(this.pageIndex).fadeIn(1000);
        }


        carousel.prototype.setBullet= function(e) {
            e.children().removeClass('active').eq(this.pageIndex).addClass('active');
          
        }


      return {

        init : init
      }



})();



module.exports = Carousel;

