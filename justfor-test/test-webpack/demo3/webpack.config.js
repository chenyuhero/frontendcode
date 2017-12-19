const path = require('path')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
module.exports = {
    entry: './app/index.js',//规定入口文件
    output:{
        path:path.resolve(__dirname,'build'),//必须使用绝对地址，输出文件夹
        filename:"bundle.js" ,//打包后输出文件的文件名
        publicPath: 'build/' //告诉它如何寻找资源
    },
    module:{
        rules:[
            {
                //告诉他们使用规则
                test:/\.js$/,  //正则
                use:'babel-loader',//用啥
                exclude:/node_modules/, //啥不用
                
            },
            {
                test : /\.(png|jpe?g|gif|svg)(\?.*)?$/,
                use : [
                    {
                        loader:"url-loader",
                        options:{
                            //限制图片大小10000b，小雨限制将会转换为base64格式
                            limit : 10000,
                            name: 'images/[name].[hash].[ext]'//超出限制，创建的文件格式

                        }
                    }
                ]
            },
            {
                test :/\.css$/,
                loader : ExtractTextPlugin.extract({
                    fallback:'style-loader',
                    use :[
                    {
                        loader:'css-loader',
                        options:{
                            modules: true
                        }
                    }
                ]

                })
                
                
            }

        ]
    },
    //插件列表
    plugins:[
        new ExtractTextPlugin("css/[name].[hash].css")
    ]
}