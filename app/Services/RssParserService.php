<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\RssParser;
use Orchestra\Parser\Xml\Facade;

class RssParserService implements RssParser
{
    private string $rssUrl;

    public function setRssUrl(string $rssUrl): RssParser
    {
        $this->rssUrl = $rssUrl;

        return $this;
    }

    public function getParsedData(): array
    {
        $xml = Facade::load($this->rssUrl);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
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
                'uses' => 'channel.item[title,link,author,description,pubDate]'
            ],
        ]);
        return $data['news'];
    }
}
