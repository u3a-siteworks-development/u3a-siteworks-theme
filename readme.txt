=== u3a-siteworks-theme ===
Requires at least: 5.9
Tested up to: 6.4.3
Stable tag: 5.9
Requires PHP: 7.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Theme using u3a brand guideline colours and fonts.  Based on starter theme from [fullsiteediting.com](https://fullsiteediting.com/).

== Description ==

This theme is part of the u3a SiteWorks project.  The theme makes it easy to follow the u3a brand guidelines 
in terms of colour and font.

The theme includes a specially modified version of the DM Sans font to improve legibility.

For more information please refer to the [SiteWorks website](https://siteworks.u3a.org.uk/)

== Frequently Asked Questions ==

Please refer to the documentation on the [SiteWorks website](https://siteworks.u3a.org.uk/u3a-siteworks-training/)

== Changelog ==
=1.9.7 =
* Simplify code in Functions.php and rename references to u3a test to u3a_theme
=1.9.6 =
* Remove test patterns from Functions.php
=1.9.5 =
* Add button colours to the alternate styles
=1.9.4 =
* Revert site logo block change to use heading block to prevent copyright issues
=1.9.3 =
* Add spacer block to single.html template to prevent large left aligned images overlapping footer
* And restore search box min width to style.css . Also add comments,
= 1.9.2 =
* Change CSS so that only one sub menu item is underlined in the menu.
= 1.9.1 =
* Include policy link in footer and code to define shortcode [u3a_policy_notice] in functions.php 
= 1.8.17 =
* Revert to more limited set of u3a Sans fonts
= 1.8.16 =
* Add CSS to make mobile menu button clearer
= 1.8.15 =
* Style Books review. Change title of style to Black and Grey as Black and White already exists
= 1.8.14 =
* Style Books review. Delete Dark and Red styles. Add new Black and White style
= 1.8.13 =
* Accessibility review All Pages items 1 & 2 colour change hover effect added. Main menu tab for current page is underlined black. 
= 1.8.12 =
* Accessibility review All Pages item 8 use rem units for font size
= 1.8.11 =
* Bug 599 Set 'u3a' as a link to root of website, add CSS to remove link decoration and colour
= 1.8.10 =
* Simplify header template part structure
* Remove excess vertical spacing from page, single and archive templates
* Increase standard left/right padding from 5px to 10px on various core blocks to provide wider edge margin
= 1.8.9 =
* Bug 722 Remove author name and post date from Search results
= 1.8.8 =
* Header template change to keep Search box on right when menu becomes to long for a single line
= 1.8.7 =
* Bug 557 - default text colour in header template part changed to white to comply with brand guidelines
= 1.8.6 =
* Remove custom fontsizes and add 5px L/R margins to heading elements h1 .. h6.
* Add 5px margins to blocks 'quote' and 'preformatted'

= 1.8.5 =
* Incorporate u3a Sans Light and Black font variations in fonts folder and add corresponding definitions in theme.json
* Remove zip files from top level folder

= 1.8.4 -
* Add a new style option whitetop.json 
* Change theme.json to allow button text and button background colours to be set

= 1.8.3 =
* Theme slug renamed to u3a-siteworks-theme

= 1.8.2 =
* Move button styles from styles.css to theme.json
* Add light versions of u3a font

= 1.8.1 =
* Add support for theme updates via the SiteWorks WP Update Server

= 1.7 and earlier =
* Intial development code
