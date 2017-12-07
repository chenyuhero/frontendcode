import $ from "jquery"
let $module3 = $(".module3")
$module3.on("change","input",function(){
    console.log("3")
})
$module3.on("click","button",function(){
    console.log("click3")
})

function Maker(options){
    let controler = {}
    controler.$element = $(options.element)
    controler.$events = options.events

    for(key in controler.$events){
        let parts = key.split[' ']
        let envntType = parts.shift()
        let selector = parts.join('')
        controler.$element.on(enventType,selector,controler.$events[key])
    }
}

Maker({
    element:".module3",
    events:{
        'change ,input':function(e){
            console.log('change3')
        },
        'click button':function(e){
            console.log('click3')
        }
    }
})