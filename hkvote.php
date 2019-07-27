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
        function __construct(){
            add_action( 'init', array($this,'vote') );
        }
        function activate(){
            $this->vote();
            flush_rewrite_rules();   
        }

        function deactivate(){
            flush_rewrite_rules();
        }

        function vote(){
            register_post_type( 'Votes', ['public'=> true , 'label' => "Voter"] );
        }

        
 }

 if( class_exists( 'MrdeveloperPlugin' ) ){ $mrdeveloperplugin = new MrdeveloperPlugin(); }

 register_activation_hook( __FILE__ , array( $mrdeveloperplugin , 'activate' ) );
 register_deactivation_hook( __FILE__, array( $mrdeveloperplugin, 'deactivation' ) );
