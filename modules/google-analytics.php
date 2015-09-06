<?php

namespace starise\Solero\GoogleAnalytics;

/**
 * Google Analytics snippet from HTML5 Boilerplate
 *
 * Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM
 * You can enable/disable this feature in functions.php (or lib/config.php if you're using Sage):
 * add_theme_support('solero-google-analytics', 'UA-XXXXX-Y', 'wp_footer');
 */
function load_script()
{
	$gaID = options('gaID');
	if (!$gaID) { return; }
	$loadGA   = (!defined('WP_ENV') || \WP_ENV === 'production') && !current_user_can('manage_options');
	$loadGA   = apply_filters('solero/loadGA', $loadGA);
	$cookieGA = true;
	$cookieGA = apply_filters('solero/cookieGA', $cookieGA);
	?>
	<script>
		<?php if ($loadGA) : ?>
			window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
		<?php else : ?>
			(function(so,le,r,o){so.ga=function(){so.ga.q.push(arguments);if(le['log'])le.log(r+o.call(arguments))}
			so.ga.q=[];so.ga.o=+new Date;}(window,console,'Google Analytics: ',[].slice))
		<?php endif; ?>
		ga('create','<?= $gaID; ?>','auto');
		<?php if (!$cookieGA) : ?>
		ga('set', 'anonymizeIp', true);
		<?php endif; ?>
		ga('send','pageview');
	</script>
	<?php if ($loadGA) : ?>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>
	<?php endif; ?>
<?php
}

function options($option = null)
{
	static $options;
	if (!isset($options)) {
		$options = \starise\Solero\Options::getByFile(__FILE__) + ['', 'wp_footer'];
		$options['gaID'] = &$options[0];
		$options['hook'] = &$options[1];
	}
	return is_null($option) ? $options : $options[$option];
}

$hook = options('hook');

add_action($hook, __NAMESPACE__ . '\\load_script', 20);
