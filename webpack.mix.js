const mix = require("laravel-mix");
const path = require("path");

mix.alias({
    "@core": path.join(__dirname, "resources/js/core")
});

mix.override(config => {
    delete config.watchOptions;
});

mix.js("resources/js/app.js", "public/js").vue();
// mix.js("resources/js/app.js", "public/js").sass(
//     "resources/sass/app.scss",
//     "public/css"
// );
