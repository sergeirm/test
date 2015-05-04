<?php

namespace framework;

class Application {
    public $config;
    public $db;
    public $params;

    public function __construct($config = array()) {
        $this->config = $config;
        $this->params = ['get' => $_GET, 'post' => $_POST];
        return;
    }

    public function run() {
        $url_parts = parse_url($_SERVER['REQUEST_URI']);
                
        if ($url_parts['path'] == '/') {
            $path = $this->config['site']['front'];
        } else {
            $path = ltrim($url_parts['path'], '/');
        }
        
        list($route_controller, $route_action) = split('/', $path);
        $controller_classname = 'app\\controllers\\' . ucfirst($route_controller) . 'Controller';
        $controller = new $controller_classname($this);
        $action_method = $route_action . 'Action';
        $controller->$action_method();
    }
}
