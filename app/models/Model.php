<?php

namespace app\models;

use PDO;

class Model
{
    protected $pdo = null;
    public $table = null;
    public $data = null;

    public function __construct()
    {
        require('app/config.php');
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $user = $config['db']['user'];
        $password = $config['db']['password'];
        $this->pdo = new PDO($dsn, $user, $password);
    }

    public function save()
    {
        $keys = implode(', ', array_keys($this->data));
        $values = ':' . implode(', :', array_keys($this->data));
        $insertQuery = 'INSERT INTO ' . $this->table . ' (' . $keys . ') VALUES (' . $values . ')';

        $query = $this->pdo->prepare($insertQuery);

        return $query->execute($this->data);
    }
}