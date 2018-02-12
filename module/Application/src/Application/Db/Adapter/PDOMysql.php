<?php

namespace Application\Db\Adapter;

/**
 * Abstract class PDOMysql
 *
 * @package Application\Db\Adapter
 */
class PDOMysql extends AbstractAdapter
{
    /**
     * {@inheritdoc}
     */
    public function executePreparedSelect($statement, array $parameters = [])
    {
        $preparedStatement = $this->getConnection()->prepare($statement, $parameters);
        $preparedStatement->execute();

        return $preparedStatement->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return \PDO|null
     */
    protected function getConnection()
    {
        if (!$this->resource) {

            // todo: Validate connection params...
            $username = $this->connectionParameters['username'];
            $password = $this->connectionParameters['password'];
            $host     = $this->connectionParameters['host'];
            $database = $this->connectionParameters['database'];

            if (!$this->resource) {
                $this->resource = new \PDO("mysql:dbname=$database;host=$host;charset=utf8", $username, $password);
            }
        }

        // todo: Throw exception
        return $this->resource;
    }
}
