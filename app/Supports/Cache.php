<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 15:08:10
 * @modify date 2022-09-04 15:24:53
 * @license GPLv3
 * @desc [description]
 */

namespace SLiMS\Play\Supports;

use Exception;

class Cache
{
    public static $cacheNamePrefix = 'cache_play_';

    public static function make(string $cacheName, $data, int $cacheThresholdTime = 900 /* in seconds */)
    {
        try {
            if (!is_writable(SB . 'files/cache/')) return null;
            file_put_contents(SB . 'files/cache/' . self::$cacheNamePrefix . $cacheName, json_encode(['expire' => strtotime(date('Y-m-d H:i:s', strtotime("+900 seconds"))), 'result' => $data]));
        } catch (Exception $e) {
            //throw $th;
        }
    }

    public static function isExpire(int $expiredTime)
    {
        return strtotime(date('Y-m-d H:i:s')) > $expiredTime;
    }

    public static function get(string $cacheName)
    {
        try {
            $cacheFile = SB . 'files/cache/' . self::$cacheNamePrefix . $cacheName;
            
            if (!file_exists($cacheFile)) throw new Exception("not found!");

            return file_get_contents($cacheFile);
        } catch (Exception $e) {
            //throw $th;
        }
    }
}