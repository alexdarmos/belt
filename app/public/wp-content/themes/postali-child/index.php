<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'post',
	'post_per_page' => '10',
	'post_status' => 'publish',
	'order' => 'DESC',
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="page-content">

    <div id="blog-holder">
        <div class="container blog-posts">
            <div id="blog-banner">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <h1>Legal Blog</h1>
            </div>
            <div class="content">
                <div class="blog-feed">
                <?php $first = true; ?>
                    <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <article>
                            <div class="blog-feed-article-content">
                                <div class="post_image">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                    <div class="featured-wrap" style="background: url('<?php echo esc_attr( $background_img[0] ); ?>' ) no-repeat;"></div>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php the_posts_pagination(); ?>
            </div>
        </div><!-- #content -->
    </div>

</div>

<?php get_footer(); ?>
