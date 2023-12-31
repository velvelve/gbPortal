<?php

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{

    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XmlParser::load($this->link);
        $parsedData = $parser->parse([
            'title' => [
                'uses'=> 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate,category]',
            ],
        ]);
        dd($parsedData);
    }
}
