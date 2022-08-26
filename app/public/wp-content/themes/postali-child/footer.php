<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <!-- Utility Footer -->
    <section id="copyright">
        <div class="container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="copyright-links"><?php wp_nav_menu( [ 'container' => false, 'theme_location' => 'post-footer-links' ] ); ?> <p class="copyright-year">Copyright &copy; <?php echo date('Y'); ?> Excepteur sint occaecat cupidatat non proident.</p></div>
        </div>
    </section>

</footer>
<!-- Add JSON Schema here -->
    <?php 
    // Global Schema
    $global_schema = get_field('global_schema', 'options');
    if ( !empty($global_schema) ) :
        echo '<script type="application/ld+json">' . $global_schema . '</script>';
    endif;

    // Single Page Schema
    $single_schema = get_field('single_schema');
    if ( !empty($single_schema) ) :
        echo '<script type="application/ld+json">' . $single_schema . '</script>';
    endif; ?>

<?php wp_footer(); ?>
</body>
</html>


