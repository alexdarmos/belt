<?php
/**
 * Template: Single Attorney
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$banner_img = get_field('hero_bio_headshot');
?>

<div id="single-attorneys-page">

<section id="hero">
    <div class="container">
        <div class="columns">
            <div class="gird grid_3-1">
                <div>
                    <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                        <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
                    <?php endif; ?>
                    <p class="wide-text"><?php the_field('hero_attorney_title'); ?></p>
                    <h1><?php the_field('hero_attorney_name'); ?></h1>
                    <div class="columns">
                        <div class="column-50 center border-left">
                            <?php the_field('hero_intro_copy'); ?>
                        </div>
                    </div>
                </div>
                <img src="<?php esc_html_e($banner_img['url']); ?>" alt="<?php  esc_html_e($banner_img['alt']); ?>" title="<?php  esc_html_e($banner_img['title']); ?>" class="banner-img">
            </div>
        </div>
    </div>
</section>

<section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-66">
                <div>
                    <p class="small-sub-title"><?php the_field('p1_sub_title'); ?></p>
                    <h2><?php the_field('p1_title'); ?></h2>
                    <?php the_field('p1_copy'); ?>
                </div>
            </div>
            <div class="column-33">
                <div>
                    <?php get_template_part('block', 'client-review-excerpt'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-2">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div>
                    <?php get_template_part('block', 'awards-slider'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-3">
    <div class="container">
        <div class="columns">
            <div class="column-full center">
                <h2><?php the_field('p3_title'); ?></h2>
                <?php get_template_part('block', 'accordion', ['data' => get_field('p3_accordion_block')]); ?>
            </div>
        </div>
    </div>
</section>

</div><!-- #single-attorneys-page -->

<?php get_footer();?>