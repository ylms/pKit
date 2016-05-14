<?php

namespace pKit\System\Utils\Password
{
    final class RawPassword
    {
        private $rawPassword;
        private $hashedPassword = null;

        /**
         * RawPassword constructor.
         * @param string $password
         */
        public function __construct($password)
        {
            $this->rawPassword = $password;
        }

        /**
         * @return string
         */
        public function getRawPassword()
        {
            return $this->rawPassword;
        }

        /**
         * @return string
         */
        private function getHash()
        {
            return password_hash($this->rawPassword, PasswordConfiguration::$ALGORITHM, PasswordConfiguration::$OPTIONS);
        }

        /**
         * @return HashedPassword
         */
        public function getHashedPassword()
        {
            if($this->hashedPassword == null)
            {
                $this->hashedPassword = new HashedPassword($this->getHash()); 
            }
            
            return $this->hashedPassword;
        }

        /**
         * @param HashedPassword $password
         * @return bool
         */
        public function equals(HashedPassword $password)
        {
            return password_verify($this->rawPassword, $password->getHash());
        }
    }
}