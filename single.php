<?php get_header(); ?>
			<div class="container-fluid">
            	<div class="row-fluid">
                	<div class="span9">
                    	<?php while ( have_posts() ) : the_post(); ?>
							<?php
                                get_template_part( 'content', get_post_format() );
                            ?>
                        <?php endwhile; ?>
                        <?php comments_template( '', true ); ?>
                    </div>
                    <div class="span3">
                    	<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>