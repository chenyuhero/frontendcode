import $ from "jquery"
let $module3 = $(".module3")
$module3.on("change","input",function(){
    console.log("3")
})
$module3.on("click","button",function(){
    console.log("click3")
})