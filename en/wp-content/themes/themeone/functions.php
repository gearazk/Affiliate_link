<?php
function themeone_css()
{
	wp_enqueue_style('themecss', get_template_directory_uri() . '/css/themeone.css',array(),'1.0.0','all');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');


	wp_enqueue_script('jquery');
	wp_enqueue_script('themejs', get_template_directory_uri() . '/js/themeone.js',array(),'1.0.0',true);
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true);
}
add_action('wp_enqueue_scripts','themeone_css');

function theme_setup()
{
	add_theme_support('new Menu');
	register_nav_menu('primary','Primary Menu');
	register_nav_menu('secondary','Footer Menu');

}
add_action('init','theme_setup');

add_theme_support('post-formats',array('aside','image','video'));
add_theme_support('post-thumbnails');
add_theme_support('html5',array('search-form'));

add_image_size('small-thumbnail',180,120,true);
add_image_size('banner-image',500,400,true);



// Product Items
function make_product_item()
{
	$label = array(
		'name'=>'Items',
		'singular_name' =>'Item',
		'add_new'=> 'Add New Item',
		'all_items'=> 'All Items',
		'add_new_item'=> 'Add New Item',
		'edit_item'=> 'Edit Item',
	);
	
	$argv = array(
	'labels'=>$label,
	'public'=>true,
	'has_archive'=>true,
	'publicly_queryable'=>true,
	'query_var'=>true,
	'rewrite'=>true,
	'capability_type'=>'post',
	'hierarchical'=>false,
	'supports'=>array(
		'title',
        'editor',
        'excerpt',
        'author',
        'thumbnail',
        'comments',
        'trackbacks',
        'revisions',
        'custom-fields'
	),
	'taxonomies'=> array('category','post_tag'),
	'menu_position'=>2,
	'exclude_from_search'=> false

	); 
	register_post_type('item_pro',$argv);
}
add_action('init','make_product_item');
?>