<?php

namespace Bitter\LinkTheme\Routing;

use Bitter\LinkTheme\API\V1\Middleware\FractalNegotiatorMiddleware;
use Bitter\LinkTheme\API\V1\Configurator;
use Concrete\Core\Routing\RouteListInterface;
use Concrete\Core\Routing\Router;

class RouteList implements RouteListInterface
{
    public function loadRoutes(Router $router)
    {
        $router
            ->buildGroup()
            ->setNamespace('Concrete\Package\LinkTheme\Controller\Dialog\Support')
            ->setPrefix('/ccm/system/dialogs/link_theme')
            ->routes('dialogs/support.php', 'link_theme');
    }
}