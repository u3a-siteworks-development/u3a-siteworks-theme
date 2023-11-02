<?php

/**
 * u3a theme 
 * developed for the u3a SiteWorks project
 * https://siteworks.u3a.org.uk
 */

// Configure theme to use the WP Update Server service on the SiteWorks server

require 'inc/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

if (!defined('ABSPATH')) exit;

$u3athemeUpdateChecker = PucFactory::buildUpdateChecker(
	'https://siteworks.u3a.org.uk/wp-update-server/?action=get_metadata&slug=u3a-siteworks-theme', //Metadata URL
	__FILE__, //Full path to the main plugin file or functions.php.
	'u3a-siteworks-theme'
);

if (!function_exists('u3atest_theme_support')) :
	function u3atest_theme_support()
	{

		// Adding support for core block visual styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');
	}
endif;
add_action('after_setup_theme', 'u3atest_theme_support');
if (!function_exists('u3atest_styles')) :

	function u3atest_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style(
			'u3atest',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		//wp_add_inline_style( 'u3atest', u3atest_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style('u3atest-style');
	}

endif;
add_action('wp_enqueue_scripts', 'u3atest_styles');



/**
 * Enqueue scripts and styles.
 */
function u3atest_scripts()
{
	// Enqueue theme stylesheet.
	wp_enqueue_style('u3atest-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
}

add_action('wp_enqueue_scripts', 'u3atest_scripts');



function u3atest_block_pattern()
{
	register_block_pattern(
		'u3atest/wrap-figure',
		array(
			'title' => 'Wrap figure',
			'content' => "<!-- wp:group -->
<div class=\"wp-block-group\">
<!-- wp:image {\"align\":\"left\",\"id\":131,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image alignleft size-large is-resized\"><img src=\"\" alt=\"\" class=\"wp-image-131\" width=\"100\" height=\"100\"/></figure>
<!-- /wp:image -->
<!-- wp:paragraph -->
<p>Enter text here</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->",
		)
	);
	register_block_pattern(
		'u3atest/wrap-figure-right',
		array(
			'title' => 'Wrap figure right',
			'content' => "<!-- wp:group -->
<div class=\"wp-block-group\">
<!-- wp:image {\"align\":\"right\",\"id\":131,\"width\":100,\"height\":100,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image alignright size-large is-resized\"><img src=\"\" alt=\"\" class=\"wp-image-131\" width=\"100\" height=\"100\"/></figure>
<!-- /wp:image -->
<!-- wp:paragraph -->
<p>Enter text here</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->",
		)
	);
}

add_action('init', 'u3atest_block_pattern');

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
