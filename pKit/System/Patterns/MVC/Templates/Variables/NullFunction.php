<?php

namespace pKit\System\Patterns\MVC\Templates\Variables
{

    final class NullFunction
    {
        private $name;
        private $args;

        /**
         * NullFunction constructor.
         * @param $name
         * @param array $args
         */
        public function __construct($name, array $args)
        {
            $this->name = $name;
            $this->args = $args;
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return "{".$this->name."(".implode(",", $this->args).")}";
        }
    }
}