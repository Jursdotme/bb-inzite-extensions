<?php

add_action( 'wp_ajax_mishagetposts', 'rudr_get_posts_ajax_callback' ); // wp_ajax_{action}
function rudr_get_posts_ajax_callback()
{

    // we will pass post IDs and titles to this array
    $return = array();

    // you can use WP_Query, query_posts() or get_posts() here - it doesn't matter
    $search_results = new WP_Query( array(
        's'                   => $_GET['q'], // the search query
        'post_status'         => 'publish', // if you don't want drafts to be returned
        'ignore_sticky_posts' => 1,
        'posts_per_page'      => 50, // how much to show at once
    ) );
    if ( $search_results->have_posts() ):
        while ( $search_results->have_posts() ): $search_results->the_post();
            // shorten the title a little
            $title    = ( mb_strlen( $search_results->post->post_title ) > 50 ) ? mb_substr( $search_results->post->post_title, 0, 49 ) . '...' : $search_results->post->post_title;
            $return[] = array( $search_results->post->ID, $title ); // array( Post ID, Post Title )
        endwhile;
    endif;
    echo json_encode( $return );
    die;
}

/**
 * @class InzitePostsModuleClass
 */
class InzitePostsModuleClass extends FLBuilderModule
{

    /**
     * @method __construct
     */
    public function __construct()
    {
        parent::__construct( array(
            'name'            => __( 'Inzite Posts', 'fl-builder' ),
            'description'     => __( '', 'fl-builder' ),
            'category'        => __( 'Inzite', 'fl-builder' ),
            'partial_refresh' => true,
            'icon'            => 'text.svg',
        ) );
    }

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'InzitePostsModuleClass', array(
    'general' => array(
        'title'    => __( 'General', 'fl-builder' ),
        'sections' => array(
            'general' => array(
                'title'  => 'Posts',
                'fields' => array(
                    'my_post_type_field' => array(
                        'type'    => 'post-type',
                        'label'   => __( 'Post Type', 'fl-builder' ),
                        'default' => 'post',
                    ),
                    'posts'              => array(
                        'type'    => 'inz-select-field',
                        'preview' => array(
                            'type' => 'none',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'markup'  => array(
        'title'    => __( 'Markup', 'fl-builder' ),
        'sections' => array(
            'markup' => array(
                'title'  => 'Markup',
                'fields' => array(
                    'html_editor_field' => array(
                        'type'   => 'code',
                        'editor' => 'html',
                        'rows'   => '18',
                    ),
                ),
            ),
        ),
    ),
    'styling' => array(
        'title'    => __( 'CSS', 'fl-builder' ),
        'sections' => array(
            'styling' => array(
                'title'  => 'CSS',
                'fields' => array(
                    'css_editor_field' => array(
                        'type'   => 'code',
                        'editor' => 'css',
                        'rows'   => '18',
                    ),
                ),
            ),
        ),
    ),
) );
