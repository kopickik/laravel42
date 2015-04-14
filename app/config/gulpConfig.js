/* gulpConfig.js */
'use strict';

module.exports = {

    'serverport': '8000',

    'styles': {
        'src': 'app/assets/scss/**/*.scss',
        'dest': 'public/css'
    },

    'scripts': {
        'src': 'app/assets/js/**/*.js',
        'dest': 'public/js'
    },

    'images': {
        'src': 'app/assets/img/*.{jpg,png}',
        'dest': 'public/img'
    },

    'browserify': {
        'entries'   : ['./app/js/main.js'],
        'bundleName': 'main.js',
        'sourcemap' : true
    }
};
