<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$banner_img = get_field('hero_banner_image');
$contact_link = get_field('hero_contact_link');
?>

<div id="pa-parent-page">

    <section id="hero" style="background-image: url('<?php esc_html_e($banner_img['url']); ?>')">
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h1><?php the_field('hero_title'); ?></h1>
                </div>
                <div class="column-50">
                    <div class="border-left">
                        <p><?php the_field('hero_copy'); ?></p>
                        <div class="cta-wrapper">
                            <a href="tel:<?php esc_html_e( $default_phone_number ); ?>" class="btn"><?php esc_html_e( readable_phone_numb($default_phone_number) ); ?></a>
                            <a href="<?php esc_html_e( $contact_link['link'] ); ?>"><?php esc_html_e( $contact_link['title'] ); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="settlement-badge" style="background-image: url('<?php esc_html_e($settlement_badge['url']); ?>');">
                <p class="settlement-number"><?php esc_html_e($number_verdicts); ?></p>
            </div>
        </div>
    </section>

    <div id="panel-1">
        <?php get_template_part('block', 'flex-content', ['data' => 'p1_flex_content']); //pass in name of acf flexible content  ?>
    </div>

    <section id="panel-2">
        <?php get_template_part('block', 'awards-slider'); ?>
    </section>

    <div id="panel-3">
        <?php get_template_part('block', 'flex-content', ['data' => 'p3_flex_content']); //pass in name of acf flexible content  ?>
    </div>

    <div id="panel-4">
        <?php get_template_part('block', 'client-reviews', ['data' => get_field('p4_reviews')]); ?>
    </div>

    <div id="panel-5">
        <?php get_template_part('block', 'flex-content', ['data' => 'p5_flex_content']); //pass in name of acf flexible content  ?>
    </div>

    <div id="panel-6">
        <?php get_template_part('block', 'case-results'); ?>
    </div>

    <div id="panel-7">
        <?php get_template_part('block', 'flex-content', ['data' => 'p7_flex_content']); //pass in name of acf flexible content  ?>
    </div>

</div><!-- #pa-parent-page -->

<?php get_footer();?>