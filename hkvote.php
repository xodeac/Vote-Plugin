<?php
/**
 * Plugin Name:       HK - VOTER
 * Plugin URI:        https://www.amdaniglobal.com
 * Description:       Vote Any Post
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            MR. DEVELOPER
 * Author URI:        https://www.amdaniglobal.com/hamza-khan/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

 defined( 'ABSPATH' ) or die("NOT ALLOWED !");

 class MrdeveloperPlugin
 {       
        public $plugin;
        function __construct(){
            $this->plugin = plugin_basename(__FILE__);
        }
        public function register(){
            add_action( 'admin_menu', array($this,'add_admin_pages'));
            add_filter("plugin_action_links_$this->plugin", array($this,'settings_links'));

        }
        public function settings_links($links){
            $setting_link_1 = '<a href="admin.php?page=hk_vote">Settings</a>';
            $setting_link_2 = '<a href="https://www.amdaniglobal.com">Visit Website</a>';
            array_push($links, $setting_link_1 , $setting_link_2);
            return $links;
        }
        public function add_admin_pages(){
            add_menu_page( 'HK-VOTE', 'VOTE', 'manage_options', 'hk_vote', array($this,'admin_index'), 'dashicons-admin-users', '110' );
        }
        public function admin_index(){
            require_once plugin_dir_path( __FILE__ ) . 'temp/index.php';
        }
 }

 if( class_exists( 'MrdeveloperPlugin' ) )
 { 
     $mrdeveloperplugin = new MrdeveloperPlugin(); 
     $mrdeveloperplugin->register();
 }

 // ACTIVATION 

 require_once plugin_dir_path( __FILE__ ) . 'inc/activation_file.php';
 register_activation_hook( __FILE__ , array( 'PluginActivationClass' , 'activate' ) );

// DEACTIVATION

 require_once plugin_dir_path( __FILE__ ) . 'inc/deactivation_file.php';
 register_deactivation_hook( __FILE__, array( 'PluginDeactivationClass', 'deactivation' ) );
