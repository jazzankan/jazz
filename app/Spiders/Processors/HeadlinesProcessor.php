<?php

namespace App\Spiders\Processors;

//use Log;
use App\Models\SpiderData;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;
use App\Spiders\JazzSpider;

class HeadlinesProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function processItem(ItemInterface $item): ItemInterface
    {
        $title = $item->get('title');
        $item['title'] = implode($item['title']);
        $jazz = new JazzSpider;
        $jazzurls = $jazz->startUrls;
        //$spiderid = SpiderData::where()
        //ghghh
        //Från databasen
        $oldstring = SpiderData::all('headstring')->first();
        if($item['title'] != $oldstring){
        }
        dd($oldstring);
        return $item;
    }
}
