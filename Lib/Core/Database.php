<?php

namespace Lib\Core;

class Database {
    /**
     * @var
     */
    protected $table;

    /**
     * PDO Resource Object
     *
     * @var \PDO
     */
    protected $_connection;

    /**
     * Database constructor.
     */
    public function __construct(){
        $this->_connection = new \PDO('mysql:host=' . _DATABASE_HOST . ';dbname=' . _DATABASE_NAME, _DATABASE_USER, _DATABASE_PASSWORD);
        $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Gets all the items
     */
    public function all() {
        $statement = $this->_connection->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC); // returns all the rows returned by the query
    }

    /**
     * Gets a single record/item
     *
     * @param $id
     * @return mixed
     */
    public function getSingle($id) {
        $sql = "SELECT * FROM $this->table WHERE id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE id=?";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([$id]);
        return true;
    }
}