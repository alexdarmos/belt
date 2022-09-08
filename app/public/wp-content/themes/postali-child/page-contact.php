<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$form = get_field('hero_contact_form') ? get_field('hero_contact_form') : get_field('default_contact_form', 'options');

if( have_rows('locations', 'options') ) {
    while( have_rows('locations', 'options') ) {
        the_row();
        if( get_sub_field('location_primary_location') ) {
            $primary_address = get_sub_field('location_address');
            $primary_directions = get_sub_field('location_google_maps_url');
        }
    }
} ?>

<div id="contact-page">

    <section id="hero">
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
            <?php endif; ?>
            <div class="columns">
                <div class="column-50">
                    <h1><?php the_field('hero_title'); ?></h1>
                    <div class="cta-wrapper">
                        <div>
                            <p><?php the_field('hero_cta_title'); ?></p>
                            <a href="tel:<?php esc_html_e( $default_phone_number ); ?>" class="btn"><?php esc_html_e( readable_phone_numb($default_phone_number) ); ?></a>
                        </div>
                        <div>
                            <p class="address"><?php esc_html_e($primary_address); ?></p>
                            <a target="_blank" href="<?php esc_html_e($primary_directions); ?>" class="directions">Driving Directions</a>
                        </div>
                    </div>
                </div>
                <div class="column-50">
                    <div class="border-left">
                        <?php echo do_shortcode($form); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <?php 
    if( have_rows('locations', 'options') ) :
        while( have_rows('locations', 'options') ) :
            the_row();
            $background_img = get_sub_field('location_banner_image', 'options'); ?>
            <section class="locaiton grid grid_3-1">
                <div style="background-image: url('<?php esc_html_e($background_img['url']); ?>');">
                    <div class="location-details">
                        <h2><?php the_sub_field('location_short_title'); ?></h2>
                        <p class="address"><?php the_sub_field('location_address'); ?></p>
                        <a target="_blank" href="<?php the_sub_field('location_google_maps_url'); ?>" class="directions">Driving Directions</a>
                        <a href="<?php the_sub_field('location_internal_page_link'); ?>" class="btn">More on <?php the_sub_field('location_short_title'); ?></a>
                    </div>
                </div>
                <div class="map-container">
                    <?php the_sub_field('location_map_iframe_embed'); ?>
                </div>
            </section>
        <?php endwhile;
    endif; ?>

</div><!-- #contact-page -->

<?php get_footer();?>