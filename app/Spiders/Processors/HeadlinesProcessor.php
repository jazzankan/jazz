<?php

namespace App\Spiders\Processors;

//use Log;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class HeadlinesProcessor implements ItemProcessorInterface
{
    use Configurable;
    public function processItem(ItemInterface $item): ItemInterface
    {
        $title = $item->get('title');
        $item['title'] = implode($item['title']);

        return $item;
    }
}
