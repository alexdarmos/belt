<?php /* Block: Flexible Content */ ?>

<?php $flex_content = $args['data']; ?>
<?php if( have_rows( $flex_content ) ) : ?>
    <?php while( have_rows( $flex_content ) ) : the_row();?>
        <section>
            <div class="container">
                <div class="columns">
                    <div class="column-full">
                        <div class="flex-content">
                            <?php if( get_sub_field('sub_title') ) : ?><p class="small-sub-title"><?php the_sub_field('sub_title'); ?></p><?php endif; ?>
                            <?php if( get_sub_field('title') ) : ?><h2><?php the_sub_field('title'); ?></h2><?php endif; ?>
                            <?php the_sub_field('copy'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>