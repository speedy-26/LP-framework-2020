<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DisqueController
{
    public function info( $ref ) {
        return new Response(
            "<html><body>".substr($ref,1)."</body></html>"
        );
    }
}