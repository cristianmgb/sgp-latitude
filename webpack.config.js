/**
 * Starter-ci-boilerplate
 *
 * Its a starter for application  development of codeigniter framework 
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2019-2020 CiHispano Org
 *
 * @package    Starter-ci-boilerplate
 * @author     CiHispano Dev Team
 * @copyright  2019-2020 CiHispano Org
 * @license    https://opensource.org/licenses/MIT	MIT License
 * @link       https://cihispano.org/
 * @since      Version 1.0.0
 * @filesource
 * 
 */
const path    = require('path')
const webpack = require('webpack')

// Plugins
const isDevelopment          = process.env.NODE_ENV === 'development'
const MiniCssExtractPlugin   = require('mini-css-extract-plugin')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const { VueLoaderPlugin }    = require('vue-loader')

module.exports = {
    // "production" | "development" | "none"
    mode : isDevelopment ? 'production' : 'development',
    entry: {
        dash : path.resolve(__dirname, 'src/js/index'),
        auth : path.resolve(__dirname, 'src/js/auth/index')
    },
    output: {
        path     : path.resolve(__dirname, 'public/dist/'),
        filename : 'js/[name].js'
    },
    resolve: {
        modules: [
            "node_modules",
            path.resolve(__dirname, 'public/dist/')
        ],
        // directories where to look for modules
        extensions: [
            '.js', '.json', '.jsx','.ts', '.tsx', '.vue',
            '.scss', '.css', '.gif', '.png', '.jpg', '.jpeg', '.svg'
        ],
        alias: {
            vue: 'vue/dist/vue.js'
        }
    },
    module: {
        rules: [
            {
                test   : /\.(t|j)sx?$/,
                loader : 'babel-loader',
                exclude: /(node_modules|bower_components)/
            },
            {
                test   : /\.vue$/,
                loader : 'vue-loader'
            },
            {
                test   : /\.s[ac]ss$/i,
                loader : [
                    isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            url      : true,
                            modules  : false,
                            sourceMap: isDevelopment
                        }
                    },
                    {
                        loader: 'resolve-url-loader',
                        options: {
                            url      : true,
                            modules  : false,
                            sourceMap: isDevelopment
                        }
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap  : isDevelopment,
                            sassOptions: {
                                fiber         : false,
                                implementation: require('node-sass'),
                                outputStyle   : 'compressed',
                                minimize      : true
                            }
                        }
                    }
                ]
            },
            {
                test    : /\.s[ac]ss$/i,
                exclude : /\.s[ac]ss$/i,
                loader  : [
                    isDevelopment ? 'style-loader' : MiniCssExtractPlugin.loader,
                    'css-loader',
                    {
                        loader : 'sass-loader',
                        options: {
                            sourceMap : isDevelopment,
                        }
                    }
                ]
            },
            {
                test   : /\.(ico|gif|png|jpe?g|mp3|svg)$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name          : '[name].[ext]',
                            publicPath    : '../img',
                            outputPath    : '/img/',
                            bypassOnDebug : true, // webpack@1.x
                            disable       : true, // webpack@2.x and newer
                            esModule      : false,
                            context       : 'project'
                        }
                    }
                ]
            },
            {
                test: /\.(woff(2)?|ttf|eot|svg)(\?[a-z0-9]+)?$/,
                use: [
                    {
                        loader : 'url-loader',
                        options: {
                            limit     : 100000,
                            name      : '[name].[ext]',
                            publicPath: '../fonts',
                            outputPath: '/fonts/'
                        }
                    }
                ]
            }
        ]
    },
    devServer: {
        hot : true,
        open: true,
        port: 9000,
        contentBase: path.join(__dirname, 'public'),
        headers: { "Access-Control-Allow-Origin": "*" }
    },
    devtool: isDevelopment === 'development' ? 'soure-map' : 'none',
    plugins: [
        new VueLoaderPlugin(),
        new CleanWebpackPlugin({ cleanStaleWebpackAssets: false }),
        new MiniCssExtractPlugin({
            filename: isDevelopment ? 'src/scss/[name].scss' : 'css/[name].css',
            chunkFilename: isDevelopment ? 'src/scss/[id].scss' : 'css/[name].css'
        }),
        // provide jQuery and Popper.js dependencies
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            jquery: 'jquery',
            'window.jQuery': 'jquery',
            Popper: ['popper.js', 'default']
        })
    ],
    optimization: {
        minimize   : true,
        splitChunks : {
            chunks  : 'all',
            minSize : 0,
            name    : 'commons'
        }
    }
}