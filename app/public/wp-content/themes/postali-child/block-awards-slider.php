<?php /* Block: Awards Slider */ ?>
<div id="awards-slider" class="slide">
    <?php $n=1 ?>
    <?php if( have_rows('awards','options') ): ?>
    <?php while( have_rows('awards','options') ): the_row(); $badge = get_sub_field('badge'); ?>  
        <div class="column-50" id="award_<?php echo $n; ?>">
            <img src="<?php esc_html_e($badge['url']); ?>" />
        </div>
        <?php $n++; ?>
    <?php endwhile; ?>
    <?php endif; ?> 
</div>