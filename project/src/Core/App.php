<?php
namespace Core;
class App{

    protected static $container;
    public static function setContainer($container){
        static::$container = $container;
    }

    public static function getContainer(){
        return static::$container;
    }

    public static function resolve(string $key){
        return static::getContainer()->resolve($key);
    }

    public function bind($key, $resolver){
        return static::getContainer()->bind($key, $resolver);
    }
}