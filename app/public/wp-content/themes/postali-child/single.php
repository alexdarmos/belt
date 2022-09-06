<?php
/**
 * Single Post Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$banner_img = get_field('hero_banner_image');
$contact_link = get_field('hero_contact_link');
?>

<div id="single-post">

<section id="hero">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="grid grid_1-3">
                    <div class="hero-copy">
                        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                            <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
                        <?php endif; ?>
                        <h1><?php the_field('hero_title'); ?></h1>
                    </div>
                    <img class="banner-img" src="<?php esc_html_e($banner_img['url']); ?>" alt="<?php esc_html_e($banner_img['alt']); ?>" title="<?php esc_html_e($banner_img['title']); ?>" />
                </div>
            </div>
        </div>
    </div>
</section>

<div id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <span> <span class="date"></span> <span class="category"></span> </span>
            </div>
        </div>
    </div>
    <?php get_template_part('block', 'flex-content', ['data' => 'p1_flex_content']); //pass in name of acf flexible content  ?>
</div>

<div id="panel-2">
    <?php get_template_part('block', 'related-posts', ['data' => 'p1_related_posts']); //pass in name of acf related posts repeater  ?>
</div>


</div><!-- #single-post -->

<?php get_footer();?>