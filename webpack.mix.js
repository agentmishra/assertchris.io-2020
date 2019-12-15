const mix = require("laravel-mix")

require("laravel-mix-tailwind")
require("laravel-mix-purgecss")

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/highlight.pcss", "public/css")
    .postCss("resources/css/app.pcss", "public/css")
    .tailwind("./tailwind.config.js")

if (mix.inProduction()) {
    mix.version().purgeCss()
}
