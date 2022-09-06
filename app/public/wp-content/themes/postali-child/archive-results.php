<?php
/**
 * Results Archive Template
 * @package Postali Child
 * @author Postali LLC
**/
get_header();
setlocale(LC_MONETARY, 'en_US.UTF-8');

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
) );
?>

<div id="results-archive-page">

<section id="hero">
    <div class="container">
        <div class="columns">
            <div class="column-full center">
                <h1>Results</h1>
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
                    $amount = get_field('amount', $id)?>
                    <div class="result">
                        <p class="amount"><?php echo money_format("%.0n", $amount); ; ?></p>
                        <h2 class="title"><?php the_field('title', $id); ?></h2>
                        <?php the_field('copy', $id); ?>
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

</div><!-- #results-archive-page -->

<?php get_footer();?>