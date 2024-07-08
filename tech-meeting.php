<?php 

/**
 * Plugin Name: Start Gutenberg Block Plugin
 * Description: This plugin is a starting point for creating custom Gutenberg blocks.
 * Version: 1.0
 * Author: Aldrick
 * Author URI: github.com/aldair-meneses
 
*/ 

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function tech_meeting_register_blocks() {
    $block_path = __DIR__ . '/src/blocks';
    $blocks_dirs = glob("$block_path/*", GLOB_ONLYDIR);
    foreach ( $blocks_dirs as $block_dir )  {
        $block_json = file_get_contents("$block_dir/block.json");
        $block_json_content = json_decode($block_json, true);
        $block_name = str_replace('/', '-', $block_json_content['name']);
        register_block_type( __DIR__ . "/build/blocks/$block_name" );
    }
}
