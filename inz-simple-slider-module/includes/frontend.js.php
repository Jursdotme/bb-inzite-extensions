simple_slider_load = function() {
    jQuery('.inz-simple-slider').slick({
        lazyLoad: 'progressive',
        autoplay: <?php echo $settings->autoplay; ?>,
        autoplaySpeed: <?php echo $settings->autoplaySpeed; ?>,
        speed: <?php echo $settings->speed; ?>,
        fade: <?php echo $settings->fade; ?>,
        cssEase: 'linear',
        arrows: <?php echo $settings->arrows; ?>,
        dots: <?php echo $settings->dots; ?>,
        pauseOnHover: <?php echo $settings->pauseOnHover; ?>,
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>'
    });
};

jQuery('.inz-simple-slider').on('init', function(event, slick) {
    var first_item = jQuery('.inz-simple-slider__item-container').first();
    jQuery('.inz-simple-slider__item', first_item)
        .css('background-image', 'url(' + jQuery(first_item).data('inz-lazy') + ')');
});

jQuery(document).ready(function() {
    //simple_slider_load();
});

jQuery('.fl-builder-content').on('fl-builder.layout-rendered', simple_slider_load());

load_slide_inz = jQuery('.inz-simple-slider').on('beforeChange', function(event, slick, current_slide_index, next_slide_index) {
    var img = jQuery(event.currentTarget).find("[data-slick-index='" + next_slide_index + "']"),
        img2 = jQuery(event.currentTarget).find("[data-slick-index='" + (next_slide_index + 1) + "']");

    jQuery('.inz-simple-slider__item', img).css('background-image', 'url(' + img.data('inz-lazy') + ')');

    setTimeout(function() {
        jQuery('.inz-simple-slider__item', img2).css('background-image', 'url(' + img2.data('inz-lazy') + ')');
    }, 300);
});
