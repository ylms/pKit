<?php

use pKit\System\Config;
use pKit\System\App;

use pKit\System\Utils\Routing\Router;
use pKit\System\Utils\Routing\Managers\RouteManager;
use pKit\System\Utils\Routing\Collectors\RouteCollector;
use pKit\System\Utils\Routing\RouterResult;
use pKit\System\Utils\Routing\Interfaces\IRoute;
use pKit\System\Utils\Routing\RouteInfoResults;

use pKit\System\Patterns\MVC\Controllers\Collectors\ControllerCollector;
use pKit\System\Patterns\MVC\Controllers\ControllerParameters;

use pKit\System\Patterns\MVC\Templates\Managers\TemplateManager;
use pKit\System\Patterns\MVC\Templates\View;

use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

use pKit\System\Common;

use pKit\System\Utils\AntiCSRF\AntiCSRF;

session_start();

require_once __DIR__ . '/Exceptions/pKitException.php';
require_once __DIR__ . '/Config.php';

$config = new Config($configuration);

require_once __DIR__ . '/autoloader.php';

Common::init($config);
AntiCSRF::init($config->getCSRFHash());

$pdo = new PDO($config->getDatabaseSettings()->string, $config->getDatabaseSettings()->user, $config->getDatabaseSettings()->password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$app = new App($config, $pdo);

$routeCollector = new RouteCollector();

$controllerCollector = new ControllerCollector();

$templateManager = new TemplateManager($config->getPaths()->templates);

$controllerParameters = new ControllerParameters($app, $controllerCollector, $templateManager, new View(), new ModelsManager($pdo));

require_once __DIR__.'/../controllers.php';

foreach($controllerCollector->getByInstance(IRoute::class) as $controller)
{
    foreach($controller->getRoutes() as $route)
    {
        $routeCollector->add($route);
    }
}

$routeManager = new RouteManager($routeCollector);
$router = new Router($routeManager);

try
{
    $pdo->beginTransaction();
    $pdo->query("SET NAMES 'utf8'");

    $router->listenOn($router->getURLParameter($config->getUrlIdentifier()), function (RouterResult $routerResult) {
        switch ($routerResult->getState()) {
            case RouteInfoResults::ACCESS_ALLOWED:
                return $routerResult->callController();
                break;

            case RouteInfoResults::NOT_FOUND:
                return Common::redirect('error');
            break;
        }
    });

    $pdo->commit();
}
catch(Exception $e)
{
    $pdo->rollBack();
}
