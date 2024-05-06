<?php

namespace Lib\Models;

use Lib\Core\ShoppingException;
use Lib\Core\Database;

/**
 * Class User
 *
 * @package Lib\Models
 */
class Customer extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    protected $table = "customers";

    /**
     * Creates new user with the data submitted from the form
     *
     * @param $data
     * @throws \Exception
     */
    public function create($data) {
        if(empty($data['full_name'])) {
            throw new ShoppingException("Full name is required field, please fill in full name.");
        }

        if(strlen($data['password']) < 5) {
            throw new ShoppingException("Password field must be at least 5 characters long.");
        }

        $stmt = $this->_connection->prepare("SELECT id FROM customers WHERE email=?");
        $stmt->execute([$data['email']]);
        if($stmt->rowCount() > 0) {
            throw new \Exception("email <strong>{$data['email']}</strong> already exists. Please choose different email.");
        }

        $sql = "INSERT INTO $this->table SET 
                full_name=?,
                email=?,
                password=?,
                phone_no=?,
                status=1,
                created_at=CURRENT_TIMESTAMP,
                updated_at=CURRENT_TIMESTAMP
                ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['full_name'],
            $data['email'],
            md5($data['password']),
            $data['phone_no']
        ]);
    }

    /**
     * Creates new user with the data submitted from the form
     *
     * @param $data
     * @throws \Exception
     */
    public function update($data, $id) {
        if(empty($data['full_name'])) {
            throw new ShoppingException("Full name is required field, please fill in full name.");
        }

        if(!empty($data['password']) && strlen($data['password']) < 5) {
            throw new ShoppingException("Password field must be at least 5 characters long.");
        }

        if(!empty($data['password'])) {
            $sql = "UPDATE $this->table SET 
                full_name=?,
                password=?,
                phone_no=?,
                status=?,
                updated_at=CURRENT_TIMESTAMP
                WHERE id=?";

            $updateData = [
                $data['full_name'],
                md5($data['password']),
                $data['phone_no'],
                $data['status'],
                $id
            ];
        }
        else {
            $sql = "UPDATE $this->table SET 
                full_name=?,
                phone_no=?,
                status=?,
                updated_at=CURRENT_TIMESTAMP
                WHERE id=?";
            $updateData = [
                $data['full_name'],
                $data['phone_no'],
                $data['status'],
                $id
            ];
        }

        $statement = $this->_connection->prepare($sql);
        $statement->execute($updateData);
    }

    /**
     * @param $username
     * @param $password
     * @return bool|mixed
     * @throws ShoppingException
     */
    public function checkLogin($email, $password) {
        $sql = "SELECT * FROM $this->table WHERE email=? AND password=? ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([$email, md5($password)]);

        if($statement->rowCount() > 0) {
            $row = $statement->fetch(\PDO::FETCH_ASSOC);
            if($row['status'] == 0) {
                throw new ShoppingException("Your account has been suspended, please contact Administrator.");
            }

            /**
             * Update last login date/time
             */
            $statement = $this->_connection->prepare("UPDATE $this->table SET last_login=? WHERE id=?");
            $statement->execute([date('Y-m-d H:i:s'), $row['id']]);

            $_SESSION['_root_customer'] = true;
            $_SESSION['_customer'] = $row;
            return $row;
        }
        else {
            return false;
        }
    }

    /**
     * Destroy all the session variables to logout
     */
    public function logout() {
        session_destroy();
    }

    /**
     * Checks whether an customer user is logged in or not,
     * Returns true if logged in, false otherwise.
     *
     * @return bool
     */
    public function isCustomerLogin() {
        if(isset($_SESSION['_root_customer'])) {
            return true;
        }
        else {
            return false;
        }
    }
}