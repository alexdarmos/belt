<?php
/**
 * Template Name: About
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$banner_img = get_field('hero_banner_image');
$contact_link = get_field('hero_contact_link');
?>

<div id="about-page">

<section id="hero">
    <div class="columns">
        <div class="column-full">
            <div class="grid grid_1-3">
                <img class="banner-img" src="<?php esc_html_e($banner_img['url']); ?>" alt="<?php esc_html_e($banner_img['alt']); ?>" title="<?php esc_html_e($banner_img['title']); ?>" />
                <div class="hero-copy">
                    <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                        <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
                    <?php endif; ?>
                    <h1><?php the_field('hero_title'); ?></h1>
                    <div class="border-left">
                        <p><?php the_field('hero_copy'); ?></p>
                        <div class="cta-wrapper">
                            <a href="tel:<?php esc_html_e( $default_phone_number ); ?>" class="btn"><?php esc_html_e( readable_phone_numb($default_phone_number) ); ?></a>
                            <a href="<?php esc_html_e( $contact_link['link'] ); ?>"><?php esc_html_e( $contact_link['title'] ); ?></a>
                        </div>
                    </div>
                    <div class="settlement-badge" style="background-image: url('<?php esc_html_e($settlement_badge['url']); ?>');">
                        <p class="settlement-number"><?php esc_html_e($number_verdicts); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <?php get_template_part('block', 'awards-slider'); ?>
            </div>
            <div class="column-66 center">
                <div>
                    <p class="small-sub-title"><?php the_field('p1_sub_title'); ?></p>
                    <h2><?php the_field('p1_title'); ?></h2>
                    <?php the_field('p1_copy'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-2">
    <?php if( have_rows('p2_more_info_ctas') ) : ?>
    <div class="container triple-card-container">
        <?php while( have_rows('p2_more_info_ctas') ) : the_row(); ?>
            <div class="single-card border-left">
                <p class="wide-text"><?php the_sub_field('title'); ?></p>
                <p><?php the_sub_field('copy'); ?></p>
                <div class="spacer-15"></div>
                <a href="<?php esc_html_e(get_sub_field('link')); ?>" class="btn">More on <?php the_sub_field('title'); ?></a>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</section>

<section id="panel-3">
    <div class="container">
        <div class="columns">
        <div class="column-33">
                    <div>
                        <p class="small-sub-title"><?php the_field('p3_sub_title'); ?></p>
                        <h2><?php the_field('p3_title'); ?></h2>
                        <div class="spacer-30"></div>
                        <p><?php the_field('p3_copy'); ?></p>
                    </div>
                </div>
                <div class="column-66">
                    <?php get_template_part('block', 'our-team'); ?>
                </div>
        </div>
    </div>
</section>

</div><!-- #about-page -->

<?php get_footer();?>