<?php

namespace pKit\System\Utils\AntiCSRF
{
    /**
     * Class AntiCSRF
     * @package pKit\System\Utils\AntiCSRF
     */
    final class AntiCSRF
    {
        private static $hash;

        public static function init($hash)
        {
            self::$hash = $hash;

            if(!isset($_SESSION['CSRFToken']))
            {
                $_SESSION['CSRFToken'] = self::getNewToken();
            }
        }

        public static function isValid($token, $recreate = false)
        {
            if($_SESSION['CSRFToken'] == $token)
            {
                if($recreate)
                {
                    $_SESSION['CSRFToken'] = self::getNewToken();
                }

                return true;
            }

            return false;
        }

        public static function getToken()
        {
            return $_SESSION['CSRFToken'];
        }

        private static function getNewToken()
        {
            return md5(md5(self::$hash).rand(0, 99999999).md5(rand(1337, 6077)));
        }
    }
}