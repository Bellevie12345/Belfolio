<?php
namespace BELFOLIO\Api;

use WP_Query;

use WP_REST_Controller;

/**
 * REST_API Handler
 */
class Portfolio_Cpt extends WP_REST_Controller {

    /**
     * [__construct description]
     */
    public function __construct() {
        $this->namespace = 'belfolio/v1';
        $this->rest_base = 'belfolio';
    }

    /**
     * Register the routes
     *
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'get_items' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                ),
                array(
                    'methods'             => \WP_REST_Server::CREATABLE,
                    'callback'            => array( $this, 'create_portfolio_item' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ), 
                )
            )
        );

        register_rest_route(

            $this->namespace,
            '/' . $this->rest_base."/(?P<portfolio_id>\d+)",
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'get_item' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                    'args'                => array(
                        'portfolio_id'  => array(
                            'type'      => 'integer',
                            'required'  => true,
                        )
                    )
                ),
                array(
                    'methods'             => \WP_REST_Server::EDITABLE,
                    'callback'            => array( $this, 'update_item' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                    'args'                => array(
                        'portfolio_id'  => array(
                            'type'      => 'integer',
                            'required'  => true,
                        )
                    )
                ),
                array(
                    'methods'             => \WP_REST_Server::DELETABLE,
                    'callback'            => array( $this, 'delete_item' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                    'args'                => array(
                        'portfolio_id'  => array(
                            'type'      => 'integer',
                            'required'  => true,
                        )
                    )
                )
            )

        );
    }
    
    /**
     * create portfolio item.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

    public function create_portfolio_item ( $request ) {

        $param=json_decode($request->get_body(),true);

        // var_dump($param);

        // die();

        $post_id= wp_insert_post(array(

            'post_title' => $param['title'],

            'post_content' => $param['content'],
            
            'post_type' => 'portfolio',
            
            // 'post_meta' => [
                
            //     'formulaire' => []

            // ],
            
            'post_status' => 'publish'
            
            ));

        if(!is_wp_error($post_id)) {

            $meta = array(

                'identifier'    => $param['identifier'],

                'photo'         => $param['photo'],

                'realization'   => $param['realization'],

                'profile'       => $param['profile'],

                'profession'       => $param['profession'],

                'description'   => $param['description'],

                'skills'        => $param['skills'],

                'education'     => $param['education'],
                
                'experience'    => $param['experience'],

                'cv'            => $param['cv'],

                'contact'       => $param['contact'],

                'email'         => $param['email'],

                'network'       => $param['network']

            );

            update_post_meta($post_id, 'formulaire', $meta);

            return rest_ensure_response(["success" => true, "message" => "Configuration created with success", "post_id" => $post_id]);

        } else {

            return rest_ensure_response(["success" => false, "message" => "Registration failed"]);

        }

    }

    /**
     * get portfolio item.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

     public function get_item($request) {

        $id = $request -> get_param('portfolio_id');

        if($id != 0) {

             $meta_value = get_post_meta($id, 'formulaire', true);
    
             if(is_array($meta_value) && !empty($meta_value)){

                 $post_data = array(

                    'ID'            => $id,

                    'post_title'    => get_the_title($id),

                    'post_content'  => get_post_field('post_content', $id),

                    'identifier'    => $meta_value['identifier'],

                    'photo'         => $meta_value['photo'],

                    'realization'   => $meta_value['realization'],

                    'profile'       => $meta_value['profile'],

                    'profession'       => $meta_value['profession'],

                    'description'   => $meta_value['description'],

                    'skills'        => $meta_value['skills'],

                    'education'     => $meta_value['education'],
                    
                    'experience'    => $meta_value['experience'],

                    'cv'            => $meta_value['cv'],

                    'contact'       => $meta_value['contact'],

                    'email'         => $meta_value['email'],

                    'network'       => $meta_value['network']

                 );
                 
                 return rest_ensure_response($post_data);

                } else {
            
                    return rest_ensure_response(["success" => false, "message" => 'portfolio not found or not valid']);
            
                }

            } else {

                return rest_ensure_response(["success" => false, "message" => 'Custom ID invalid']);

            }

        }

       /**
     * update portfolio item.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

     public function update_item( $request ) {

        $portfolio_data = json_decode($request -> get_body(),true);

        $portfolio_id = $request -> get_param( 'portfolio_id' );

        $args = array(

            'ID'            => $portfolio_id,

            'post_title'    => $portfolio_data['title'],
            
            'post_content'  => $portfolio_data['content'],

        );

        $updated = wp_update_post( $args );

        if( !is_wp_error($updated) ) {

            $data = [

                'identifier'    => $portfolio_data['identifier'],

                'photo'         => $portfolio_data['photo'],

                'realization'   => $portfolio_data['realization'],

                'profile'       => $portfolio_data['profile'],

                'profession'       => $portfolio_data['profession'],

                'description'   => $portfolio_data['description'],

                'skills'        => $portfolio_data['skills'],

                'education'     => $portfolio_data['education'],
                    
                'experience'    => $portfolio_data['experience'],

                'cv'            => $portfolio_data['cv'],

                'contact'       => $portfolio_data['contact'],

                'email'         => $portfolio_data['email'],

                'network'       => $portfolio_data['network']

            ];

            update_post_meta($portfolio_id, 'formulaire', $data);

            return rest_ensure_response(["success" =>true, "message" => "Configuration successful", "parent_id" => $portfolio_id]);

        } else {

            return rest_ensure_response(["success" => false, "message" => "registration failed"]);
            
        }

    }



      /**
     * delete portfolio item.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

     public function delete_item( $request ) {

        $portfolio_id = $request -> get_param( 'portfolio_id' );

        if( $portfolio_id != 0 ) {

            $remove_section = wp_delete_post($portfolio_id, true);

            if( $remove_section != null && $remove_section != false ) {

                return rest_ensure_response(["success" => true, "message" => "The section was well removed"]);

            } else {

                return rest_ensure_response(["success" => false, "message" => "Deleting the section failed"]);

            }

        } else {

            return rest_ensure_response(["success" => false, "message" => "Deleting the section failed"]);

        }

    }

    


    /**
     * get portfolio items.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

    public function get_items ( $request ) {
    
                $args = get_posts( array (
                    
                    'post_type' => 'portfolio',
                    
                    'post_status' => 'publish',
                    
                    'posts_per_page' => -1
                
                ));
            
                $formatted_portfolio = array();

                foreach($args as $arg) {

                        $post_data = array(
                
                            'ID' => $arg->ID,
                
                            'post_title' => $arg->post_title,
                
                            'post_content' => $arg->post_content,
                
                        );

                        $meta_values = get_post_meta($arg->ID);

                        foreach ($meta_values as $meta_key => $meta_value) {

                            $meta_value = maybe_unserialize($meta_value[0]);
                        
                            $post_data[$meta_key] = $meta_value;
        
                        }

                        $formatted_portfolio[] = $post_data;
                       
                    }

                return rest_ensure_response($formatted_portfolio);
    
            }



    /**
     * Checks if a given request has access to read the items.
     *
     * @param  WP_REST_Request $request Full details about the request.
     *
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function get_items_permissions_check( $request ) {
        return true;
    }

    /**
     * Retrieves the query params for the items collection.
     *
     * @return array Collection parameters.
     */
    public function get_collection_params() {
        return [];
    }
}
