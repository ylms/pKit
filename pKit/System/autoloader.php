<?php

spl_autoload_register(function($className) use ($config)
{
    $path = '';

    $classNameSplit = explode('\\', $className);

    if(in_array($classNameSplit[0], $config->getAutoloaderIgnoringPaths()))
    {
        unset($classNameSplit[0]);

        $className = implode('/', $classNameSplit);
        $classNameSplit = explode('/', $className);
    }

    if(isset($config->getAutoloaderModifingPaths()[$classNameSplit[0]]))
    {
        $path = $config->getAutoloaderModifingPaths()[$classNameSplit[0]];

        unset($classNameSplit[0]);
        $className = implode('/', $classNameSplit);
        $classNameSplit = explode('/', $className);
    }

    $class = implode('/', $classNameSplit);

    require_once $path.'/'.$class.'.php';
});