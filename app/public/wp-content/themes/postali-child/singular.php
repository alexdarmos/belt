<?php
/**
 * Default Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
$banner_img = get_field('hero_banner_image');
$selected_img = $banner_img['url'] ? $banner_img['url'] : '/wp-content/uploads/2022/09/default-interior-banner.jpg';

$contact_link = get_field('hero_contact_link');
?>

<div id="default-page">

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
                    <img class="banner-img" src="<?php esc_html_e($selected_img); ?>" alt="<?php esc_html_e($banner_img['alt'] ? $banner_img['alt'] : 'bookshelf in library'); ?>" title="<?php esc_html_e($banner_img['title'] ? $banner_img['title'] : 'bookshelf in library'); ?>" />
                </div>
            </div>
        </div>
    </div>
</section>

<div id="panel-1">
    <?php get_template_part('block', 'flex-content', ['data' => 'p1_flex_content']); //pass in name of acf flexible content  ?>
</div>

</div><!-- #default-page -->

<?php get_footer();?>