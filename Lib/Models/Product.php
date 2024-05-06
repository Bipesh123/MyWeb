<?php

namespace Lib\Models;

use Lib\Core\ShoppingException;
use Lib\Core\Database;

/**
 * Class Product
 *
 * @package Lib\Models
 */
class Product extends Database{
    /**
     * The database table name to which this class User represents
     *
     * @var string
     */
     protected $table = "products";

    /**
     * Listing the products for admin page (CRUD)
     *
     * @return array
     */
    public function listProducts() {
        $sql = "select 
                    p.*,
                    b.name as brand_name
                from products as p
                left join brands as b on p.brand_id=b.id
                where 1";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
  /**
     * List the products brand wise ($categoryId)
     *
     * @param $categoryId
     * @return array
     */
    public function brandProducts($brandId) {
        if(!empty($brandId)) {
            $sql = "SELECT 
                    p.*,
                    b.name as brand_name
                FROM products as p
                LEFT JOIN brands as b on p.brand_id=b.id
                WHERE p.status=1 AND p.brand_id=?";
            $stmt = $this->_connection->prepare($sql);
            $stmt->execute([$brandId]);
        }
        else {
            $sql = "SELECT 
                    p.*,
                    b.name as brand_name
                FROM products as p
                LEFT JOIN brands as b on p.brand_id=b.id
                WHERE p.status=1";
            $stmt = $this->_connection->prepare($sql);
            $stmt->execute();
        }


        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
   
    /**
     * List all the featured items
     *
     * @return array
     */
    public function listFeaturedItems() {
        $sql = "SELECT 
                    * 
                FROM products ORDER BY RAND()";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProductDetail($id) {
        $sql = "SELECT 
                    p.*,
                    b.name as brand_name
                FROM products as p
                LEFT JOIN brands as b on p.brand_id=b.id
                WHERE p.id=?";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Creates new item
     *
     * @param $data
     * @return string
     * @throws ShoppingException
     */
    public function create($data) {

        if(empty($data['name'])) {
            throw new ShoppingException("Product name is required field, please fill in the name of the product.");
        }
        if(empty($data['price']) && (float) $data['price'] <= 0) {
            throw new ShoppingException("Product price is required field, please enter the product price (positive number).");
        }

        $sql = "INSERT INTO $this->table SET 
                name=?,
                brand_id=?,
                description=?,
                price=?,
                 previous_price=?,
                stock_quantity=?,
                status=?,
                network=?,
                sim=?,
                os=?,
                osversion=?,
                chipset=?,
                ram=?,
                internalstorage=?,
                dresolution=?,
                dsize=?,
                touchscreen=?,
                noch=?,
                resolution=?,
                camera=?,
                video=?,
                flash=?,
                selfieeresolution=?,
                selfieedualcamera=?,
                selfieefontflash=?,
                fingerprint=?,
                wlan=?,
                gps=?,
                bluetooth=?,
                usb=?,
                fmradio=?,
                batterycapacity=?,
                chargingspeed=?,
                removable=?,
                wirelesscharge=?,
                photo_name=?,
                created_at=CURRENT_TIMESTAMP,
                updated_at=CURRENT_TIMESTAMP
                ";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['name'],
            !empty($data['brand_id']) ? $data['brand_id'] : null,
            $data['description'],
            (float) $data['price'],
            (float) $data['previous_price'],
            (int) $data['stock_quantity'],
            $data['status'],
            $data['network'],
            $data['sim'],
            $data['os'],
             $data['osversion'],
                $data['chipset'],
                $data['ram'],
                $data['internalstorage'],
                $data['dresolution'],
                $data['dsize'],
                $data['touchscreen'],
                $data['noch'],
                $data['resolution'],
                $data['camera'],
                $data['video'],
                $data['flash'],
                $data['selfieeresolution'],
                $data['selfieedualcamera'],
                $data['selfieefontflash'],
                $data['fingerprint'],
                $data['wlan'],
                $data['gps'],
                $data['bluetooth'],
                $data['usb'],
                $data['fmradio'],
                $data['batterycapacity'],
                $data['chargingspeed'],
                $data['removable'],
                $data['wirelesscharge'],
                $data['photo_name']
        ]);
        return $this->_connection->lastInsertId();
    }

    /**
     * Updates existing item
     *
     * @param $data
     * @param $id
     * @throws ShoppingException
     */
    public function update($data, $id) {
        if(empty($data['name'])) {
            throw new ShoppingException("Product name is required field, please fill in the name of the product.");
        }

       
        if(empty($data['price']) && (float) $data['price'] <= 0) {
            throw new ShoppingException("Product price is required field, please enter the product price (positive number).");
        }

        $sql = "UPDATE $this->table SET 
                 name=?,
                brand_id=?,
                description=?,
                price=?,
                 previous_price=?,
                stock_quantity=?,
                status=?,
                network=?,
                sim=?,
                os=?,
                osversion=?,
                chipset=?,
                ram=?,
                internalstorage=?,
                dresolution=?,
                dsize=?,
                touchscreen=?,
                noch=?,
                resolution=?,
                camera=?,
                video=?,
                flash=?,
                selfieeresolution=?,
                selfieedualcamera=?,
                selfieefontflash=?,
                fingerprint=?,
                wlan=?,
                gps=?,
                bluetooth=?,
                usb=?,
                fmradio=?,
                batterycapacity=?,
                chargingspeed=?,
                removable=?,
                wirelesscharge=?,
                photo_name=?,
                updated_at=CURRENT_TIMESTAMP
                WHERE id=?";
        $statement = $this->_connection->prepare($sql);
        $statement->execute([
            $data['name'],
            !empty($data['brand_id']) ? $data['brand_id'] : null,
            $data['description'],
            (float) $data['price'],
            (float) $data['previous_price'],
            (int) $data['stock_quantity'],
            $data['status'],
            $data['network'],
            $data['sim'],
            $data['os'],
             $data['osversion'],
                $data['chipset'],
                $data['ram'],
                $data['internalstorage'],
                $data['dresolution'],
                $data['dsize'],
                $data['touchscreen'],
                $data['noch'],
                $data['resolution'],
                $data['camera'],
                $data['video'],
                $data['flash'],
                $data['selfieeresolution'],
                $data['selfieedualcamera'],
                $data['selfieefontflash'],
                $data['fingerprint'],
                $data['wlan'],
                $data['gps'],
                $data['bluetooth'],
                $data['usb'],
                $data['fmradio'],
                $data['batterycapacity'],
                $data['chargingspeed'],
                $data['removable'],
                $data['wirelesscharge'],
                $data['photo_name'],
                $id
            
        ]);
    }


     public function getComments($productId) {
        $stmt = $this->_connection->prepare("SELECT * FROM comments WHERE product_id=?");
        $stmt->execute([$productId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

/*****public function saveComments($product_id, $customer_id, $comment, $created_at) {
        $sql = "INSERT INTO comments SET product_id=?, customer_id=?, comment=?, created_at=CURRENT_TIMESTAMP";
        $stmt = $this->_connection->prepare($sql);
        $stmt->execute([$product_id, $customer_id, $comment, $created_at]);
    } */
     }