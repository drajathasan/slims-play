<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-08-30 19:44:50
 * @modify date 2022-08-30 21:51:35
 * @license GPLv3
 * @desc [description]
 */

defined('INDEX_AUTH') or die('Direct access is not allowed!');
?>
<!DOCTYPE Html>
<html>
    <head>
        <title><?= $page_title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Pragma" content="no-cache"/>
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0"/>
        <meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT"/>
        <link href="plugins/<?= $pluginDirname ?>/theme/dist/app.css?v=<?= date('this') ?>" rel="stylesheet"/>
    </head>
    <body>
        <section id="app">
            <play-layout></play-layout>
        </section>
        <script src="plugins/<?= $pluginDirname ?>/theme/dist/app.js?v=<?= date('this') ?>"></script>
    </body>
</html>