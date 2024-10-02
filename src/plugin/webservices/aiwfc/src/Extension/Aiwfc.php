<?php

namespace Langulero\Plugin\WebServices\Aiwfc\Extension;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Router\Route;

\defined('_JEXEC') or die;

final class Aiwfc extends CMSPlugin
{
    public function onBeforeApiRoute(&$router)
    {
        $route = new Route(
            ['GET'],
			'v1/aiwfc/deseos/:id',
			'deseos.displayItem',
			['id' => '(\d+)'],
			['component' => 'com_aiwfc']
		);
        $router->addRoute($route);

        $router->createCRUDRoutes(
            'v1/aiwfc/deseos',
            'deseos.displayList',
            ['component' => 'com_aiwfc']
        );
    }

}