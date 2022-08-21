<?php
/**
 * Plugin Name: Play
 * Plugin URI: http://github.com/drajathasan/slims-play
 * Description: Template + Plugin untuk kebutuhan custom template
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me.drajathasan
 */

// get plugin instance
$plugin = \SLiMS\Plugins::getInstance();

// registering menus or hook
$plugin->registerMenu("opac", "play", __DIR__ . "/index.php");

$plugin->register('before_content_load', function($Opac){
    
});