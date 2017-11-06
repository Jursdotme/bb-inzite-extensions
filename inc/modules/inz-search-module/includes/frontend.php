<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */

?>
<div class="searchform <?php echo $settings->layout; ?>">
    <a href="#" class="searchform-trigger">
        <i class="fa fa-search" aria-hidden="true"></i>	
    </a>
    <div class="searchform-flyout">
    
        <?php if( 'dropdown' === $settings->layout ) : ?>

            <?php if( 'wp' === $settings->search_type ) { ?>
                <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                        <input type="search" class="search-field"
                            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
                            value="<?php echo get_search_query() ?>" name="s"
                            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                    </label>
                </form>
            <?php } elseif( 'wc' === $settings->search_type ) { ?>
                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <input type="hidden" name="post_type" value="product" />
            <?php } ?>
        
        <?php elseif ( 'fullwidth' === $settings->layout ) : ?>

            <?php if( 'wp' === $settings->search_type ) { ?>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                        <label>
                            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
                            <input type="search" class="search-field"
                                placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
                                value="<?php echo get_search_query() ?>" name="s"
                                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                        </label>
                    </form>
                <?php } elseif( 'wc' === $settings->search_type ) { ?>
                    <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
                    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <input type="hidden" name="post_type" value="product" />
                <?php } ?>

        <?php endif; ?>

        
    </form>
    </div>
</div>