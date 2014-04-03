	<footer id="mastfoot">
    	<?php 
		if ( is_active_sidebar( 'sidebar-7' ) ) {
		?>
        <div class="taxonom">
        	<div class="container">
            	<?php dynamic_sidebar( 'sidebar-7' ); ?>
            </div>
        </div>
        <?php }?>
    	<?php 
		if ( is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) || 
		     is_active_sidebar( 'sidebar-5' ) || is_active_sidebar( 'sidebar-6' ) ) {
		?>
    	<div class="widgets">
        	<div class="container">
            	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <div class="widget-area">
                        <?php dynamic_sidebar( 'sidebar-3' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                    <div class="widget-area">
                        <?php dynamic_sidebar( 'sidebar-4' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
                    <div class="widget-area">
                        <?php dynamic_sidebar( 'sidebar-5' ); ?>
                    </div>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?>
                    <div class="widget-area text-right">
                        <?php dynamic_sidebar( 'sidebar-6' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php }?>
    	<div class="copyright text-center">
    	<?php if ( optionsframework_get_option( 'copyright' ) != '' ): ?>
		<?php echo optionsframework_get_option( 'copyright' ); ?>
        <?php endif;?>
        <div>
    </footer>
	<?php wp_footer(); ?>
</body>
<?php if ( optionsframework_get_option( 'custom_js' ) != '' ): ?>
<?php echo optionsframework_get_option( 'custom_js' ); ?>
<?php endif;?>
</html>