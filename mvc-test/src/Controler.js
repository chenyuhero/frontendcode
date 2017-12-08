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
        for(let key in this.$events){
            let parts = key.split(' ')
            let eventType = parts.shift()
            let selector = parts.join('')
            if(typeof this.bindEvents[key] === 'function'){
                this.$element.on(eventType,selector,this.$events[key])
            }
            
        }
    }
}
export default Controler