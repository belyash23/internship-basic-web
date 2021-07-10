<?php

namespace app;

class Route
{
    public static $defaultControllerName = 'site';

    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = !empty($routes[2]) ? $routes[2] : null;
        $controllerAction = !empty($routes[3]) ? $routes[3] : 'index';

        $controllerName = self::formatControllerName($controllerName);
        if (!class_exists($controllerName)) {
            $controllerAction = $routes[2];
            $controllerName = self::formatControllerName(self::$defaultControllerName);

        }

        $controllerAction = self::formatControllerAction($controllerAction);
        if (!method_exists($controllerName, $controllerAction)) {
            $controllerAction = self::formatControllerAction('index');
        }

        $controller = new $controllerName;
        $controller->$controllerAction();
    }

    static function formatControllerName($controllerName)
    {
        return 'app\controllers\\' . ucfirst($controllerName);
    }

    static function formatControllerAction($controllerAction)
    {
        return 'action' . ucfirst($controllerAction);
    }
}