<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Copyright
{
    /**
     * @Route("/copyright", name="copyright.info")
     * @return Response
     */
    public function info()
    {
        return new Response('<html><body><h1>Université de picardie</h1></body></html>');
    }

}