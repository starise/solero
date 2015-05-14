<?php

namespace starise\Solero\GoogleFonts;

/**
 * Add requested Google Fonts in head
 *
 * You can enable/disable this feature in functions.php (or lib/config.php if you're using Sage):
 * add_theme_support(
 *	'solero-google-fonts',
 *	[
 *		'Open Sans' => '400,700,400italic,700italic',
 *		'Noto Sans' => '400,400italic'
 *	]
 * );
 */
function load_fonts()
{
	$fonts = options('fonts');
	if (!$fonts) { return; }
	$query = '//fonts.googleapis.com/css?family=' . $fonts;
	wp_register_style('solero-google-fonts', $query, [], null);
	wp_enqueue_style('solero-google-fonts');
}

function implode_fonts($options)
{
	$fonts = [];
	foreach($options as $font => $size) {
		$font = str_replace(' ', '+', $font);
		$size = str_replace(' ', '', $size);
		$fonts[] = "{$font}:{$size}";
	}
	return implode('|', $fonts);
}

function options($option = null)
{
	static $options;
	if (!isset($options)) {
		$options = \starise\Solero\Options::getByFile(__FILE__);
		$options['fonts'] = &$options[0];
	}
	return is_bool($options[$option]) ? false : implode_fonts($options[$option]);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\load_fonts', 10);
