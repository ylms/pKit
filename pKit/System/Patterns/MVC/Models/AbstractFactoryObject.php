<?php

namespace pKit\System\Patterns\MVC\Models
{

    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

    class AbstractFactoryObject
    {
        private $row;
        private $table;
        private $connection;
        private $modelsManager;

        public function __construct($row, \PDO $connection, ModelsManager $modelsManager, $table)
        {
            $this->row = $row;
            $this->connection = $connection;
            $this->modelsManager = $modelsManager;
            $this->table = $table;
        }

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

        public function getRow()
        {
            return $this->row;
        }

        public function set($row, $val)
        {
            try
            {
                $query = $this->connection->prepare('UPDATE `'.$this->table.'` SET `'.$row.'` = :val');
                $query->execute([':val' => $val]);

                $this->updateRowByColumn('id', $this->getRow()->id);
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