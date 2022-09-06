<?php /* Block: Our Team */ ?>

<?php
$att_args = [
    'post_type' => 'attorneys',
    'post_status'    => 'publish'
];
$att_query = new WP_Query( $att_args );
?>

<?php if( $att_query->have_posts() ) : ?>
<div class="attorneys-grid">
    <?php while( $att_query->have_posts() ) : $att_query->the_post(); 
        $bio_pic = get_field('hero_bio_headshot'); ?>
        <img src="<?php esc_html_e($bio_pic['url']); ?>" alt="<?php esc_html_e($bio_pic['alt']); ?>" title="<?php esc_html_e($bio_pic['title']); ?>" />
        <h3 class="name"><?php the_field('hero_attorney_name'); ?></h3>
        <p class="excerpt"><?php the_field('excerpt'); ?></p>
        <a href="<?php esc_html_e( get_the_permalink() ); ?>" class="btn">Read <?php the_field('hero_attorney_name'); ?> Bio</a>
    <?php endwhile; ?>
</div>
<?php endif; wp_reset_postdata(); ?>
