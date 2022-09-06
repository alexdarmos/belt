<?php /* Block: Accordion */ ?> 

<?php
$accordion = $args['data'];

if( $accordion["accordion"] ) : 
    $is_two_column = $accordion['enable_two_columns'];
    $accordion_data = $accordion['accordion'];
    $accordion_count = 0;
    $total_accordions = count($accordion_data);
?>

<div class="columns">
    <?php foreach( $accordion_data as $accordion) : $accordion_count++; ?>
        <?php if( $is_two_column === TRUE && $total_accordions > 5 && $accordion_count === 1) :  ?>
            <div class="column-50">
        <?php endif; ?>
        <div class="accordions">
            <div class="accordions_title">
                <h3><?php echo $accordion['title']; ?></h3><span class="icon"></span></div>
            <div class="accordions_content">
                <?php echo $accordion['copy']; ?>
            </div>
        </div>
        <?php if( $is_two_column === TRUE && $total_accordions > 5 && $accordion_count === 5) :  ?>
            </div>
            <div class="column-50">
        <?php endif; if ( $is_two_column === TRUE && $total_accordions > 5 && $accordion_count == $total_accordions ) : ?>
            </div>
        <?php endif;?> 
    <?php endforeach; ?>
    </div>

<?php endif; ?>