const mix  = require('laravel-mix');
const path = require('path');

mix.disableNotifications();

mix.options({
  processCssUrls: false,
  publicPath: ('./'),
});

mix.js(
  [
    '_src/js/vue/App.js',
    '_src/js/classes/Core.js',
  ],
  'public/build/js/scripts.js',
).vue({ version: 2 });

mix.sass(
  '_src/scss/core.scss',
  'public/build/css/styles.css',
);

mix.sass(
  '_src/admin-scss/core.scss',
  'public/build/css/admin.css',
);

mix.babelConfig({
  presets: [
    [
      '@babel/preset-env',
      {
        targets: {
          browsers: [
            'chrome 60',
            'firefox 55',
            'safari 10',
            'edge 15',
          ],
        },
        useBuiltIns: 'usage',
        corejs: 3,
      },
    ],
  ],
});

mix.webpackConfig({
  module: {
    rules: [{
      test: /\.scss/,
      loader: 'import-glob-loader',
    }],
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, '_src/js/vue/'),
      '~': path.resolve(__dirname, '_src/js/classes/'),
    },
  },
});

mix.options({
  terser: {
    extractComments: false,
  },
});
