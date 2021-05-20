<?php 
	
add_action( 'wp_enqueue_scripts', 'core50_enqueue_styles' );
function core50_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

// Less Compiler
require get_theme_file_path(). '/inc/less/lessc.inc.php';

$less = new lessc;

try {
	$less->checkedCompile(get_theme_file_path() . "/assets/style.less", get_theme_file_path() . "/compiled.css");
} catch (exception $e) {
	echo "fatal error: " . $e->getMessage();
}

// // Register a Sidebar Widget Position
// register_sidebar( array(
// 	'name' => __( 'Icon Header', 'core50_widget_Register' ),
// 	'id' => 'icon-header',
// ));

// Include Widget Files
require get_theme_file_path() . '/widgets/custom.php';


?>