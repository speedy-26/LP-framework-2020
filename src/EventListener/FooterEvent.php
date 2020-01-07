<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class FooterEvent
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function add(ResponseEvent $rep)
    {
        $url = $this->urlGenerator->generate("copyright.info");
        $elt = new \DOMElement('a','©UPJV');
        $html = $rep->getResponse()->getContent();
        $crawler = new Crawler($html);
        $crawler->filter('body')->children()->last()->getNode(0)->appendChild($elt);
        $elt->setAttribute("href",$url);
        $rep->getResponse()->setContent($crawler->html());
    }
}