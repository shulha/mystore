<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;

/**
 * Class Orders
 * @package Mystore\Model
 */
class Orders extends Model
{
    public $table = 'orders';

    /**
     * get product from a table by id
     *
     * @param $id
     * @return null|\stdClass
     */
    public function items($id)
    {
        return $this->qb->query('SELECT * FROM products WHERE id='. $id)->first();
    }

    /**
     * get all orders and total price of each from a table
     *
     * @return null|\stdClass
     */
    public function allorders()
    {
        return $this->qb->query('SELECT order_id, sum(price) AS summa
                                 FROM orders GROUP BY order_id ORDER BY order_id DESC')->get();
    }

    /**
     * get created_at from a table by order id
     *
     * @param $id
     * @return mixed
     */
    public function getDate($id)
    {
        return $this->qb->query('SELECT created_at AS date FROM orders WHERE order_id='. $id)->first()->date;
    }
}
