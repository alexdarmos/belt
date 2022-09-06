<?php
/**
 * Template Name: Practice Areas Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// Practice Area Query
$pa_args = [
    'post_type'         => 'page',
    'post_status'       => 'publish',
    'meta_query'        => 
    [
        [
            'key'   => '_wp_page_template',
            'value' => 'page-pa-parent.php'
        ]
    ]
];
$pa_query = new WP_Query( $pa_args );
?>

<div id="pa-landing-page">

<section id="hero">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="column-50">
                    <h2><?php the_field('hero_title'); ?></h2>
                </div>
                <div class="column-50">
                    <p><?php the_field('hero_copy'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-1" class="parallax-bg">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <div class="pa-container">
                        <?php if( $pa_query->have_posts() ) :
                            $pa_id = $pa_query->posts[0]->ID; 
                            //getting all category options
                            $field = get_field_object('pa_category', $pa_id);
                            $field_key = $field['key'];
                            $field_obj = get_field_object($field_key);
                            $pa_categories = $field_obj['choices'];
                            //looping through each category option
                            foreach( $pa_categories as $key => $category ) {
                                $cat_added = false;
                            //looping through the practice areas, matching them to their respective category to show under the correct title
                                while( $pa_query->have_posts() ) { 
                                $pa_query->the_post(); 
                                $id =  get_the_ID();
                                $banner = get_field('hero_banner_image', $id); 
                                $current_cat = get_field('pa_category', $id);
                                if( $current_cat === $key) :  ?>    
                                    <?php if(!$cat_added) : ?><h3 class="category-title"><?php esc_html_e($category); ?></h3><?php endif; $cat_added = true; ?>
                                    <div class="practice-area">
                                        <p class="title"><?php the_field('pa_short_title', $id); ?></p>
                                        <p class="excerpt"><?php the_field('pa_excerpt', $id); ?></p>
                                        <div class="spacer-15"></div>
                                        <a class="btn flow" href="<?php esc_html_e( get_permalink($id) ); ?>">More on <?php the_field('pa_short_title', $id); ?></a>
                                        <span class="pa-image" bg-data="<?php esc_html_e( $banner['url'] ); ?>"></span>
                                    </div>
                                <?php endif;
                                }
                            }
                        endif; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

</div><!-- #pa-landing-page -->

<?php get_footer();?>