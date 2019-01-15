<?php
/**
 * Load all custom files  
 *
 * @package Canyon Themes
 * @subpackage Business Way
*/

/**
* Implement the default value of customizer.
*/
require get_template_directory() . '/canyonthemes/customizer/default.php';
require get_template_directory() . '/canyonthemes/customizer/sanitize.php';
/*
* Including hooks folder file
=====================================
*/
require get_template_directory() . '/canyonthemes/hooks/header.php'; 
require get_template_directory() . '/canyonthemes/hooks/footer.php'; 
require get_template_directory() . '/canyonthemes/hooks/custom-hooks.php';
require get_template_directory() . '/canyonthemes/hooks/dynamic-css.php';
require get_template_directory() . '/canyonthemes/core/theme-function.php';


/*
* Including Custom Widget Files
=====================================
*/
require get_template_directory() . '/canyonthemes/widget/quote-widget.php';
require get_template_directory() . '/canyonthemes/widget/welcome-msg-widget.php';
require get_template_directory() . '/canyonthemes/widget/feature-widget.php';
require get_template_directory() . '/canyonthemes/widget/services-widget.php';
require get_template_directory() . '/canyonthemes/widget/mission-widget.php';
require get_template_directory() . '/canyonthemes/widget/recent-post-widget.php';
require get_template_directory() . '/canyonthemes/widget/our-work-widget.php';
require get_template_directory() . '/canyonthemes/widget/about-us-widget.php';
require get_template_directory() . '/canyonthemes/widget/contact-widget.php'; 


/**
 * Load Metabox file
 * =====================================
*/
require get_template_directory() . '/canyonthemes/metabox/metabox-defaults.php';
require get_template_directory() . '/canyonthemes/metabox/metabox-icon.php';

/**
 * Load custom files.
*/
require get_template_directory() . '/canyonthemes/bootstrap-navwalker/wp_bootstrap_navwalker.php';
require get_template_directory() . '/canyonthemes/breadcrumb/breadcrumb.php';
include get_template_directory() . '/canyonthemes/customizer-repeater/customizer-control-repeater.php';
include get_template_directory() . '/woocommerce/woo-custom-functions.php';


/**
 * Implement the default file.
 */
require get_template_directory() . '/canyonthemes/core/custom-header.php';
require get_template_directory() . '/canyonthemes/core/template-tags.php';
require get_template_directory() . '/canyonthemes/core/extras.php';
require get_template_directory() . '/canyonthemes/core/customizer.php';
require get_template_directory() . '/canyonthemes/core/jetpack.php';


/**
 * Load about section under appearance 
 */
require get_template_directory() . '/canyonthemes/about/about.php';
require get_template_directory() . '/canyonthemes/about/class-about.php';

/**
 * Load TGM Library
 */
require get_template_directory() . '/canyonthemes/library/tgm/class-tgm-plugin-activation.php';

/**
 * Load Dummy Data Files
 */
require get_template_directory() . '/canyonthemes/dummy-data/dummy-file.php';
