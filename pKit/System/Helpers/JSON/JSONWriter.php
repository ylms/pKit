<?php

namespace pKit\System\Helpers\JSON
{
    /**
     * Class JSONWriter
     * @package pKit\System\Helpers\JSON
     */
    final class JSONWriter
    {
        private $val;

        /**
         * @param $var
         * @param $val
         */
        public function write($var, $val)
        {
            $this->val[$var] = $val;
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