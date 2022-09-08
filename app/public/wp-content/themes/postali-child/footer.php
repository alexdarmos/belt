<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
$default_phone_number = get_field('default_phone_number', 'options');
$footer_img = get_field('image', 'options');
?>
<footer>
    <!-- Utility Footer -->
    <section class="grid grid_2-1">
        <!-- <div > -->
            <div class="wrapper">
                <?php the_custom_logo(); ?>
                <div class="cta-wrapper">
                    <p class="cta-top-text"><?php the_field('cta_text', 'options'); ?></p>
                    <a href="tel:<?php esc_html_e( $default_phone_number ); ?>" class="btn"><?php esc_html_e( readable_phone_numb($default_phone_number) ); ?></a>
                    <a href="<?php the_field('contact_page_link', 'options'); ?>">Fill Out Our Online Form</a>
                </div>
                
                <?php if( have_rows('locations', 'options') ) : ?>
                <div class="primary-location">
                    <?php while( have_rows('locations', 'options') ) : the_row(); ?>
                        <?php if( get_sub_field('location_primary_location') ) : ?>
                            <div class="address-wrapper">
                                <span class="address-pin"></span>
                                <span class="address">
                                    <p><?php esc_html_e( get_sub_field('location_address') ); ?></p> 
                                    <a target="_blank" title="driving directions" href="<?php esc_html_e( get_sub_field('location_google_maps_url') ); ?>">Driving Directions</a>
                                </span>
                            </div>
                            <?php the_sub_field('location_map_iframe_embed'); ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                
                <p><?php the_field('cta_copy', 'options'); ?></p>
                <div class="spacer-30"></div>
                <p class="privacy-policy"><?php the_field('privacy_copy', 'options'); ?></p>
                <?php wp_nav_menu( [ 'container' => false, 'theme_location' => 'footer-nav' ] ); ?> 
            </div>
            <img class="banner-img" src="<?php esc_html_e($footer_img['url']); ?>" alt="<?php esc_html_e($footer_img['url']); ?>" title="<?php esc_html_e($footer_img['url']); ?>" />
        <!-- </div> -->
    </section>

</footer>
<!-- Add JSON Schema here -->
    <?php 
    // Global Schema
    $global_schema = get_field('global_schema', 'options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . $global_schema . '</script>';
    endif;

    // Single Page Schema
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) :
        echo '<script type="application/ld+json">' . $single_schema . '</script>';
    endif; ?>

<?php wp_footer(); ?>
</body>
</html>


