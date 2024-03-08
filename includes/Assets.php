<?php
namespace BELFOLIO;

/**
 * Scripts and Styles Class
 */
class Assets {

    function __construct() {

        if ( is_admin() ) {
            add_action( 'admin_enqueue_scripts', [ $this, 'register' ], 5 );
        } else {
            add_action( 'wp_enqueue_scripts', [ $this, 'register' ], 5 );
        }
    }

    /**
     * Register our app scripts and styles
     *
     * @return void
     */
    public function register() {
        $this->register_scripts( $this->get_scripts() );
        $this->register_styles( $this->get_styles() );
    }

    /**
     * Register scripts
     *
     * @param  array $scripts
     *
     * @return void
     */
    private function register_scripts( $scripts ) {
        // Return if JS folder not exists
        if (!is_dir(BELFOLIO_PATH . '/assets/js')) {
            return;
        }

        foreach ( $scripts as $handle => $script ) {
            $deps      = isset( $script['deps'] ) ? $script['deps'] : false;
            $in_footer = isset( $script['in_footer'] ) ? $script['in_footer'] : false;
            $version   = isset( $script['version'] ) ? $script['version'] : BELFOLIO_VERSION;

            wp_register_script( $handle, $script['src'], $deps, $version, $in_footer );
        }
    }

    /**
     * Register styles
     *
     * @param  array $styles
     *
     * @return void
     */
    public function register_styles( $styles ) {
        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, BELFOLIO_VERSION );
        }
    }

    /**
     * Get all registered scripts
     *
     * @return array
     */
    public function get_scripts() {
        // Return if JS folder not exists
        if (!is_dir(BELFOLIO_PATH . '/assets/js')) {
            return;
        }

        $prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '.min' : '';

        $scripts = [
            'belfolio-runtime' => [
                'src'       => BELFOLIO_ASSETS . '/js/runtime.js',
                'version'   => filemtime( BELFOLIO_PATH . '/assets/js/runtime.js' ),
                'in_footer' => true
            ],
            'belfolio-vendor' => [
                'src'       => BELFOLIO_ASSETS . '/js/vendors.js',
                'version'   => filemtime( BELFOLIO_PATH . '/assets/js/vendors.js' ),
                'in_footer' => true
            ],
            'belfolio-frontend' => [
                'src'       => BELFOLIO_ASSETS . '/js/frontend.js',
                'deps'      => [ 'jquery', 'belfolio-vendor', 'belfolio-runtime' ],
                'version'   => filemtime( BELFOLIO_PATH . '/assets/js/frontend.js' ),
                'in_footer' => true
            ],
            'belfolio-admin' => [
                'src'       => BELFOLIO_ASSETS . '/js/admin.js',
                'deps'      => [ 'jquery', 'belfolio-vendor', 'belfolio-runtime' ],
                'version'   => filemtime(BELFOLIO_PATH . '/assets/js/admin.js' ),
                'in_footer' => true
            ]
        ];

        return $scripts;
    }

    /**
     * Get registered styles
     *
     * @return array
     */
    public function get_styles() {

        $styles = [
            'belfolio-style' => [
                'src' =>  BELFOLIO_ASSETS . '/css/style.css'
            ],
            'belfolio-frontend' => [
                'src' =>  BELFOLIO_ASSETS . '/css/frontend.css'
            ],
            'belfolio-admin' => [
                'src' =>  BELFOLIO_ASSETS . '/css/admin.css'
            ],
        ];

        return $styles;
    }

}