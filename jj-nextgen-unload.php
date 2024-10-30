<?php
/*
Plugin Name: JJ NextGen Unload
Description: Prevents NextGen Gallery scripts and style from loading in to header. Useful if you don't want to use the NextGen Widgets.
Author: JJ Coder
Version: 1.0.2
*/

if ( ! defined( 'WPJJNGG_UNLOAD_PLUGIN_BASENAME' ) )
	define( 'WPJJNGG_UNLOAD_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
	
function remove_nextgen_gallery_styles() 
{
  wp_deregister_style('shutter');
	wp_deregister_style('NextGEN');	
}
  
if( !is_admin() )
{
  define(NGG_SKIP_LOAD_SCRIPTS, true);
  add_action('wp_print_styles', 'remove_nextgen_gallery_styles');
}

function WPJJNGG_UNLOAD_set_plugin_meta($links, $file) 
{
  $plugin = WPJJNGG_UNLOAD_PLUGIN_BASENAME;  
  if ($file == $plugin) 
  {
    $links[] = '<a href="http://wordpress.org/extend/plugins/jj-nextgen-unload/">' . 'Visit plugin site' . '</a>';    
    $links[] = '<a href="http://www.redcross.org.nz/donate">' . 'Donate to Christchurch Quake' . '</a>';
  }
  return $links;
}
if( is_admin() )
{
  add_filter( 'plugin_row_meta', 'WPJJNGG_UNLOAD_set_plugin_meta', 10, 2 );
}

?>