<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{

    /**
     * Class NullVariable
     * @package pKit\System\Patterns\MVC\Templates\Variables
     */
    final class NullVariable
    {
        private $name;

        /**
         * NullVariable constructor.
         * @param $name
         */
        public function __construct($name)
        {
            $this->name = $name;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return "{\$".$this->name."}";
        }
    }
}