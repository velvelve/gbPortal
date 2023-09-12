<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface RssParser
{

    public function setRssUrl(string $rssUrl): RssParser;

    public function getParsedData(): array;

}
