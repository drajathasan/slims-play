<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:11:14
 * @modify date 2022-09-04 16:00:16
 * @license GPLv3
 * @desc [description]
 */

namespace SLiMS\Play\Models;

use Zein\Database\Dages\SLiMSModelContract;
use SLiMS\DB;
use SLiMS\Play\Supports\Cache;

class Biblio extends SLiMSModelContract
{
    protected $Table = 'biblio';
    protected $PrimaryKey = 'biblio_id';
    protected $Created_at = 'input_date';
    protected $Updated_at = 'last_update';

    public static function popular()
    {
        // get cache
        $cachedData = Cache::get('popular.json');

        if (!is_null($cachedData))
        {
            $data = json_decode($cachedData);
            if (!Cache::isExpire($data->expire)) return $data->result;
        }

        $db = DB::getInstance();
        $today = date('Y-m-d');
        $sevenDayAgo = date('Y-m-d', strtotime('-7 day'));
        $statement = $db->prepare('select `b`.`biblio_id`, `b`.`title`, `ma`.`author_name`, `b`.`isbn_issn`, `b`.`image`
                                from `biblio` as `b`
                                inner join `biblio_author` as `ba` on `ba`.`biblio_id` = `b`.`biblio_id`
                                inner join `mst_author` as `ma` on `ma`.`author_id` = `ba`.`author_id`
                                inner join `item` as `i` on `i`.`biblio_id` = `b`.`biblio_id`
                                inner join `loan` as `l` on `l`.`item_code` = `i`.`item_code`
                                where `l`.`loan_date` >= ? and `l`.`loan_date` <= ?
                                limit 20');
        $statement->execute([$sevenDayAgo,$today]);

        $result = [];
        while ($data = $statement->fetchObject()) {
            if (!isset($result[$data->biblio_id]))
            {
                $result[$data->biblio_id] = $data;
            }
        }

        // Caching is best way to make cpu not overhead!
        Cache::make('popular.json', array_values($result));

        return array_values($result);
    }
}