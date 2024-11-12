let mix = require('laravel-mix');
const path = require("path");

mix.webpackConfig({
    externals: {
        jquery: "jQuery",
        bootstrap: true,
        vue: "Vue",
        moment: "moment",
    }
});

mix.setResourceRoot('./');
mix.setPublicPath('../themes/link_theme');

mix
    .sass('../themes/link_theme/css/presets/default/main.scss', '../themes/link_theme/css/skins/default.css', {
        sassOptions: {
            includePaths: [
                path.resolve(__dirname, './node_modules/')
            ]
        }
    })
    .sass('../themes/link_theme/css/presets/artist/main.scss', '../themes/link_theme/css/skins/artist.css', {
        sassOptions: {
            includePaths: [
                path.resolve(__dirname, './node_modules/')
            ]
        }
    })
    .js('assets/themes/link_theme/js/main.js', '../themes/link_theme/js').vue()