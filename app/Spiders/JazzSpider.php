<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;
use App\Spiders\Processors\HeadlinesProcessor;

class JazzSpider extends BasicSpider
{
    public array $startUrls = [
        'https://jazzimalmo.com/',
        'https://jazzensvanner.com/',
        'https://www.unityjazz.se/program'
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        HeadlinesProcessor::class
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        // todo...
        //$title = $response->filter('h2')->text();
        yield $this->item([
            //'title' => $response->filter('h3')->text()
            'title1' => $response->filter('h1')->extract(['_text']),
            'title2' => $response->filter('h2')->extract(['_text']),
            'url' => $response->getUri()
        ]);
    }
}
