<?php

namespace pKit\System\Utils\Password
{
    final class PasswordConfiguration
    {
        /**
         * @var array
         */
        public static $OPTIONS = [
            'cost' => 5
        ];

        /**
         * @var int
         */
        public static $ALGORITHM = PASSWORD_BCRYPT;
    }
}