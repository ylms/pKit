<?php

namespace pKit\System
{
    /**
     * Class Common
     * @package pKit\System
     */
    class Common
    {
        private static $config;

        /**
         * @param Config $cfg
         */
        public static function init(Config $cfg)
        {
            self::$config = $cfg;
        }

        /**
         * @param string $url
         */
        public static function redirect($url)
        {
            header('Location: ' . self::$config->getPaths()->site . '/' . $url);
        }

        /**
         * @param mixed $val
         * @return bool
         */
        public static function isDecimal($val)
        {
            return is_numeric($val) && floor($val) != $val;
        }
    }
}