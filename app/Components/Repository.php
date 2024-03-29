<?php
/**
 * Created by PhpStorm.
 * User: mix
 * Date: 06.10.19
 * Time: 9:15
 */

namespace App\Components;


abstract class Repository
{
    protected $connectionName = 'db';
    protected $connectionNameReplica = 'db_replica';

    private $useReplica = false;

    private static $connections;
    private static $config;

    public function select(string $sql, array $params = [])
    {

    }

    public function selectClass(string $sql, $className, array $params = [])
    {
        $query = $this->connection()->prepare($sql);

        $query->setFetchMode(\PDO::FETCH_CLASS, $className);
        $query->execute($params);
        return $query->fetchAll();
    }

    public function insert(string $tableName, array $params)
    {
        $sql = "INSERT INTO $tableName (" . join(",", array_keys($params)) . ")";
        $sql .= "VALUES (" .
            join(",", array_map(function ($item){return ':' . $item;},array_keys($params))) .
            ")";

        $query = $this->connection()->prepare($sql);
        foreach ($params as $name => $value) {
            $query->bindValue(':' . $name, $value);
        }
        $query->execute();
        //var_dump($query->errorInfo());
        return $this->connection()->lastInsertId();
    }

    public static function init($dbConfig)
    {
        static::$config = $dbConfig;
    }

    protected function connection() : \PDO
    {
        $connectionName = $this->useReplica ? $this->connectionNameReplica: $this->connectionName;

        if (!isset(self::$connections[$connectionName])) {
            self::$connections[$connectionName] = $this->createConnection(self::$config[$connectionName]);
        }

        return self::$connections[$connectionName];
    }

    private function createConnection($dbConfigItem)
    {
        return new \PDO($dbConfigItem['connectionString'], $dbConfigItem['user'], $dbConfigItem['password']);
    }

    /**
     * @return bool
     */
    public function isUseReplica(): bool
    {
        return $this->useReplica;
    }

    /**
     * @param bool $useReplica
     */
    public function setUseReplica(bool $useReplica): void
    {
        $this->useReplica = $useReplica;
    }
}
