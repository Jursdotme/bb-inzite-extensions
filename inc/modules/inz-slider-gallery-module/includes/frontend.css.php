.slick-slide:focus {
    outline: 0;
}

.no-images {
    margin: 0;
    text-align: center;
    border: 2px dotted;
    border-radius: 5px;
    padding: 2rem;
    opacity: .3;
}

.inz-slick-prev,
.inz-slick-next {
    font-size: <?php echo $settings->arrow_size; ?>px;
    line-height: 0;
    position: absolute;
    top: 50%;
    display: block;
    min-width: 20px;
    min-height: 20px;
    padding: 0;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    cursor: pointer;
    color: <?php echo $settings->arrow_color; ?>;
    border: none;
    outline: none;
    background: transparent;
}

.inz-slick-prev:hover,
.inz-slick-next:hover,
.inz-slick-prev:focus,
.inz-slick-next:focus {
    text-decoration: none;
    color: <?php echo $settings->arrow_color; ?>;
}

.inz-slick-prev {
    left: 0;
    z-index: 1;
}
.inz-slick-next {
    right: 0;
}

.thumbnail-gallery img {
    margin: <?php echo $settings->thumbnail_margin; ?>px calc(0.5 * <?php echo $settings->thumbnail_margin; ?>px) 0 calc(0.5 * <?php echo $settings->thumbnail_margin; ?>px);
}

.thumbnail-gallery .slick-list{
    margin: 0 calc(0.5 * -<?php echo $settings->thumbnail_margin; ?>px);
    
}

.loading {
    opacity: 0;
    display: none;
    transition: opacity .5s ease-out;
    transition-delay: 1s;
}

.loaded {
    display: block;
    opacity: 1;
    transition-delay: 1s;
    transition: opacity .5s ease-out;
}