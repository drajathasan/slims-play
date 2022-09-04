<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:23:20
 * @modify date 2022-09-04 15:27:52
 * @license GPLv3
 * @desc [description]
 */

namespace SLiMS\Play\Controllers;

use SLiMS\Play\Models\Biblio;

class Book
{
    public function getPopular()
    {
        return response()->json(['status' => true, 'data' => Biblio::popular()]);
    }
}