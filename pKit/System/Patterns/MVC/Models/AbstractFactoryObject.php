<?php

namespace pKit\System\Patterns\MVC\Models
{

    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

    /**
     * Class AbstractFactoryObject
     * @package pKit\System\Patterns\MVC\Models
     */
    class AbstractFactoryObject
    {
        private $row;
        private $table;
        private $connection;
        private $modelsManager;

        /**
         * AbstractFactoryObject constructor.
         * @param mixed $row
         * @param \PDO $connection
         * @param ModelsManager $modelsManager
         * @param string $table
         */
        public function __construct($row, \PDO $connection, ModelsManager $modelsManager, $table)
        {
            $this->row = $row;
            $this->connection = $connection;
            $this->modelsManager = $modelsManager;
            $this->table = $table;
        }

        /**
         * @return \PDO
         */
        public function getConnection()
        {
            return $this->connection;
        }

        /**
         * @return ModelsManager
         */
        public function getModelsManager()
        {
            return $this->modelsManager;
        }

        /**
         * @return string
         */
        public function getTable()
        {
            return $this->table;
        }

        /**
         * @return void
         */
        public function remove()
        {
            try
            {
                $query = $this->connection->prepare('DELETE FROM `' . $this->table . '` WHERE id = :id');
                $query->execute([':id' => $this->row->id]);
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        /**
         * @return mixed
         */
        public function getRow()
        {
            return $this->row;
        }

        /**
         * @param string $row
         * @param mixed $val
         * @return $this
         */
        public function set($row, $val)
        {
            try
            {
                $query = $this->connection->prepare('UPDATE `'.$this->table.'` SET `'.$row.'` = :val WHERE `id` = :id');
                $query->execute([':val' => $val, ':id' => $this->row->id]);

                $this->updateRowByColumn('id', $this->row->id);
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                return $this;
            }
        }

        /**
         * @param string $column
         * @param mixed $val
         * @return bool
         */
        public function updateRowByColumn($column, $val)
        {
            try
            {
                $query = $this->connection->prepare('SELECT * FROM `' . $this->table . '` WHERE `' . $column . '` = :val');
                $query->execute([':val' => $val]);

                if ($query->rowCount() > 0) {
                    $this->row = $query->fetchObject();
                    return true;
                }
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
}