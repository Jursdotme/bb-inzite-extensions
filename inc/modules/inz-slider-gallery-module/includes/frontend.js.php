
$main_gallery_args_<?php echo $id ?> = {
  lazyload: 'ondemand',
  adaptiveHeight: true,
  pauseOnHover: <?php echo $settings->pause_on_hover; ?>,
  autoplay: <?php echo $settings->autoplay; ?>,
  autoplaySpeed: <?php echo $settings->autoplay_interval_speed; ?>,
  speed: <?php echo $settings->autoplay_transition_speed; ?>,
  arrows: <?php echo $settings->show_arrows; ?>,
  dots: <?php echo $settings->navigation === 'dots' ? 'true' : 'false' ; ?>,
  fade: <?php echo $settings->fade_transition; ?>,
    <?php echo $settings->navigation === 'thumbnail' ? "asNavFor: '.fl-node- ".$id." .thumbnail-gallery'," : '' ; ?>
  prevArrow: '<a href="javascript.void(0)" type="button" class="inz-slick-prev"><i class="<?php echo $settings->prev_arrow_icon ?>"></i></a>',
  nextArrow: '<a href="javascript.void(0)" type="button" class="inz-slick-next"><i class="<?php echo $settings->next_arrow_icon ?>"></i></a>'
};

$thumbnail_gallery_args_<?php echo $id ?> = {
  lazyload: 'ondemand',
  asNavFor: '.fl-node-<?php echo $id ?> .main-gallery',
  slidesToShow: <?php echo $settings->thumbnail_count; ?>,
  pauseOnHover: <?php echo $settings->pause_on_hover; ?>,
  autoplay: <?php echo $settings->autoplay; ?>,
  autoplaySpeed: <?php echo $settings->autoplay_interval_speed; ?>,
  speed: <?php echo $settings->autoplay_transition_speed; ?>,
  slidesToScroll: 1,
  dots: false,
  centerMode: false,
  focusOnSelect: true
};


jQuery(document).ready( function() {
  jQuery('.fl-node-<?php echo $id ?> .main-gallery').slick($main_gallery_args_<?php echo $id ?>);
  jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').slick($thumbnail_gallery_args_<?php echo $id ?>);
});

jQuery( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', function() {
  jQuery('.fl-node-<?php echo $id ?> .main-gallery').slick($main_gallery_args_<?php echo $id ?>);
  jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').slick($thumbnail_gallery_args_<?php echo $id ?>);
} );

jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').imagesLoaded( function(){
  jQuery('.fl-node-<?php echo $id ?> .thumbnail-gallery').addClass('loaded').removeClass('loading');
} );

jQuery('.fl-node-<?php echo $id ?> .main-gallery').imagesLoaded( function(){
  jQuery('.fl-node-<?php echo $id ?> .main-gallery').addClass('loaded').removeClass('loading');
} );

<?php if ('true' === $settings->use_lightbox ) : ?>
  jQuery('.fancy').magnificPopup({
    closeBtnInside: false,
    type: 'image',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
    }
  }); 
<?php endif; ?>