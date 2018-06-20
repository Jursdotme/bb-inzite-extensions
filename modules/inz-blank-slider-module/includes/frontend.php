<?php 
$related_posts = get_field($settings->acf_related, false, false);
$related_posts_str = implode(",", $related_posts);
$post_type = $settings->post_type;

$settings->{'posts_' . $post_type} = $related_posts_str;

$query = FLBuilderLoop::query($settings);
echo '<div class="bxslider">';
if ($query->have_posts()) {

    while ($query->have_posts()) {
        $query->the_post();
        ob_start();
        echo '<div class="slide">';
        echo $settings->slide_markup;
        echo '</div>';
		// Do shortcodes here so they are parsed in context of the current post.
        echo do_shortcode(ob_get_clean());
    }

}
echo '<div>';