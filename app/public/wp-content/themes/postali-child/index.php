<?php
/**
 * Blog Archive Template
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
                <h1>Legal Blog</h1>
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
                    $id = $post->ID;
                    $thumbnail = get_field('hero_banner_image', $id);
                    $date = get_the_date('M d, Y');
                    $title = get_field('hero_title', $id) ? get_field('hero_title', $id) : get_the_title($id);
                    $excerpt = get_field('global_excerpt', $id);
                    $link = get_the_permalink();
                    $categories = get_the_category();
                    $category_string = '';
                    foreach($categories as $category) {
                        $category_string .= "<a href='/{$category->taxonomy}/{$category->slug}/'>{$category->name}</a>" . ($cat_count < $cat_length ? ', ' : '');
                    }
                    
                    ?>

                    <div class="post-row">
                        <div class="left-block">
                            <img src="<?php esc_html_e($thumbnail['url']) ?>" alt="<?php esc_html_e($thumbnail['alt']) ?>" title="<?php esc_html_e($thumbnail['title']) ?>"/>
                        </div>
                        <div class='right-block'>
                            <span><span class="date"><?php esc_html_e($date); ?> | </span> <span class="categories"><?php echo($category_string); ?></span> </span>
                            <p><?php esc_html_e( $title ); ?></p>
                            <p><?php esc_html_e( $excerpt ); ?></p>
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