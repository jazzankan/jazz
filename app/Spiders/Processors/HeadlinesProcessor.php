<?php

namespace App\Spiders\Processors;

//use Log;
use App\Models\SpiderData;
use App\Models\Organizer;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;
use App\Spiders\JazzSpider;

class HeadlinesProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function processItem(ItemInterface $item): ItemInterface
    {
        $item['title'] = implode($item['title']);
        $jazz = new JazzSpider;
        $jazzurls = $jazz->startUrls;
        $spiderdata = SpiderData::all();
        $orgdata = Organizer::all();
        foreach ($jazzurls as $url) {
            $org = $orgdata->where('orglink', $url)->first();
            $spiderrecord = $spiderdata->where('organizer_id', $org->id)->first();
                if ($item['title'] != $spiderrecord['headstring']) {
                    $spiderrecord->headstring = $item['title'];
                    $spiderrecord->warning = 1;
                    $spiderrecord->save();
                }
            }
        return $item;
    }
}
