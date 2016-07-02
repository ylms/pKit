<?php

namespace pKit\System\Helpers\JSON
{
    /**
     * Class JSONWriter
     * @package pKit\System\Helpers\JSON
     */
    final class JSONWriter
    {
        private $val = [];

        /**
         * @param $var
         * @param $val
         */
        public function write($var, $val)
        {
            $this->val[$var] = $val;
        }

        /**
         * @param $var
         * @param $val
         */
        public function __set($var, $val)
        {
            return $this->write($var, $val);
        }

        /**
         * @param $var
         * @return mixed
         */
        public function __get($var)
        {
            return $this->val[$var];
        }

        /**
         * @param $var
         * @return bool
         */
        public function __isset($var)
        {
            return isset($this->val[$var]);
        }

        /**
         * @return string
         */
        public function __toString()
        {
            header('Content-type: application/json');
            return $this->getJson();
        }

        /**
         * @return string
         */
        public function getJson()
        {
            return json_encode($this->val);
        }

        /**
         * @param $var
         */
        public function remove($var)
        {
            if(isset($this->val[$var]))
            {
                unset($this->val[$var]);
            }
        }
    }
}