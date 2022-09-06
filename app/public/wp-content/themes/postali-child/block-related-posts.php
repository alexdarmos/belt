<?php /* Block: Related Posts */ ?>

<?php 

$all_categories = get_the_category($post->ID); 
$primary_category = '';
$count = 0;
foreach($all_categories as $category) {
    if( $count < 1 ) {
        $primary_category = $category->name;
    }
    $count++;
}
$custom_posts = get_field($args['data']);
$query_args = [
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page'    => 3,
    'post__not_in'      => array( $post->ID ),
    'category_name'     => $primary_category

];
$related_posts_query = new WP_Query($query_args);

function related_post($id) {
    $date = get_the_date('M d, Y', $id);
    $title = get_field('hero_title', $id) ? get_field('hero_title', $id) : get_the_title($id);
    $excerpt = get_field('global_excerpt', $id);
    $categories = get_the_category($id);
    $category_string = '';
    $link = get_the_permalink($id);
    $cat_count = 0;
    $cat_length = count($categories);
    foreach($categories as $category) {
        $cat_count++;
        $category_string .= "<a href='/{$category->taxonomy}/{$category->slug}/'>{$category->name}</a>" . ($cat_count < $cat_length ? ', ' : '');
    }

    $review_block =
    "<div class='single-card border-left'>
        <span><span class='date'>{$date}</span><span class='categories'>{$category_string}</span></span>
        <a href='{$link}'><p class='wide-text'>{$title}</p></a>
        <div class='spacer-15'></div>
        <p>{$excerpt}</p>
        
    </div>";
    return $review_block;
} ?>

<section id="related-posts-block">
    <div class="container triple-card-container">
        
        <div id="posts-container" class="column-60">
            <?php if( $custom_posts ) { 
                foreach( $custom_posts as $post) {
                    echo related_post($post['blog_post']->ID);
                }
            } else {
                if( $related_posts_query->have_posts() ) {
                    while( $related_posts_query->have_posts() ) {
                        $related_posts_query->the_post();
                        echo related_post(get_the_ID());
                    }
                }
            } ?>
            <?php wp_reset_postdata(); ?>
        </div>
        
    </div>
</section>