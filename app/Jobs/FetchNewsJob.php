<?php

namespace App\Jobs;

use App\Enums\News\Status;
use App\Models\News;
use App\Services\Contracts\RssParser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchNewsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(RssParser $rssParser): void
    {
        $parsedData = $rssParser->setRssUrl('https://news.rambler.ru/rss/tech/')->getParsedData();
        foreach($parsedData as $data){
            News::create([
                'title' => $data['title'],
                'author' => $data['author'],
                'description' => $data['description'],
                'status' => Status::DRAFT->value,
                'created_at' => $data['pubDate'],
                'category_id' => 1,
                'source_id' => News::$RSS_SOURCE_ID,
            ]);
        }
    }
}
