<?php
/**
 * Testimonials Archive Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$pagination = paginate_links( array(
    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
    'current'      => max( 1, get_query_var( 'paged' ) ),
    'format'       => '?paged=%#%',
    'show_all'     => false,
    'type'         => 'plain',
    'end_size'     => 2,
    'mid_size'     => 1,
    'prev_next'    => true,
    'prev_text'    => __( '<span></span>', 'textdomain' ),
    'next_text'    => __( '<span></span>', 'textdomain' ),
    'add_args'     => false,
    'add_fragment' => '',
) );?>

<div id="testimonials-archive-page">

<section id="hero">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
            <?php yoast_breadcrumb('<p id="breadcrumbs">','</p>');  ?>
        <?php endif; ?>
        <div class="columns">
            <div class="column-full center">
                <h1>Testimonials</h1>
            </div>
        </div>
    </div>
</section>

<section id="panel-1">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div>
                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); 
                    $id = get_the_ID();
                    $thumbnail = get_field('video_thumbnail', $id);
                    $client_pa = get_bloginfo() . ' ' . get_field('practice_area', $id) . ' Client.';
                    
                    ?>

                    <div class="review-row">
                        <div class="left-block">
                            <a href="<?php the_field('video_link', $id); ?>">
                                <img src="<?php esc_html_e($thumbnail['url']) ?>" alt="<?php esc_html_e($thumbnail['alt']) ?>" title="<?php esc_html_e($thumbnail['title']) ?>"/>
                            </a>
                        </div>
                        <div class='right-block'>
                            <div class="author-row">
                                <p class="author"><?php the_field('name_of_author', $id) ?></p>
                                <span><span class="star-rating">★ ★ ★ ★ ★</span> <span><?php esc_html_e($client_pa); ?></span> </span>
                            </div>
                            <?php the_field('testimonial', $id); ?>
                            
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if( $pagination ) : ?>
<section id="panel-2">
    <div class="container">
        <div class="columns">
            <div class="column-full">
            <div id="pagination">
                <?php echo $pagination; ?>
            </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

</div><!-- #testimonials-archive-page -->

<?php get_footer();?>