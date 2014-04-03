<?php
if ( post_password_required() ) return;
?>

<comment id="comments" class="row-fluid">
	<?php if ( have_comments() ) : ?>
		<div class="alert alert-info alert-block">
			<?php printf( '<b>关于 &ldquo; %1$s &rdquo; 目前共有 %2$s 条评论信息</b>', get_the_title(), get_comments_number() ); ?>
		</div>
		<ol>
			<?php wp_list_comments( array( 'callback' => 'vision_comment_list' ) ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<ul class="pager">
			<li class="previous"><?php previous_comments_link( __( '上一页' ) ); ?></li>
			<li class="next"><?php next_comments_link( __( '下一页' ) ); ?></li>
		</ul>
		<?php endif; ?>
		<?php
		if ( ! comments_open() && get_comments_number() ) : ?>
		<div class="alert alert-block"><b>评论被关闭，您无法对该内容进行评论操作。</b></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php vision_comment_form(); ?>
</comment>