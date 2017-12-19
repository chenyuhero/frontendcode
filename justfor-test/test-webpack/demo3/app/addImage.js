
import '../style/addImage.css'

let smallImage = document.createElement('img')
smallImage.src = require('../images/small.jpeg')
document.body.appendChild(smallImage)

let bigImage = document.createElement('img')
bigImage.src = require('../images/big.jpeg')
document.body.appendChild(bigImage)