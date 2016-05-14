<?php

namespace pKit\System\Exceptions
{
    /**
     * Class pKitException
     * @package pKit\System\Exceptions
     */
    final class pKitException extends \Exception
    {
        private $object;

        /**
         * pKitException constructor.
         * @param string $file
         * @param int $line
         * @param \Exception $message
         * @param null $object
         */
        public function __construct($file, $line, $message, $object = null)
        {
            $this->object = $object;

            parent::__construct($file.' on line '.$line.': '.$message, 0, null);
        }

        /**
         * @return object
         */
        public function getObject()
        {
            return $this->object;
        }
    }
}