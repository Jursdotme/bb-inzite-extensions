jQuery(document).ready(function(){
  
  jQuery('.fl-node-<?php echo $id ?> .main-gallery').slick({
    lazyload: 'ondemand',
    arrows: <?php echo $settings->show_arrows; ?>,
    dots: <?php echo $settings->navigation === 'dots' ? 'true' : 'false' ; ?>,
    fade: <?php echo $settings->fade_transition; ?>,
    <?php echo $settings->navigation === 'thumbnail' ? "asNavFor: '.fl-node- ".$id." .thumbnail-gallery'," : '' ; ?>
    prevArrow: '<a href="javascript.void(0)" type="button" class="inz-slick-prev"><i class="<?php echo $settings->prev_arrow_icon ?>"></i></a>',
    nextArrow: '<a href="javascript.void(0)" type="button" class="inz-slick-next"><i class="<?php echo $settings->next_arrow_icon ?>"></i></a>'
  });

  jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').slick({
    lazyload: 'ondemand',
    asNavFor: '.fl-node-<?php echo $id ?> .main-gallery',
    slidesToShow: <?php echo $settings->thumbnail_count; ?>,
    slidesToScroll: 1,
    dots: false,
    centerMode: false,
    focusOnSelect: true
  });

});

jQuery(function() {
    jQuery('.lazy').Lazy();
});

// On swipe event
jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').on('init', function(event, slick, direction){
  jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').addClass('loaded').removeClass('loading');
});