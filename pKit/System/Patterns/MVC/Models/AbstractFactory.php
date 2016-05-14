<?php

namespace pKit\System\Patterns\MVC\Models
{

    use pKit\System\Exceptions\pKitException;
    use pKit\System\Patterns\MVC\Models\Handlers\ModelsManager;

    abstract class AbstractFactory
    {
        abstract public function create($row);

        private $modelsManager;
        private $connection;

        private $table;

        private $cachedRows = [];

        public function __construct(ModelsManager $modelsManager, \PDO $connection, $table = null)
        {
            $this->modelsManager = $modelsManager;
            $this->connection = $connection;

            $this->table = $table;
        }

        public function getTable()
        {
            return $this->table;
        }

        public function getConnection()
        {
            return $this->connection;
        }

        public function _create(array $params)
        {
            $queryString = 'INSERT INTO `'.$this->table.'` SET ';
            $executeParams = [];

            $i = 0;
            foreach($params as $param => $val)
            {
                $queryString .= '`'.$param.'` = :'.$param;
                $executeParams[':'.$param] = $val;

                if(!($i+1 == count($params)))
                {
                    $queryString .= ',';
                }

                $i++;
            }

            try
            {
                $query = $this->connection->prepare($queryString);
                $query->execute($executeParams);

                return $this->getById($this->connection->lastInsertId());
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }

        }

        public function getModelsManager()
        {
            return $this->modelsManager;
        }

        public function getByColumn($row, $val, $reload = false)
        {
            if($this->table == null)
            {
                throw new pKitException(__DIR__.'/AbstractFactory.php', 39, 'Cannot get object by not given table.');
                return;
            }

            if(!$reload)
            {
                foreach($this->cachedRows as $_row)
                {
                    if($_row->getRow()->$row == $val)
                    {
                        return $row;
                    }
                }
            }

            try
            {
                $query = $this->connection->prepare('SELECT * FROM `' . $this->table . '` WHERE `' . $row . '` = :val');
                $query->execute([':val' => $val]);

                if ($query->rowCount() > 0) {
                    $row = $query->fetchObject();

                    $object = $this->create($row);

                    return $object;
                }
            }
            catch(\PDOException $e)
            {
                echo $e->getMessage();
            }

            return null;
        }

        public function getById($id, $reload = false)
        {
            return $this->getByColumn('id', $id, $reload);
        }
    }
}