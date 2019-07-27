<?php
/**
 * @package hkvote
 */

 class PluginDeactivationClass
 {
     public static function deactivate(){
         flush_rewrite_rules();
     }
 }