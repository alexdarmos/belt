<?php
/**
 * Template Name: Landing
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

// ACF Fields
$banner_img = get_field('hero_banner_image');
$contact_link = get_field('hero_contact_link');
$alabama_map = get_field('p7_map_image');

// Practice Area Query
$pa_args = [
    'post_type'         => 'page',
    'post_status'       => 'publish',
    'meta_query'        => 
    [
        [
            'key'   => '_wp_page_template',
            'value' => 'page-pa-parent.php'
        ],
        [
            'key'   => 'pa_add_to_homepage',
            'value' => true
        ]
    ]
];
$pa_query = new WP_Query( $pa_args );
?>

<div id="front-page">

    <section id="landing-hero">
        <div class="columns">
            <div class="column-40">
                <p class="banner-text"><?php the_field('hero_sub_title') ?></p>
                <div class="border-left">
                    <h1><?php the_field('hero_title'); ?></h1>
                    <p><?php the_field('hero_intro_copy'); ?></p>
                    <div class="cta-wrapper">
                        <a href="tel:<?php esc_html_e( $default_phone_number ); ?>" class="btn"><?php esc_html_e( readable_phone_numb($default_phone_number) ); ?></a>
                        <a href="<?php esc_html_e($contact_link['link']); ?>"><?php esc_html_e($contact_link['title']); ?></a>
                    </div>
                </div>
            </div>
            <div class="column-60">
                <div class="settlement-badge" style="background-image: url('<?php esc_html_e($settlement_badge['url']); ?>');">
                    <p class="settlement-number"><?php esc_html_e($number_verdicts); ?></p>
                </div>
                <img class="banner-img" src="<?php esc_html_e($banner_img['url']); ?>" title="<?php esc_html_e($banner_img['title']); ?>" alt="<?php esc_html_e($banner_img['alt']); ?>" />
            </div>
        </div>
    </section>

    <section id="panel-1">
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <div class="columns">
                        <div class="column-50">
                            <p class="small-sub-title">
                                <?php the_field('p1_sub_title'); ?>
                            </p>
                            <h2><?php the_field('p1_title'); ?></h2>
                        </div>
                        <div class="column-50">
                            <?php the_field('p1_copy'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column-full center">
                    <?php get_template_part('block', 'awards-slider'); ?>
                </div>
            </div>
        </div>
    </section>

    <div id="panel-2">
        <?php get_template_part('block', 'case-results'); ?>
    </div>

    <div id="panel-3">
        <?php get_template_part('block', 'client-reviews', ['data' => get_field('p2_reviews')]); ?>
    </div>

    <section id="panel-4" class="parallax-bg">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <p class="small-sub-title"><?php the_field('p4_title') ?></p>
                        <h2><?php the_field('p4_sub_title'); ?></h2>
                            <?php if( $pa_query->have_posts() ) : ?>
                                <div class="pa-contianer"> 
                                <?php while( $pa_query->have_posts() ) : $pa_query->the_post(); $id =  get_the_ID();
                                $banner = get_field('hero_banner_image', $id); ?>
                                    <div class="practice-area">
                                        <p class="title"><?php the_field('pa_short_title', $id); ?></p>
                                        <p class="excerpt"><?php the_field('pa_excerpt', $id); ?></p>
                                        <div class="spacer-15"></div>
                                        <a class="btn flow" href="<?php esc_html_e( get_permalink($id) ); ?>">More on <?php the_field('pa_short_title', $id); ?></a>
                                        <span class="pa-image" bg-data="<?php esc_html_e( $banner['url'] ); ?>"></span>
                                    </div>
                                <?php endwhile; ?> 
                                </div>
                            <?php endif; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-5">
        <div class="container">
            <div class="columns">
                <div class="column-33">
                    <div>
                        <p class="small-sub-title"><?php the_field('p5_sub_title'); ?></p>
                        <h2><?php the_field('p5_title'); ?></h2>
                        <div class="spacer-30"></div>
                        <p><?php the_field('p5_copy'); ?></p>
                    </div>
                </div>
                <div class="column-66">
                    <?php get_template_part('block', 'our-team'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-6">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div>
                        <p class="small-sub-title"><?php the_field('p6_sub_title'); ?></p>
                        <h2><?php the_field('p6_title'); ?></h2>
                        <div class="spacer-60"></div>
                        <?php get_template_part('block', 'accordion', ['data' => get_field('p6_faq_block')]); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-7">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <div>
                        <p class="small-sub-title"><?php the_field('p7_sub_title'); ?></p>
                        <h2><?php the_field('p7_title'); ?></h2>
                        <div class="spacer-45"></div>
                            <?php the_field('p7_intro_copy'); ?>
                            <?php if( have_rows('locations', 'options') ) : ?>
                                <div class="locations">
                                    <?php while( have_rows('locations', 'options') ) : the_row(); ?>
                                        <?php if( get_sub_field('location_internal_page_link') ) : ?>
                                            <a href="<?php the_sub_field('location_internal_page_link'); ?>" class="btn"> 
                                        <?php endif; ?>
                                        <p <?php echo !get_sub_field('location_internal_page_link') ? 'class="fake-btn"' : ''; ?> ><?php the_sub_field('location_short_title'); ?></p>
                                        <?php if( get_sub_field('location_internal_page_link') ) : ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <div class="spacer-45"></div>
                            <?php the_field('p7_copy'); ?>
                            <?php if( have_rows('p7_other_areas_served') ) : ?>
                                <div class="locations">
                                    <?php while( have_rows('p7_other_areas_served') ) : the_row(); ?>
                                        <?php if( get_sub_field('page_link') ) : ?>
                                            <a href="<?php the_sub_field('page_link'); ?>" class="btn"> 
                                        <?php endif; ?>
                                        <p <?php echo !get_sub_field('page_link') ? 'class="fake-btn"' : ''; ?> ><?php the_sub_field('title'); ?></p>
                                        <?php if( get_sub_field('page_link') ) : ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endwhile ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <div class="column-33">
                    <p class="vertical-text">Alabama Map</p>
                    <img src="<?php esc_html_e($alabama_map['url']); ?>" alt="<?php esc_html_e($alabama_map['url']); ?>" title="<?php esc_html_e($alabama_map['url']); ?>" />
                </div>
            </div>
        </div>
    </section>

</div>
<?php get_footer();?>