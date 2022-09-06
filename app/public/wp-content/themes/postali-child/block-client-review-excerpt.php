<?php /* Block: Client Reviews Excerpt */ ?>

<?php 
$sidebar_testimonial = get_field('default_testimonial', 'options');

if ($sidebar_testimonial) :
    $id = $sidebar_testimonial->ID; 
?>
    <div id="review-excerpt-container">
        <p class="vertical-text">Testimonail</p>
        <div>
            <p>"<?php esc_html_e( get_field('testimonial', $id) ); ?>"</p>
            <div class="spacer-30"></div>
            <p>- <?php the_field('name_of_author', $id); ?></p>
            <div class="spacer-30"></div>
            <a href="<?php the_field('testimonial_page_link', 'options'); ?>" class="btn">Read All Reviews</a>
        </div>

    </div>
<?php endif; ?>