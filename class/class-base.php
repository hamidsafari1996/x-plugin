<?php
class X_ADDON{
	/**
       * Constructor method for initializing actions in WordPress.
       *
       * This constructor adds various actions using the add_action function to hook into
       * different events in WordPress. These actions include loading text domains for translations
       * and enqueueing scripts for both the admin and front end of the website.
       *
       * 1. 'plugins_loaded' action is hooked to the 'x_load_textdomain' method for loading text domains.
       * 2. 'admin_enqueue_scripts' action is hooked to the 'x_admin_enqueue_scripts' method for enqueuing admin scripts.
       * 3. 'wp_enqueue_scripts' action is hooked to the 'x_enqueue_scripts' method for enqueuing front-end scripts.
      */
	public function __construct(){
		add_action('plugins_loaded',array($this,'x_load_textdomain'));
		add_action('admin_enqueue_scripts',array($this,'x_admin_enqueue_scripts'));
		add_action('wp_enqueue_scripts',array($this,'x_enqueue_scripts'));
	}
	
	public function x_load_textdomain(){
		load_plugin_textdomain(x_addon_plugin_name,false,'x-addon/languages');
	}
	
	public function x_admin_enqueue_scripts($hook){
		if($hook != 'post.php' && $hook != 'post-new.php') return;
		wp_enqueue_script('x-js-admin',$this->x_plugins_url('assets/js/x-admin.js'),array('jquery','wp-color-picker'),x_addon_version,true);
		
		wp_enqueue_style('x-style-admin',$this->x_plugins_url('assets/css/x-admin.css'),array(),x_addon_version);
		
		wp_enqueue_style( 'wp-color-picker' );
		
	}
	
	public function x_enqueue_scripts(){
		wp_enqueue_style('x-front',$this->x_plugins_url('assets/css/x-front.css'),array(),x_addon_version);
	}
	
	public function x_plugins_url($url){
		return plugins_url('x-addon/'.$url);
	}
}