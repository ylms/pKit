<?php

namespace pKit\System\Helpers\Pagers
{
    /**
     * Class Pager
     * @package pKit\System\Helpers\Pagers
     */
    class Pager
    {
        private $data = [];
        private $perPage = 0;

        private $pages = 0;
        private $page = 1;

        /**
         * Pager constructor.
         * @param array $data
         * @param int $perPage
         */
        public function __construct(array $data, $perPage)
        {
            $this->data = $data;
            $this->perPage = $perPage;

            $this->pages = ceil(count($data) / $perPage);
        }

        /**
         * @return int
         */
        public function getPages()
        {
            return $this->pages;
        }

        /**
         * @return int
         */
        public function getPage()
        {
            return $this->page;
        }

        /**
         * @param int $page
         * @return Pager $this
         */
        public function setPage($page)
        {
            if($page > $this->pages)
            {
                $page = 1;
            }

            $this->page = $page-1;

            return $this;
        }

        /**
         * @return array
         */
        public function getValue()
        {
            $arr = array_slice($this->data, $this->page*$this->perPage, $this->perPage);
            return $arr;
        }
    }
}