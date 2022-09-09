<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:23:20
 * @modify date 2022-09-09 18:00:34
 * @license GPLv3
 * @desc [description]
 */

namespace SLiMS\Play\Controllers;

use SLiMS\Play\Models\Biblio;
use Zein\Http\Request;

class Book
{
    public function getPopular()
    {
        return response()->json(['status' => true, 'data' => Biblio::popular()]);
    }

    public function getDetail($id)
    {
        $data = Biblio::find($id);
        return response()->json(['status' => (is_null($data) ? false : true), 'result' => $data]);
    }

    public function getNew()
    {
        return response()->json(['status' => true, 'data' => Biblio::getNewCollection()]);
    }

    public function getPromoted()
    {
        return response()->json(['status' => true, 'data' => Biblio::getPromotedCollection()]);
    }

    public function searchData(Request $request)
    {
        $keywords = $request->query('keywords')??'';
        return response()->json(['status' => true, 'data' => Biblio::searchData($keywords)]);
    }

    public function getBookPerAuthor(Request $request)
    {
        $authorName = $request->query('name');
        $currentBiblioId = $request->query('id')??0;
        $limit = $request->query('limit')??5;
        
        $dataList = Biblio::perAuthor($authorName, $currentBiblioId, (int)$limit);

        return response()->json(['status' => (bool)count($dataList), 'data' => $dataList]);
    }

    public function getItemsDetail($id)
    {
        return response()->json(['status' => true, 'data' => Biblio::getItems($id)]);
    }
}