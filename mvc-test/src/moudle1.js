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
        console.log(this)
        let value = this.$element.find('input').val()
        this.remoteAddCart(value).then(()=>{
            this.showAnimation()
        })
    },
    remoteAddCart:function(){
        
        return Promise.resolve(1)
    },
    showAnimation:function(){
        //this.$elementanimation('....')
    }
})