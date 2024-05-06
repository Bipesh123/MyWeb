<?php

namespace Lib\Models;

use Lib\Core\ShoppingException;
use Lib\Core\Database;

/**
 * Class User
 *
 * @package Lib\Models
 */
class Comment extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    protected $table = "comments";

    /**
     * Creates new user with the data submitted from the form
     *
     * @param $data
     * @throws \Exception
     */
    public function create($data) {
        if(empty($data['comment'])) {
            throw new ShoppingException(" Comment is required field, please fill in name.");
        }
      
        $sql = "INSERT INTO $this->table SET 
               product_id=?,
                customer_name=?,
                comment=?,
                sentiment=?,
                /*comment_type=?, */
                created_date=CURRENT_TIMESTAMP
                ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['product_id'],
           $data['customer_name'],
            $data['comment'],
            $data['sentiment']/*,
            $data['comment_type']*/
        ]);
    }

  
}