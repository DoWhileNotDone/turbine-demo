const path = require('path');

module.exports = {
  mode: 'development',
  entry: './resources/js/index.js',
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'public'),
  },
  module: {
    rules: [
        {
            test: /\.js$/,
            loader: 'babel-loader',
            exclude: /node_modules/
        },
    ]
  },
};