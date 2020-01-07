<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\DomCrawler\Crawler;

class FooterEvent
{
    public function add(ResponseEvent $rep)
    {
        $html = $rep->getResponse()->getContent();
        $crawler = new Crawler($html);
        $crawler->filter('body')->children()->last()->getNode(0)->appendChild(new \DOMText('©UPJV'));
        $rep->getResponse()->setContent($crawler->html());
    }
}