<pre>
<?php var_dump( $settings->posts );?>
</pre>

<?php

$args = array(
    'post_type' => $settings->my_post_type_field,
    'post__in'  => $settings->posts,
);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul>';
} else {
    // no posts found
}
/* Restore original Post Data */
wp_reset_postdata();