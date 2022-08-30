<?php
/**
 * Plugin Name: Play
 * Plugin URI: http://github.com/drajathasan/slims-play
 * Description: Template + Plugin untuk kebutuhan custom template
 * Version: 1.0.0
 * Author: Drajat Hasan
 * Author URI: https://t.me.drajathasan
 */

use Jaybizzle\CrawlerDetect\CrawlerDetect;

include_once __DIR__ . '/vendor/autoload.php';

// get plugin instance
$plugin = \SLiMS\Plugins::getInstance();

// registering menus or hook
$plugin->registerMenu("opac", "play", __DIR__ . "/index.php");

$plugin->register('before_content_load', function(){
    global $sysconf,$page_title;

    $CrawlerDetect = new CrawlerDetect;
    $pluginDirname = basename(__DIR__);

    // Check the user agent of the current 'visitor'
    if(!$CrawlerDetect->isCrawler() && !isset($_GET['p'])) {
        if (strpos(SWB, '.php'))
        {
            $pathInfo = pathinfo($_SERVER['PHP_SELF']);
            header("Refresh:0; url=" . str_replace($pathInfo['basename'],'',SWB));
            exit;
        }

        // load template
        include __DIR__ . '/theme/main.php';
        exit;
    }
});