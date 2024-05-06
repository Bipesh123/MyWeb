<?php

namespace Lib\Models;

use Lib\Core\ShoppingException;
use Lib\Core\Database;

/**
 * Class Cart
 *
 * @package Lib\Models
 */
class Cart extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
    protected $table = "cart";

    /**
     * @param $sessionId
     * @return array
     */
    public function listCart($sessionId) {
        $sql = "SELECT 
                    c.*,
                    p.name as product_name,
                    p.photo_name as product_photo_name
                FROM cart AS c
                INNER JOIN products AS p on p.id=c.product_id
                WHERE c.session_id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$sessionId]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Gets the total number of items added in the cart from the same session (user)
     *
     * @param $sessionId
     * @return mixed
     */
    public function getCartTotalQuantity($sessionId) {
        $sql = "SELECT SUM(quantity) AS total_quantity
                FROM cart
                WHERE session_id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$sessionId]);

        return $stmt->fetchColumn();
    }

    /**
     * Gets the total amount of added items in the cart from the same session (user)
     *
     * @param $sessionId
     * @return mixed
     */
    public function getCartTotalAmount($sessionId) {
        $sql = "SELECT SUM(total) AS total_quantity
                FROM cart
                WHERE session_id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$sessionId]);

        return $stmt->fetchColumn();
    }

    /**
     * Add item to the cart
     *
     * @param $data
     * @return bool
     */
    public function addToCart($data) {
        $sql = "INSERT INTO $this->table SET
                session_id=?,
                product_id=?,
                price=?,
                quantity=?,
                total=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([
            $data['session_id'],
            $data['product_id'],
            $data['price'],
            $data['quantity'],
            ($data['price'] * $data['quantity']),
        ]);

        return true;
    }

    /**
     * Updates a particular cart item in the cart
     *
     * @param $cartId
     * @param $quantity
     * @return bool
     */
    public function updateCart($cartId, $quantity) {
        $cart = $this->getSingle($cartId);

        $sql = "UPDATE $this->table SET quantity=?,total=? WHERE id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$quantity, ($cart['price'] * $quantity), $cartId]);
        return true;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        $stmt = $this->_connection->prepare("DELETE FROM $this->table WHERE id=?");
        $stmt->execute([$id]);
        return true;
    }
}







