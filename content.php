<article id="ARCHIVE-<?php the_ID(); ?>-<?php the_title(); ?>">
	<div class="row-fluid">
    	<div class="span10 entity-title">
        	<?php $category = get_the_category();?>
            <?php if ( isset($category[0]->name) ) : ?>
        	<span class="label"><?php echo $category[0]->name; ?></span> 
            <?php endif;?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </div>
        <div class="span2">
        <?php if ( ! post_password_required() && ( comments_open() ) ) : ?>
        <p><i class="icon-comment"></i> <?php echo get_comments_number() . " 条评论"; ?></p>
        <?php endif; ?>
        <p>&nbsp;</p>
        </div>
    <div>
    <div class="row-fluid">
    	<div class="span10">
            <?php if ( 'post' == get_post_type() ) : ?>
            <?php 
			printf( '<a href="%1$s">%2$s</a> 发表于 <a href="%3$s">%4$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			        get_the_author(), esc_url( get_permalink() ),  get_the_date('Y年m月d日') );
			?> 
            <i class="icon-edit"></i> <?php edit_post_link( __( '编辑' ) ); ?>
            <?php endif; ?>
        </div>
	</div>
	<div class="row-fluid">
		<?php if ( has_excerpt() && !is_single() ) : ?>
		<div class="entity-content">
			<?php echo $post->post_excerpt; ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">阅读全部</a>
		</div>
		<?php else : ?>
        <div class="entity-content"><?php the_content(); ?></div>
        <?php endif; ?>
    </div>
    <div class="row-fluid">
    	<div class="entity-extras">
    	<?php if ( 'post' == get_post_type() ) : ?>
        <?php
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list ) :
		?>
        <?php printf( '<i class="icon-book"></i> %1$s', $categories_list ); ?>
        <?php endif; ?>
        <?php
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) :
		?>
        <?php printf( '<i class="icon-tags"></i> %1$s', $tags_list ); ?>
        <?php endif; ?>
		<?php endif; ?>
        </div>
    </div>
</article>