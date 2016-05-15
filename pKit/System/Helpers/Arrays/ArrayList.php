<?php

namespace pKit\System\Helpers\Arrays
{
    /**
     * Class ArrayList
     * @package pKit\System\Helpers\Arrays
     */
    class ArrayList implements \Iterator
    {

        private $position = 0;
        private $data = [];

        /**
         * ArrayList constructor.
         * @param array $data
         */
        public function __construct(array $data)
        {
            $this->data = $data;
        }

        /**
         * @return array
         */
        public function getAll()
        {
            return $this->data;
        }

        /**
         * @param callable|null $callback
         */
        public function sort(callable $callback = null)
        {
            if($callback == null)
            {
                $this->data = sort($this->data);
            }
            else
            {
                $this->data = $callback($this->data);
            }
        }

        /**
         * Return the current element
         * @link http://php.net/manual/en/iterator.current.php
         * @return mixed Can return any type.
         * @since 5.0.0
         */
        public function current()
        {
            return $this->data[$this->position];
        }

        /**
         * Move forward to next element
         * @link http://php.net/manual/en/iterator.next.php
         * @return void Any returned value is ignored.
         * @since 5.0.0
         */
        public function next()
        {
            ++$this->position;
        }

        /**
         * Move backward to previous element
         * @return void Any returned value is ignored.
         */
        public function previous()
        {
            --$this->position;
        }

        /**
         * Return the key of the current element
         * @link http://php.net/manual/en/iterator.key.php
         * @return mixed scalar on success, or null on failure.
         * @since 5.0.0
         */
        public function key()
        {
            return $this->position;
        }

        /**
         * Checks if current position is valid
         * @link http://php.net/manual/en/iterator.valid.php
         * @return boolean The return value will be casted to boolean and then evaluated.
         * Returns true on success or false on failure.
         * @since 5.0.0
         */
        public function valid()
        {
            return isset($this->data[$this->position]);
        }

        /**
         * Rewind the Iterator to the first element
         * @link http://php.net/manual/en/iterator.rewind.php
         * @return void Any returned value is ignored.
         * @since 5.0.0
         */
        public function rewind()
        {
            $this->position = 0;
        }
    }
}