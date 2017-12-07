import "../style/border.css"
import $ from "jquery"

let $module1 = $(".module1")
$module1.on("change","input",function(){
    console.log("chang1")
})
$module1.on("click","button",function(){
    console.log("click1")
})

let $module2 = $(".module2")
$module2.on("change","input",function(){
    console.log("change2")
})
$module2.on("click","button",function(){
    console.log("click2")
})

let $module3 = $(".module3")
$module3.on("change","input",function(){
    console.log("3")
})
$module3.on("click","button",function(){
    console.log("click3")
})