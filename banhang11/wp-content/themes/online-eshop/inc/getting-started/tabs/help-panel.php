<?php
/**
 * Help Panel.
 *
 */
?>
<!-- Help file panel -->
<div id="help-panel" class="panel-left">

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Documentation Link', 'online-eshop' ); ?></h4>
        <p><?php esc_html_e( 'New to the WordPress world? Our documentation has step by step procedure to create a beautiful website.', 'online-eshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://themebuilderpro.com/doc/online-eshop-free/index.html' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'online-eshop' ); ?>" target="_blank">
            <?php esc_html_e( 'View Documentation', 'online-eshop' ); ?>
        </a>
    </div><!-- .panel-aside -->
    
    <div class="panel-aside">
        <h4><?php esc_html_e( 'Support Ticket', 'online-eshop' ); ?></h4>
        <p><?php printf( __( 'It\'s always a good idea to visit our %1$sKnowledge Base%2$s before you send us a support ticket.', 'online-eshop' ), '<a href="'. esc_url( 'http://themebuilderpro.com/doc/online-eshop-free/index.html' ) .'" target="_blank">', '</a>' ); ?></p>
        <p><?php esc_html_e( 'If the Knowledge Base didn\'t answer your queries, submit us a support ticket here. Our response time usually is less than a business day, except on the weekends.', 'online-eshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://themebuilderpro.com/contact/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'online-eshop' ); ?>" target="_blank">
            <?php esc_html_e( 'Contact Support', 'online-eshop' ); ?>
        </a>
    </div><!-- .panel-aside -->

    <div class="panel-aside">
        <h4><?php esc_html_e( 'View Our Online Eshop Demo', 'online-eshop' ); ?></h4>
        <p><?php esc_html_e( 'Visit the demo to get more ideas about our theme design.', 'online-eshop' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'http://themebuilderpro.com/eshop-theme/index.html' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'online-eshop' ); ?>" target="_blank">
            <?php esc_html_e( 'View Demo', 'online-eshop' ); ?>
        </a>
    </div><!-- .panel-aside -->
</div>