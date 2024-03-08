<?php
/*
Plugin Name: Neon Channel Product Customizer
Plugin URI: https://neon-channel-product-customizer.vertimcoders.com
Description: The ultimate custom neon and channel sign configurator for woocommerce.
Our custom neon signs configurator allows you to extend your business of personalization of neon signs by offering you a nice configurator to allow your customers to customize signs in neon, acrylic, metal, 2D and 3D, thanks to a highly configurable sign product builder.

Version: 1.0
Author: Vertim Coders
Author URI: https://vertimcoders.com
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: textdomain
Domain Path: /languages
*/

/**
 * Copyright (c) 2023 Vertim Coders. All rights reserved.
 *
 * Released under the GPL license
 * http://www.opensource.org/licenses/gpl-license.php
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 * 
 * Inspired by: https://github.com/tareq1988/vue-wp-starter
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * **********************************************************************
 */

// don't call the file directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Neon_Channel_Product_Customizer class
 *
 * @class Neon_Channel_Product_Customizer The class that holds the entire Neon_Channel_Product_Customizer plugin
 */
final class Neon_Channel_Product_Customizer {

    /**
     * Plugin version
     *
     * @var string
     */
    public $version = '1.0';

    /**
     * Holds various class instances
     *
     * @var array
     */
    private $container = array();

    /**
     * Constructor for the Neon_Channel_Product_Customizer class
     *
     * Sets up all the appropriate hooks and actions
     * within our plugin.
     */
    public function __construct() {

        $this->define_constants();

        register_activation_hook( __FILE__, array( $this, 'activate' ) );
        register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
        add_action( 'init', array( $this, 'portfolio' ) );
        add_action( 'init', array( $this, 'my_meta' ) );
    }

    /**
     * Initializes the Neon_Channel_Product_Customizer() class
     *
     * Checks for an existing Neon_Channel_Product_Customizer() instance
     * and if it doesn't find one, creates it.
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new Neon_Channel_Product_Customizer();
        }

        return $instance;
    }

    /**
     * Magic getter to bypass referencing plugin.
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __get( $prop ) {
        if ( array_key_exists( $prop, $this->container ) ) {
            return $this->container[ $prop ];
        }

        return $this->{$prop};
    }

    /**
     * Magic isset to bypass referencing plugin.
     *
     * @param $prop
     *
     * @return mixed
     */
    public function __isset( $prop ) {
        return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
    }

    /**
     * Define the constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'BELFOLIO_VERSION', $this->version );
        define( 'BELFOLIO_FILE', __FILE__ );
        define( 'BELFOLIO_PATH', dirname(BELFOLIO_FILE ) );
        define( 'BELFOLIO_INCLUDES', BELFOLIO_PATH . '/includes' );
        define( 'BELFOLIO_URL', plugins_url( '', BELFOLIO_FILE ) );
        define( 'BELFOLIO_ASSETS', BELFOLIO_URL . '/assets' );
    }

    /**
     * Load the plugin after all plugis are loaded
     *
     * @return void
     */
    public function init_plugin() {
        $this->includes();
        $this->init_hooks();
       
    }
   

    /**
     * Placeholder for activation function
     *
     * Nothing being called here yet.
     */
    public function activate() {

        $installed = get_option( 'belfolio_installed' );

        if ( ! $installed ) {
            update_option( 'belfolio_installed', time() );
        }

        update_option( 'belfolio_version',BELFOLIO_VERSION );
    }

    /**
     * Placeholder for deactivation function
     *
     * Nothing being called here yet.
     */
    public function deactivate() {

    }

    /**
     * Include the required files
     *
     * @return void
     */
    public function includes() {

        require_once BELFOLIO_INCLUDES . '/Assets.php';

        if ( $this->is_request( 'admin' ) ) {
            require_once BELFOLIO_INCLUDES . '/Admin.php';
        }

        if ( $this->is_request( 'frontend' ) ) {
            require_once BELFOLIO_INCLUDES . '/Frontend.php';
        }

        if ( $this->is_request( 'ajax' ) ) {
            // require_once BELFOLIO_INCLUDES . '/class-ajax.php';
        }

        require_once BELFOLIO_INCLUDES . '/Api.php';
    }

    /**
     * Initialize the hooks
     *
     * @return void
     */
    public function init_hooks() {

        add_action( 'init', array( $this, 'init_classes' ) );

        // Localize our plugin
        add_action( 'init', array( $this, 'localization_setup' ) );
    }

    /**
     * Instantiate the required classes
     *
     * @return void
     */
    public function init_classes() {

        if ( $this->is_request( 'admin' ) ) {
            $this->container['admin'] = new BELFOLIO\Admin();
        }

        if ( $this->is_request( 'frontend' ) ) {
            $this->container['frontend'] = new BELFOLIO\Frontend();
        }

        if ( $this->is_request( 'ajax' ) ) {
            // $this->container['ajax'] =  new BELFOLIO\Ajax();
        }

        $this->container['api'] = new BELFOLIO\Api();
        $this->container['assets'] = new BELFOLIO\Assets();
    }

    /**
     * Initialize plugin for localization
     *
     * @uses load_plugin_textdomain()
     */
    public function localization_setup() {
        load_plugin_textdomain( 'belfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    /**
     * What type of request is this?
     *
     * @param  string $type admin, ajax, cron or frontend.
     *
     * @return bool
     */
    private function is_request( $type ) {
        switch ( $type ) {
            case 'admin' :
                return is_admin();

            case 'ajax' :
                return defined( 'DOING_AJAX' );

            case 'rest' :
                return defined( 'REST_REQUEST' );

            case 'cron' :
                return defined( 'DOING_CRON' );

            case 'frontend' :
                return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
        }
    }

    public function portfolio() {


    // Enregistrement du type de publication personnalisé "portfolio"
    register_post_type('portfolio', array(
        'label' => 'Belfolio',
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title', 'editor', 'thumbnail', 'author', 'revisions', 'comments', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'labels' => array(
            'singular_name' => 'Portfolio',
            'add_new_item' => 'Add new portfolio',
            'new_item' => 'New portfolio',
            'view_item' => 'View my portfolio',
            'not_found' => 'No no i am sorry ',
            'not_found_in_trash' => 'No information found in trash',
            'all_items' => 'yours portfolio',
        ),
    ));
}
public function my_meta() {
        register_meta('post', 'formulaire', array(
            'type' => 'string',
            'description' => 'Nom et prenoms',
            'single' => true,
            'show_in_rest' => true,
            // Ajoutez d'autres arguments au besoin
        ));

        // Ajoutez d'autres enregistrements de meta au besoin
    }
    
   
       
}; // Neon_Channel_Product_Customizer

$belfolio = Neon_Channel_Product_Customizer::init();