# Solero

Theme-agnostic modules collection for Wordpress

## Requirements

* PHP >= 5.4
* Wordpress >= 4.0

### Installation

Add Solero repository to `composer.json` file.

```json
"repositories": [
  {
    "type": "git",
     "url": "git@bitbucket.org:starise/solero.git"
  }
],
```

You can now require the package using composer.

```sh
composer require starise/solero dev-master
```

The password to access the private repository is necessary.

### Activation

The plugin can be activated using WordPress admin panel or via [wp-cli](http://wp-cli.org/commands/plugin/activate/).

```sh
wp plugin activate solero
```

## Modules

* **Load jQuery from the Google CDN**
  `add_theme_support('solero-jquery-cdn');`

* **Cleaner WordPress markup**
  `add_theme_support('solero-clean-up');`

* **Cleaner walker for navigation menus**
`add_theme_support('solero-nav-walker');`

* **Root relative URLs**
  `add_theme_support('solero-relative-urls');`

* **Google Analytics** ([more info](https://github.com/roots/soil/wiki/Google-Analytics))
  `add_theme_support('solero-google-analytics', 'UA-XXXXX-Y');`

* **Google Fonts**
  `add_theme_support('solero-google-fonts', ['Open Sans' => '400,700']);`

* **Move all JS to the footer**
  `add_theme_support('solero-js-to-footer');`

* **Disable trackbacks**
  `add_theme_support('solero-disable-trackbacks');`

* **Disable asset versioning**
  `add_theme_support('solero-disable-asset-versioning');`
