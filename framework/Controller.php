<?php

namespace framework;

class Controller {
    public $model;
    public $className;

    protected $app;

    public function __construct($application) {        
        $this->app = $application;
        $this->className = get_class($this);
    }

    public function render($template, $variables) {
        $controller_pos = strpos($this->className, 'Controller');
        $backslash_pos = strrpos($this->className, '\\');
        if ($backslash_pos === false) {
            $backslash_pos = 0;
        }
        $views_dir = strtolower(substr($this->className, $backslash_pos + 1, $controller_pos - $backslash_pos - 1));
        include($this->app->config['site']['root_path'] . '/app/views/' . $views_dir . '/' . $template . '.php');
    }

    public function redirect($route) {
        header('Location: /' . $route);
        exit();
    }
}
