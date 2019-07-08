<?php
class Route 
{
    static function start()
    {
        // default controller and action
        $controller_name = "Main";
        $action_name = "index";
        $props = [];

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // setting controller if mentioned
        if ( !empty($routes[1]) ) {   
            $controller_name = $routes[1];
        }
        
        // setting action if mentioned
        if ( !empty($routes[2]) ) {
            $actionProps = explode('?', $routes[2]);
            if ( !empty($actionProps[0]) ) {
                $action_name = $actionProps[0];
            } else {
                $action_name = $routes[2];
            }
        }

        // prefixes
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        // model file
        $model_file = strtolower($model_name).'.php';
        $model_path = "app/models/".$model_file;

        if(file_exists($model_path)) {
            include "app/models/".$model_file;
        }

        // controller file
        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "app/controllers/".$controller_file;

        if(file_exists($controller_path)) {
            include "app/controllers/".$controller_file;
        }
        else {
            // error page if controller not found
            Route::ErrorPage404();
        }

        // creating controller
        $controller = new $controller_name;
        $action = $action_name;
        
        if(method_exists($controller, $action)) {
            if (!empty($actionProps[1])) {
                for ($i = 1; $i < count($actionProps); $i++) {
                    $propsArr = explode('=', $actionProps[$i]);
                    $props[$propsArr[0]] = $propsArr[1];
                }
                $controller->$action($props);
            } else {
                $controller->$action();
            }
        }
        else {
            Route::ErrorPage404();
        }

        function ErrorPage404()
        {
            $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:'.$host.'404');
        }
    }
}