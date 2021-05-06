<?php
class URL
{
    public static function createLink($module, $controller, $action, $params = null)
    {
        if (!empty($params)) {
            $linkParams = '';
            foreach ($params as $key => $value) {
                $linkParams .= "&$key=$value";
            }
        }
        $url = 'index.php?module='. $module .'&controller='. $controller .'&action=' .$action . $linkParams;
        return $url;
    }

    public static function redirect($module, $controller, $action, $params = null, $router = null)
    {
        $link	= self::createLink($module, $controller, $action, $params, $router);
        header('location: ' . $link);
        exit();
    }
}