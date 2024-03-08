<?php
namespace BELFOLIO;

/**
 * Frontend Pages Handler
 */
class Frontend {

    public function __construct() {
        add_shortcode( 'belfolio', [ $this, 'render_frontend' ] );
    }

    /**
     * Render frontend app
     *
     * @param  array $atts
     * @param  string $content
     *
     * @return string
     */
    public function render_frontend( $atts, $content = '' ) {
        wp_enqueue_style( 'belfolio-frontend' );
        wp_enqueue_style( 'belfolio-style' );
        wp_enqueue_script( 'belfolio-frontend' );

        $content .= '<div id="belfolio-frontend-app"></div>';

        return $content;
    }
}
