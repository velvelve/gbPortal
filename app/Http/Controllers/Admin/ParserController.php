<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $source = $request->route('source');
        $url = "https://news.rambler.ru/rss/community/";
        if($source === 'rambler'){
            $url = "https://news.rambler.ru/rss/community/";
        }
        if($source === 'news'){
            $url = "https://lenta.ru/rss/news/";
        }
        $parser->setLink($url)->saveParseData();
    }
}
