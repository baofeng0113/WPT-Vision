<?php

function optionsframework_option_name() {
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function optionsframework_options() {
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);

	$multicheck_array = array(
		'one' => __('French Toast', 'options_framework_theme'),
		'two' => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four' => __('Crepe', 'options_framework_theme'),
		'five' => __('Waffle', 'options_framework_theme')
	);

	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('General', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Custom Favicon', 'options_framework_theme'),
		'desc' => __('Upload a 16x16px PNG/GIF image that will be your favicon.', 'options_framework_theme'),
		'id' => 'favicon',
		'type' => 'upload');
		
		$options[] = array(
		'name' => __('Custom CSS', 'options_framework_theme'),
		'desc' => __('Want to add any custom CSS code? Put in here.', 'options_framework_theme'),
		'id' => 'custom_css',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Custom JavaScript', 'options_framework_theme'),
		'desc' => __('You can paste your JavaScript code in this box. This will be automatically added to the footer.', 'options_framework_theme'),
		'id' => 'custom_js',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Header', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Custom Logo', 'options_framework_theme'),
		'desc' => __('Upload custom logo image.', 'options_framework_theme'),
		'id' => 'custom_logo',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Site Description', 'options_framework_theme'),
		'desc' => __('If you want to hide the description that appears next to your logo.', 'options_framework_theme'),
		'id' => 'site_description',
		'std' => '',
		'type' => 'checkbox');
	
	$options[] = array(
		'name' => __('Footer', 'options_framework_theme'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Footer Copyright', 'options_framework_theme'),
		'desc' => __('Replace the footer copyright text.', 'options_framework_theme'),
		'id' => 'copyright',
		'std' => '',
		'type' => 'textarea');
	
    $wp_editor_settings = array(
		'wpautop' => true,
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	return $options;
}