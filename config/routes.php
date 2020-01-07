<?php
// config/routes.php
use App\Controller\DisqueController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

// ROUTE : /disque/info/{ref}
// ref une majuscule suivi de 4 chiffres exemple : A1234
return function (RoutingConfigurator $routes) {
    $routes->add('app_disque_ref', '/disque/info/{ref}')
        ->controller([DisqueController::class, 'info'])
        ->requirements(['ref' => '[A-Z]\d{4}']);
};