<?php
/**
 * @author Drajat Hasan
 * @email drajathasan20@gmail.com
 * @create date 2022-09-04 14:06:24
 * @modify date 2022-09-04 23:53:40
 * @license GPLv3
 * @desc [description]
 */

use Zein\Http\Router;

Router::get('/', function(){
    return 'Hai';
});

Router::get('/book/popular', [\SLiMS\Play\Controllers\Book::class, 'getPopular']);
Router::get('/book/detail/{id}', [\SLiMS\Play\Controllers\Book::class, 'getDetail']);
Router::get('/book/author', [\SLiMS\Play\Controllers\Book::class, 'getBookPerAuthor']);

Router::run();