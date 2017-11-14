  .searchform {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: reverse;
        -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
  }
  .searchform-trigger {
    text-decoration: none;
    display: inline-block;
    color: #<?php echo $settings->icon_color; ?> !important;
    background-color: #<?php echo $settings->bg_color; ?>;
    height: <?php echo $settings->height; ?>px;
    width: <?php echo $settings->width; ?>px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }
  .searchform-trigger:hover {
    text-decoration: none;
  }
  .dropdown .searchform {
    position: relative;
  }
  .dropdown .searchform-flyout {
    z-index: 1;
    position: absolute;
    top: calc(100% + 10px);
    right: 0;
    -webkit-transform: scale(0);
            transform: scale(0);
    -webkit-transition: -webkit-transform 0.2s ease-out;
    transition: -webkit-transform 0.2s ease-out;
    transition: transform 0.2s ease-out;
    transition: transform 0.2s ease-out, -webkit-transform 0.2s ease-out;
    -webkit-transform-origin: 90% 0%;
            transform-origin: 90% 0%;
  }
  .dropdown .searchform-flyout.active {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  .dropdown .searchform-flyout:before {
    content: "";
    position: absolute;
    bottom: 100%;
    right: 10%;
    width: 0px;
    height: 0px;
    border: 5px solid transparent;
    border-bottom: 5px solid #fff;
  }
  .dropdown. searchform-flyout input {
    border: 0;
    padding: 0.25rem 0.5rem;
    border-radius: 3px;
  }
  

  .fullwidth .searchform-flyout {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    transform: scale(0, 1);
    opacity: 0;
    transform-origin: center right;
    transition: all .2s ease-out;
  }
  .fullwidth .searchform-flyout.active {
    transform: scale(1, 1);
    opacity: 1;
  }
  .fullwidth .searchform-flyout,
  .fullwidth input,
  .fullwidth form,
  .fullwidth label,
  .fullwidth input {
    height: 100% !important;
  }
  .fullwidth label {
    width: calc(100% - <?php echo $settings->width; ?>px);
  }

  .fullwidth input {
    border: 0;
    border-radius: 0;
  }