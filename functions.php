<?php

/**
 * u3a theme 
 * developed for the u3a SiteWorks project
 * https://siteworks.u3a.org.uk
 */
// BD Remove unnecessary u3atest_theme_support and u3atest_styles functions. Rename u3a_test_scripts to u3a_theme_scripts and u3atest-styles to u3a_theme_styles  4/3/2024
// BD Remove test patterns 26 Feb 2024

// Configure theme to use the WP Update Server service on the SiteWorks server

require 'inc/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

if (!defined('ABSPATH')) exit;

$u3athemeUpdateChecker = PucFactory::buildUpdateChecker(
	'https://siteworks.u3a.org.uk/wp-update-server/?action=get_metadata&slug=u3a-siteworks-theme', //Metadata URL
	__FILE__, //Full path to the main plugin file or functions.php.
	'u3a-siteworks-theme'
);


/**
 * Enqueue scripts and styles.
 */
function u3a_theme_scripts()
{
	// Enqueue theme stylesheet.
	wp_enqueue_style('u3a_theme_style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', 'u3a_theme_scripts');

/**
 * Define shortcode for use in Footer template part to show a link to the website policy page, if present and published
 * 
 */

function u3a_show_policy_notice_link() {
	// check page exists and is published
	$page = get_page_by_path('website-policy-notice');
	if ($page && $page->post_status == 'publish') {
		$link = get_permalink($page);
		return "<a href=\"$link\" style=\"color: var(--wp--preset--color--uta-header-text)\">Website Terms of Use</a>";
	}
}
add_action( 'init', function () {
	add_shortcode('u3a_policy_notice', 'u3a_show_policy_notice_link');
});
