<?php
/**
 * Plugin Name: Quote of the Day
 * Description: Displays a daily rotating quote via the [quote_of_the_day] shortcode.
 * Version:     0.1.0
 * Author:      Christoph Daum
 * Author URI:  https://apermo.de
 * License:     GPL-2.0-or-later
 * Text Domain: quote-of-the-day
 * Requires PHP: 8.1
 */

declare(strict_types=1);

namespace Apermo\QuoteOfTheDay;

defined( 'ABSPATH' ) || exit();

define( 'QUOTE_OF_THE_DAY_VERSION', '0.1.0' );
define( 'QUOTE_OF_THE_DAY_FILE', __FILE__ );
define( 'QUOTE_OF_THE_DAY_DIR', plugin_dir_path( __FILE__ ) );

require_once __DIR__ . '/vendor/autoload.php';

Plugin::init();
