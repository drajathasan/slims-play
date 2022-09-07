<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:06:24
 * @modify date 2022-09-07 16:16:34
 * @license GPLv3
 * @desc [description]
 */

use Zein\Http\Router as Route;

Route::get('/', function(){
    return 'Hai';
});

Route::controller(\SLiMS\Play\Controllers\Book::class)->group(function(){
    Route::prefix('/book')->group(function(){
        Route::get('/popular', 'getPopular');
        Route::get('/new', 'getNew');
        Route::get('/promote', 'getPromoted');
        Route::get('/detail/{id}', 'getDetail');
        Route::get('/author', 'getBookPerAuthor');
        Route::get('/search', 'searchData');
        Route::get('/items/{id}', 'getItemsDetail');
    });
});

Route::run();