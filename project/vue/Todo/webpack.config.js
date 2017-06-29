var ExtractTextPlugin = require('extract-text-webpack-plugin');


module.exports = {
  entry: './app.js',
  output: {
    filename: 'bundle.js'
  },
  module: {
    loaders:[
      {
        test: /\.js[x]?$/,
        exclude: /node_modules/,
        loader: 'babel-loader?presets[]=es2015&presets[]=react'
      },
     { 
      test: /\.css$/, 
      loader: 'style-loader!css-loader' 
    },
      

    ]
      
  },

  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.common.js'
    }
  },
  plugins: [
        new ExtractTextPlugin("style.css") //提取出来的样式放在style.css文件中
    ]

}
