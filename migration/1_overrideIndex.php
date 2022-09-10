<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-10 15:26:42
 * @modify date 2022-09-10 15:32:25
 * @license GPLv3
 * @desc [description]
 */

use SLiMS\Migration\Migration;

class overrideIndex extends Migration
{
    function up()
    {
        copy(SB . 'index.php', SB . 'index-original.php');
        unlink(SB . 'index.php');
        copy(__DIR__ . '/../index-mod.php', SB.'index.php');
    }

    function down()
    {
        
    }
}