<?php
namespace BELFOLIO;

/**
 * Admin Pages Handler
 */
class Admin {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register our menu page
     *
     * @return void
     */
    public function admin_menu() {
        global $submenu;

        $capability = 'manage_options';
        $slug       = 'belfolio';

        $hook = add_menu_page( __( 'BELFOLIO', 'BELFOLIO' ), __( 'BELFOLIO', 'BELFOLIO' ), $capability, $slug, [ $this, 'plugin_page' ], 'dashicons-layout' );

        if ( current_user_can( $capability ) ) {
            $submenu[ $slug ][] = array( __( 'App', 'BELFOLIO' ), $capability, 'admin.php?page=' . $slug . '#/' );
            $submenu[ $slug ][] = array( __( 'Options', 'BELFOLIO' ), $capability, 'admin.php?page=' . $slug . '#/options' );
        }

        add_action( 'load-' . $hook, [ $this, 'init_hooks'] );
    }

    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'belfolio-admin' );
        wp_enqueue_style( 'belfolio-style' );
        wp_enqueue_script( 'belfolio-admin' );
        wp_enqueue_media();
    }

    /**
     * Render our admin page
     *
     * @return void
     */
    public function plugin_page() {
        echo '<div class="wrap"><div id="belfolio-admin-app"></div></div>';
        $rest_url = get_rest_url()."belfolio/v1";
        wp_localize_script( 'belfolio-admin', 'belfolio_rest_url', $rest_url );

    }
}
