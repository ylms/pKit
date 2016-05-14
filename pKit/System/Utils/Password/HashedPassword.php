<?php

namespace pKit\System\Utils\Password
{
    final class HashedPassword
    {
        private $hash;

        /**
         * HashedPassword constructor.
         * @param string $hash
         */
        public function __construct($hash)
        {
            $this->hash = $hash;
        }

        /**
         * @return string
         */
        public function getHash()
        {
            return $this->hash;
        }

        /**
         * @param RawPassword $password
         * @return bool
         */
        public function equals(RawPassword $password)
        {
            return password_verify($password->getRawPassword(), $this->getHash());
        }
    }
}