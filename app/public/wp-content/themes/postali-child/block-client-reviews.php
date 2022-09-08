<?php /* Block: Client Reviews */ ?>


<?php $reviews_block = get_field('client_reviews_block', 'options'); 
$custom_reviews = $args['data'];
$query_args = [
    'post_type'         => 'testimonials',
    'post_status'       => 'publish',
    'posts_per_page'    => 3,
];
$testimonial_query = new WP_Query($query_args);
$count = 0;

function build_reivews($id, $count) {
    $author = get_field('name_of_author', $id);
    $testimonial = get_field('testimonial', $id);
    $video_link = get_field('video_link', $id);
    $is_reverse = $count % 2 !== 0 ? '' : ' reverse-row';
    $thumbnail = get_field('video_thumbnail', $id);
    $thumbnail_url = $thumbnail['url'];
    $thumnail_alt = $thumbnail['alt'];
    $thumbnail_title = $thumbnail['title'];
    
    $review_block = "
    <div class='left-block block_{$count}'>
        <p>{$testimonial}</p>
        <div class='author-row'>
            <p class='author'>${author}</p>
            <img src='/wp-content/uploads/2022/08/google-reviews-logo-white.png' alt='google review logo' title='google review logo'/>
        </div>
    </div>
    <div class='right-block block_{$count}'>
        <a href='{$video_link}'>
            <img src='{$thumbnail_url}' alt='{$thumbnail_alt}' title='{$thumbnail_title}'/>
        </a>
    </div>";
    return $review_block;
} ?>

<section id="client-reviews-block">
    <div class="container">
        <div class="columns">
            <div class="column-40">
                <div>
                    <span> <span class="small-sub-title"><?php esc_html_e($reviews_block['sub_title']); ?></span> <span class="star-rating">★ ★ ★ ★ ★</span> </span>
                    <h2><?php esc_html_e($reviews_block['title']); ?></h2>
                    <div class="spacer-30"></div>
                    <?php echo $reviews_block['copy'] ?>
                    <a href="<?php esc_html_e($reviews_block['read_more_link']['link']); ?>" class="btn"><?php esc_html_e($reviews_block['read_more_link']['title']); ?></a>
                </div>
            </div>
            <div id="reviews-container" class="column-60">
                <?php if( $custom_reviews ) { 
                    foreach( $custom_reviews as $review) {
                        $count++;
                        echo build_reivews($review['review']->ID, $count);
                    }
                } else {
                    if( $testimonial_query->have_posts() ) {
                        while( $testimonial_query->have_posts() ) {
                            $testimonial_query->the_post();
                            $count++;
                            echo build_reivews(get_the_ID(), $count);
                        }
                    }
                } ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>