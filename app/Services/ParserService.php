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
        $parsedData = [];
        if ($this->link === "https://news.rambler.ru/rss/community/"){
            $parsedData = $this->loadRumbler();
        }

        if ($this->link === "https://lenta.ru/rss/news/"){
            $parsedData = $this->loadNewsRu();
        }
        dd($parsedData);
    }

    private function loadRumbler(): array
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
        return $parsedData;
    }

    private function loadNewsRu()
    {
        $parser = XmlParser::load(url($this->link));
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
            'news' => [
                'uses' => 'channel.item[title,link,description,pubDate,category]',
            ],
        ]);
        return $parsedData;
    }
}
