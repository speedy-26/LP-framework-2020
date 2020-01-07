<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class DisqueController
{
    /**
     * @Route("/disque/info/{ref}", requirements={"ref" = "[A-Z]\d{4}"})
     * @param $ref
     * @return Response
     */
    public function info( $ref ) {
        return new Response(
            "<html><body>".substr($ref,1)."</body></html>"
        );
    }
}