import Controler from './Controler.js'

new Controler({
    element:".module1",
    events:{
        'change input':function(e){
            console.log('change1')
        },
        'click button':'addToCart'
    },
    addToCart:function(){
        let value = this.$element.find('input').val()
        this.remoteAddCart(value).then(()=>{
            this.showAnimation()
        })
    },
    remoteAddCart:function(){
        //$.ajax...
        //return Promise
    },
    showAnimation:function(){
        //this.$elementanimation('....')
    }
})