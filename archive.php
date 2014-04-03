<?php get_header(); ?>
			<div class="container-fluid">
            	<div class="row-fluid">
                	<div class="span9">
                    	<?php if ( have_posts() ) : ?>
							<div class="alert alert-info">
                            <b>
                            <?php
							if ( is_category() ) :
								echo '按栏目查看：'; single_cat_title();
							elseif ( is_tag() ) :
								echo '按标签查看：'; single_tag_title();
							elseif ( is_author() ) :
								printf( '按作者查看: %s', '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a>' );
								rewind_posts();
							elseif ( is_day() ) :
								printf( '按日查看: %s', get_the_date('Y年m月d日') );
							elseif ( is_month() ) :
								printf( '按月查看: %s', get_the_date( 'Y年m月' ) );
							elseif ( is_year() ) :
								printf( '按年查看: %s', get_the_date( 'Y年' ) );
							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								echo '按类型查看：日志';
							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								echo '按类型查看：图片';
							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								echo '按类型查看：视频';
							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								echo '按类型查看：引语';
							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								echo '按类型查看：链接';
							else :
								echo '';
							endif;
							?>
                            </b>
                            <?php
							$term_description = term_description();
							if ( ! empty( $term_description ) ) :
								echo '<br /><br />', $term_description;
							endif;
							?>
                            </div>
                            <?php while ( have_posts() ) : the_post(); ?>
								<?php
                                    get_template_part( 'content', get_post_format() );
                                ?>
                            <?php endwhile; ?>
                            <div class="pagination"><?php wp_pagenavi(); ?></div>
                        <?php else : ?>
                            <?php get_template_part( 'no-results', 'archive' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="span3">
                    	<?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>