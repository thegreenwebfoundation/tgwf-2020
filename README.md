# The Green Web Foundation

Custom WordPress theme for [The Green Web Foundation](https://www.thegreenwebfoundation.org/).

## License

The parent theme (Neve created by ThemeIsle) and this child theme are under a GNU GENERAL PUBLIC LICENSE. For more details see [license.txt](license.txt).

## Install

The theme should be installed in the `/wp-content/themes/` WordPress directory.

## Assets

- **Important**: `style.css` is required by the theme for identification and versioning. This file must not include any styling.
- CSS files are found in the `assets/css` directory.
- The raw SASS partials are found in `assets/scss`.
- JavaScript files are found in the `assets/js` directory.
- Image files are found in the `assets/images` directory.

### Gulp
Gulp is the tooling manager used to prepare the JS and SASS/CSS files for production.

It is installed with npm. The packages and dependencies required (including gulp itself) are listed in `package.json` 

Run `npm i` or `npm install` to install the packages and dependencies required into the `node_modules` folder. 
`node_modules` is excluded from the theme in the theme `.gitignore` file.

You can run `gulp --tasks` to list all the tasks defined in `gulpfile.js`. Here's a quick run down of the most commonly used ones.



To watch for any Sass, JS and PHP changes on-the-fly while running on a local server, and have your browser refresh:

```
gulp watch-bs
```

You may need to amend the `proxy` option in the `gulpconfig.json` file to the local domain name for your site.



To watch for any Sass, JS and PHP changes on-the-fly while running on a local server:

```
gulp watch
```


To instantly compile SASS into CSS and minify the CSS file, run:

```
gulp styles
```

This is run when you run either of the two `watch` tasks above. 
Gulp will compile all the SASS and create the file `stylesheets/css/main.css`. Then it will minify (compress) this into `stylesheets/css/main.min.css`. This is the main stylesheet loading into the theme.


To instantly minify the JS file, run:

```
gulp scripts
```

As above, this is run when you run either of the two `watch` tasks above. 
Gulp will take the file `js/scripts.js` convert it to `js/theme.js`. It does this in case there are additional files to combine, right now there is only one. Then it will minify (compress) this into `js/theme.min.css`. This is the main JS file loading into the theme.



## Theme structure


## Styling (CSS)


## Fonts




