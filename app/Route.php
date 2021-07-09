<?php


namespace app;

class Route
{
    public static $defaultControllerName = 'site';
    public static $defaultControllerAction = 'signup';

    static function start()
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controllerName = !empty($routes[2]) ? $routes[2] : null;
        $controllerAction = !empty($routes[3]) ? $routes[3] : 'index';

        $controllerName = self::formatControllerName($controllerName);
        $controllerAction = self::formatControllerAction($controllerAction);

        if (!class_exists($controllerName)) {
            $controllerName = self::formatControllerName(self::$defaultControllerName);
            $controllerAction = self::formatControllerAction(self::$defaultControllerAction);
        }
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