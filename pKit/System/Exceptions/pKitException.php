<?php

namespace pKit\System\Exceptions
{

    final class pKitException extends \Exception
    {
        private $object;

        public function __construct($file, $line, $message, $object = null)
        {
            $this->object = $object;

            parent::__construct($file.' on line '.$line.': '.$message, 0, null);
        }

        public function getObject()
        {
            return $this->object;
        }
    }
}