<?php

namespace App\Spiders\Processors;

//use Log;
use App\Models\SpiderData;
use App\Models\Organizer;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;
use App\Spiders\JazzSpider;
use RoachPHP\Http\Response;

class HeadlinesProcessor implements ItemProcessorInterface
{
    use Configurable;
    public function processItem(ItemInterface $item): ItemInterface
    {
        $jazz = new JazzSpider;
        $jazzurls = $jazz->startUrls;
        $spiderdata = SpiderData::all();
        $orgdata = Organizer::all();
        $response = new Response;
        $url = $response->getUri();
        $org = $orgdata->where('orglink', $url)->first();
        $spiderrecord = $spiderdata->where('organizer_id', $org->id)->first();
        $title = implode($item['title']);
        if ($title != $spiderrecord->headstring) {
            $spiderrecord->headstring = $title;
            $spiderrecord->warning = 1;
            $spiderrecord->save();
        }
            return $item;
    }
}
