import $ from "jquery"
/*
function Controler(options){  
    
}

Controler.prototype.bindEvents = function(){
    
}
*/

class Controler{
    constructor(options){
        for(let key in options){
            this[key] = options[key]
        }
        this.$element = $(this.element)
        this.bindEvents()
        
    }
    bindEvents(){
        for(let key in this.events){
            
            let parts = key.split(' ')
            
            let eventType = parts.shift()
            let selector = parts.join(' ')
            console.log(this.events[key])
            if(typeof this.events[key] === 'function'){
                this.$element.on(eventType,selector,this.events[key])
            }else if (typeof this.events[key] === 'string'){
                let methodName =this.events[key]
                let that = this
                this.$element.on(eventType,selector,function(e){
                    that[methodName].call(that,e)
                })
            }
            
        }
    }
}
export default Controler