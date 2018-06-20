jQuery(document).ready(function() {
    jQuery('.bxslider').bxSlider({
        minSlides: <?php echo $settings->min_slides; ?>,
        maxSlides: <?php echo $settings->max_slides; ?>,
        slideWidth: <?php echo $settings->slide_width; ?>,
        slideMargin: <?php echo $settings->slide_margin; ?>,
        responsive: true,
        auto: <?php echo $settings->autoplay; ?>,
        stopAutoOnClick: true,
        pause: <?php echo $settings->autoplaySpeed; ?>,
        speed: <?php echo $settings->speed; ?>,
        autoHover: <?php echo $settings->pauseOnHover; ?>,
        mode: '<?php echo $settings->slide_mode; ?>',
        controls: <?php echo $settings->arrows; ?>,
        pager: <?php echo $settings->pagination == 'none' ? 'false' : 'true'; ?>,
        pagerType: '<?php echo $settings->pagination == 'full' ? 'full' : 'short'; ?>',
    });
});

console.log(<?php $settings->pagination ?>);
