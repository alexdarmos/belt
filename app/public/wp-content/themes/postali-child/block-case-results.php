<?php /* Block: Case Results Slider */ ?>

<?php setlocale(LC_MONETARY, 'en_US.UTF-8');
$results_group = get_field('case_results_block', 'options');
 if( $results_group ) : ?>
    <section id="case-results-block">
        <div class="left-block" style="background-image: url('<?php esc_html_e($results_group['image']['url']); ?>');"></div>
        <div class="right-block">
            <p class="vertical-text"><?php esc_html_e($results_group['title']); ?></p>
            
            <div class="results-container">
                <?php foreach( $results_group['results'] as $result) : 
                $id = $result['result']->ID;
                $amount = get_field('amount', $id)
                ?>
                <div class="result">
                    <?php if($amount) : ?><p class="amount"><?php echo money_format("%.0n", $amount); ; ?></p><?php endif; ?>
                    <p class="title"><?php the_field('title', $id); ?></p>
                    <div class="spacer-30"></div>
                    <a class="results-next-btn" href="#/">Next Case</a>
                    <a href="/case-results/" class="btn">See All Case Results</a>
                </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </section>
<?php endif; ?>