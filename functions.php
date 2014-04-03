<?php

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/options/' );

if (is_admin() && ! function_exists( 'optionsframework_init' ) ) :
function optionsframework_init() {
	if ( ! current_user_can( 'edit_theme_options' ) )
		return;

	require plugin_dir_path( __FILE__ ) . 'options/class-options-framework.php';
	require plugin_dir_path( __FILE__ ) . 'options/class-options-framework-admin.php';
	require plugin_dir_path( __FILE__ ) . 'options/class-options-interface.php';
	require plugin_dir_path( __FILE__ ) . 'options/class-options-media-uploader.php';
	require plugin_dir_path( __FILE__ ) . 'options/class-options-sanitization.php';

	$options_framework = new Options_Framework;
	$options_framework->init();

	$options_framework_admin = new Options_Framework_Admin;
	$options_framework_admin->init();

	$options_framework_media_uploader = new Options_Framework_Media_Uploader;
	$options_framework_media_uploader->init();

}
add_action( 'init', 'optionsframework_init', 20 );
endif;

if ( ! function_exists( 'optionsframework_get_option' ) ) :
function optionsframework_get_option( $name, $default = false ) {
	$config = get_option( 'optionsframework' );

	if ( ! isset( $config['id'] ) ) { return $default; }

	$options = get_option( $config['id'] );

	if ( isset( $options[$name] ) ) { return $options[$name]; }
	
    return $default;
}
endif;

if ( ! isset( $content_width ) ) $content_width = 625;

if ( ! function_exists( 'vision_page_menu_args' ) ) :
function vision_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'vision_page_menu_args' );
endif;

if ( ! function_exists( 'vision_widgets_init' ) ) :
function vision_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Area', 'vision' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Area', 'vision' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area1', 'vision' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area2', 'vision' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area3', 'vision' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area4', 'vision' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Area5', 'vision' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'vision_widgets_init' );
endif;

if ( ! function_exists( 'vision_enqueue_scripts' ) ) :
function vision_enqueue_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/asset/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-responsive', get_template_directory_uri() . 
					  '/asset/bootstrap/css/bootstrap-responsive.min.css' );
	wp_enqueue_style( 'vision', get_stylesheet_uri() );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/asset/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vision_enqueue_scripts' );
endif;

if ( ! function_exists( 'vision_comment_list' ) ) :
function vision_comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $post;
	switch ( $comment->comment_type ) :
		case 'trackback' :
		case 'pingback' :
	?>
            <li id="comment-pingback-<?php comment_ID(); ?>">
            <p>Pingback: <?php comment_author_link(); ?> <?php edit_comment_link( __( '编辑' ), '<span>', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li id="list-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
        	<?php if ( '0' == $comment->comment_approved ) : ?>
			<div class="alert alert-block">您的评论正在等待审核，通过后显示。</p>
			<?php endif; ?>
			<div class="media entity-comment">
            	<span class="pull-left"><?php echo get_avatar( $comment, 44 ); ?></span>
                <div class="media-body">
                	<div class="media-heading">
					<?php
                    printf( '<b>%1$s</b> %2$s ', get_comment_author_link(),
                        ( $comment->user_id === $post->post_author ) ? '<span class="label label-info">作者</span>' : '');
                    printf( '<a href="%1$s">%2$s</a>', esc_url( get_comment_link( $comment->comment_ID ) ), 
                        esc_html ( get_comment_date() . get_comment_time() ) );
                    ?>
                    <?php edit_comment_link( '编辑' ); ?>
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '回复', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </div>
                    <?php comment_text(); ?>
				</div>
			</div>
		</div>
	<?php
		break;
	endswitch;
}
endif;

