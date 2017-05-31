var someModule = require("someModule");
    var anotherModule = require("anotherModule");    
 
    someModule.doTehAwesome();
    anotherModule.doMoarAwesome();
 
    exports.asplode = function (){
        someModule.doTehAwesome();
        anotherModule.doMoarAwesome();
 };