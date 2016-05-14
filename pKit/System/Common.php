<?php

namespace pKit\System
{
    class Common
    {
        private static $config;

        public static function init(Config $cfg)
        {
            self::$config = $cfg;
        }

        public static function redirect($url)
        {
            header('Location: '.self::$config->getPaths()->site.'/'.$url);
        }
    }
}