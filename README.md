# The Green Web Foundation

Custom WordPress theme for [The Green Web Foundation](https://www.thegreenwebfoundation.org/).

## License

The parent theme (Neve created by ThemeIsle) and this child theme are under a GNU GENERAL PUBLIC LICENSE. For more details see [license.txt](license.txt).

## Install

The theme should be installed in the `/wp-content/themes/` WordPress directory.

## Assets

**Important**: `style.css` is required by the theme for identification and versioning. This file must not include any styling.

- CSS files are found in the `assets/css` directory.
- The raw SASS partials are found in `assets/scss`.
- JavaScript files are found in the `assets/js` directory.
- Image files are found in the `assets/images` directory.

## Build process

Our aim is to keep this as simple as possible. The main build processes are around converting the sass to minified css, and minifying/combing the JS files.

We're using npm to manage the dependency packages and also to run our tasks. A big thank you to the [WordPress Understrap community](https://innovatingwithai.com/understrap/), who have provided the starting basis for our build process code.

### Getting set up

Make sure you have installed [node.js](https://nodejs.org/en) and [Browser-Sync](https://browsersync.io/)* (* optional, if you want to use it, it's ace so we highly recommend) on your computer globally.

All the magic is centered around `package.json` - this lists our dependencies and scripts.

Run `npm i` or `npm install` to install the dependencies required into the `node_modules` folder. 
`node_modules` is excluded from the theme in our `.gitignore` file.

### Main tasks

You can run `npm run` to list all the tasks defined in `package.json`. Here's a quick run down of the most commonly used ones.

To work and compile your Sass files on the fly:

```
npm run watch
```

To watch for any sass, js or PHP changes on-the-fly while running on a local server, and have your browser refresh, first change the browser-sync options to reflect your environment in the file `/src/build/browser-sync.config.js` in the beginning of the file. You may need to amend the `proxy` to the local domain name for your site.

Then run:

```
npm run watch-bs
```

### More about the handling of sass/css

Our npm tasks is just doing basic stuff. Compiling all the sass into appropriate css files and then minifying it. 

There are three key css files that we load into the theme:

1. `assets/css/main.min.css` - main frontend styles, the bulk of our css. 
1. `assets/css/editor-styles.min.css` - backend styles that load into the backend editor to help content editors get a better idea of how changes will be rendered when published.
1.  `assets/css/fog-of-enactment.min.css` - only loading on the FOE page to turn a pdf type thing into something more webby.

### More about the handling of js

We use an absolute minimum of custom js, and we don't load anything into the theme on every page here. 

The main file is `assets/js/theme.min.js` which is loaded conditionally into the fog of enactment page (sorry, the name is confusing, its on the list to address at some point!). 

There are a handful of other js files but they are loaded only when specific blocks are present on a page.

To instantly minify the theme JS file, run:

```
npm js
```

npm takes the file `assets/js/theme.js` converts it to `assets/js/theme.min.js`. It does this in case there are additional files to combine, right now there is only one we want to load on all pages.



