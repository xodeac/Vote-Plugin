<?php
/**
 * @package hkvote
 */

 class PluginActivationClass
 {
     public static function activate(){
         flush_rewrite_rules();
     }
 }