if ( ! function_exists( 'vision_comment_form' ) ) :
function vision_comment_form( $args = array(), $post_id = null ) {
	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$fields   =  array(
		'author' => '<div class="input-prepend"><span class="add-on span2 text-right">姓名' . ($req ? '(*)' : '') . '</span>' .
		            '<input class="span10" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="50"' . $aria_req . ' /></div>',
		'email'  => '<div class="input-prepend"><span class="add-on span2 text-right">邮箱' . ($req ? '(*)' : '') . '</span>' .
		            '<input class="span10" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="50"' . $aria_req . ' /></div>',
		'url'    => '<div class="input-prepend"><span class="add-on span2 text-right">网' . ($req ? '　' : '') . '址</span>' .
		            '<input class="span10" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="50" /></div>',
	);

	$required_text = '必填项已标记为 (*)';

	$fields = apply_filters( 'comment_form_default_fields', $fields );
	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => '<div><textarea id="comment" name="comment" class="span8" rows="8" aria-required="true" placeholder="请输入您的评论"></textarea></div>',
		'must_log_in'          => '<div class="alert alert-block">' . sprintf( '您必须<a href="%s">登录</a>才能发表评论.', wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
		'logged_in_as'         => '<div class="alert alert-block">' . sprintf( '确认使用<a href="%1$s">%2$s</a>身份发表评论？ 点击<a href="%3$s">退出</a>帐户', get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
		'comment_notes_before' => '您的邮箱地址不会被公开',
		'comment_notes_after'  => sprintf( '您可以使用这些HTML标签和属性： %s', strip_tags(allowed_tags()) ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => '发表评论',
		'title_reply_to'       => '评论给&ldquo;%s&rdquo;"',
		'cancel_reply_link'    => '取消评论',
		'label_submit'         => '发表评论',
		'format'               => 'xhtml',
	);

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );
	?>
	<?php if ( comments_open( $post_id ) ) : ?>
		<?php  do_action( 'comment_form_before' ); ?>
        <div id="respond">
            <div id="reply-title" class="alert alert-info alert-block"><b><?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?></b><br/><?php echo $args['comment_notes_before']?>，<?php echo $required_text;?>。<?php echo $args['comment_notes_after']?></div>
            <?php if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) : ?>
                <?php echo $args['must_log_in']; ?>
                <?php do_action( 'comment_form_must_log_in_after' ); ?>
            <?php else : ?>
                <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="form-horizontal"<?php echo $html5 ? ' novalidate' : ''; ?>>
                    <?php do_action( 'comment_form_top' ); ?>
                    <?php if ( is_user_logged_in() ) : ?>
                        <?php echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity ); ?>
                        <?php do_action( 'comment_form_logged_in_after', $commenter, $user_identity ); ?>
                    <?php else : ?>
                        <?php
                        do_action( 'comment_form_before_fields' );
                        foreach ( (array) $args['fields'] as $name => $field ) {
                            echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";
                        }
                        do_action( 'comment_form_after_fields' );
                        ?>
                    <?php endif; ?>
                    <?php echo apply_filters( 'comment_form_field_comment', $args['comment_field'] ); ?>
                    <div style="margin:10px 0">
                        <input name="submit" class="btn btn-info" type="submit" id="<?php echo esc_attr( $args['id_submit'] ); ?>" value="<?php echo esc_attr( $args['label_submit'] ); ?>" />
                        <?php comment_id_fields( $post_id ); ?>
                    </div>
                    <?php do_action( 'comment_form', $post_id ); ?>
                </form>
            <?php endif; ?>
        </div>
        <?php do_action( 'comment_form_after' );
    else :
        do_action( 'comment_form_comments_closed' );
    endif;
}
endif;

if ( ! function_exists( 'vision_title' ) ) :
function vision_title( $title, $sep ) {
	global $page, $paged;
	
	if ( $paged >= 2 || $page >= 2 )
		$pageline = " | " . sprintf( '第%s页', max( $paged, $page ) );
	else 
		$pageline = "";
		
	if ( is_single() || is_page() ) {
		return single_post_title() . ' | ' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
	} 
	if ( is_search() ) {
		return wp_specialchars($s) . ' 搜索结果 | ' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
	}
	if ( is_feed() ) {
		return '';
	}
	if ( is_home() ) { 
		return get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
	} 
	if ( is_category() ) {
		return single_cat_title() . ' | ' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
	}
	if ( is_tag() ) {
		return single_tag_title() . ' | ' . get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
	} 
	return get_bloginfo('name') . ' | ' . get_bloginfo('description') . $pageline;
}
add_filter( 'wp_title', 'vision_title', 10, 2 );
endif;