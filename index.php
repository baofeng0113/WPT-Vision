<?php get_header(); ?>
			<div class="container-fluid">
            	<div class="row-fluid">
                	<div class="span9">
                    	<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                    get_template_part( 'content', get_post_format() );
                                ?>
                            <?php endwhile; ?>
                            <div class="pagination"><?php wp_pagenavi(); ?></div>
                        <?php else : ?>
                            <?php get_template_part( 'no-results' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="span3">
                    	<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>