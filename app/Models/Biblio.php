<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:11:14
 * @modify date 2022-09-09 18:10:29
 * @license GPLv3
 * @desc [description]
 */

namespace SLiMS\Play\Models;

use Zein\Database\Dages\SLiMSModelContract;
use SLiMS\DB;
use SLiMS\Play\Supports\Cache;

class Biblio extends SLiMSModelContract
{
    protected $Table = 'search_biblio';
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

    public static function perAuthor(string $authorName, int $currentId, int $limit = 5)
    {
        $db = DB::getInstance();

        if ($limit > 50) $limit = 50;

        $statement = $db->prepare('select `biblio_id`,`title`,`author`,`gmd`,`image` from `search_biblio` where `biblio_id` != ? and match(`author`) against(? IN NATURAL LANGUAGE MODE) order by `last_update` desc limit ' . $limit);
        $statement->execute([$currentId, $authorName]);

        $result = [];
        while ($data = $statement->fetchObject()) {
            if (!isset($result[$data->biblio_id]))
            {
                $result[$data->biblio_id] = $data;
            }
        }

        return array_values($result);
    }

    public static function getNewCollection()
    {
        return self::select('title','image','biblio_id')->orderBy('input_date', 'desc')->limit(10)->get();
    }

    public static function getPromotedCollection()
    {
        return self::select('title','image','biblio_id')->where('promoted', '0')->orderBy('last_update', 'desc')->limit(10)->get();
    }

    public static function searchData(string $keywords)
    {
        $db = DB::getInstance();

        $statement = $db->prepare('select `title`,`image`,`gmd`,`biblio_id`, `author` from `search_biblio` where `title` like ? order by `last_update` desc limit 30');
        $statement->execute(['%'.$keywords.'%']);

        $result = [];
        while ($data = $statement->fetchObject()) {
            $result[] = $data;
        }

        return $result;
    }

    public static function getItems($id)
    {
        $db = DB::getInstance();

        $statement = $db->prepare('select 
                                        `i`.`item_code`,
                                        `i`.`call_number`,
                                        `mis`.`item_status_name`,
                                        COALESCE((select `l`.`due_date` from `loan` as `l` where `l`.`item_code` = `i`.`item_code` and `l`.`is_return` = 0), \'Tersedia\') as `DueDate`
                                    from `item` as `i` 
                                    left join `mst_item_status` as `mis` on `mis`.`item_status_id` = `i`.`item_status_id`
                                    where `i`.`biblio_id` = ?');

        $statement->execute([$id]);

        $result = [];
        while ($data = $statement->fetchObject()) {
            $result[] = $data;
        }

        return $result;
    }
}