<?php

class Framework {

    public static $classes = [];

    public static function autoload($className) {
        if (isset(static::$classes[$className])) {
            $classFile = static::$classes[$className];
        } else if (strpos($className, '\\') !== false) {
            $classFile = str_replace('\\', '/', $className) . '.php';
            if (!$classFile || !is_file($classFile)) {
                return;
            }
        } else {
            return;
        }

        include($classFile);
     }
}
