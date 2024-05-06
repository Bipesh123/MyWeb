<?php

namespace Lib\Models;

use Lib\Core\ShoppingException;
use Lib\Core\Database;

/**
 * Class brand
 *
 * @package Lib\Models
 */
class Brand extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    protected $table = "brands";

    /**
     * Returns all the active brands for main header menu in frontend
     *
     * @return array
     */
    public function menuBrands() {
        $statement = $this->_connection->prepare("SELECT * FROM $this->table WHERE status=1");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC); // returns all the rows returned by the query
    }

    /**
     * Creates new item
     *
     * @param $data
     * @throws \Exception
     */
    public function create($data) {
        if(empty($data['name'])) {
            throw new ShoppingException("Name is required field, please fill in name.");
        }

        $sql = "INSERT INTO $this->table SET 
                name=?,
                status=?,
                photo_name=?,
                created_at=CURRENT_TIMESTAMP,
                updated_at=CURRENT_TIMESTAMP
                ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['name'],
            $data['status'],
            $data['photo_name']
        ]);
    }

    /**
     * Updates existing item
     *
     * @param $data
     * @throws \Exception
     */
    public function update($data, $id) {
        if(empty($data['name'])) {
            throw new ShoppingException("Name is required field, please fill in name.");
        }

        $sql = "UPDATE $this->table SET 
            name=?,
            status=?,
            photo_name=?,
            updated_at=CURRENT_TIMESTAMP
            WHERE id=?";
        $statement = $this->_connection->prepare($sql);

        $updateData = [
            $data['name'],
            $data['status'],
            $data['photo_name'],
            $id
        ];
        $statement->execute($updateData);
    }
}