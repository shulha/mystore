<?php

namespace Mystore\Model;

use Shulha\Framework\Model\Model;

/**
 * Class BasketCookie
 * @package Mystore\Model
 */
class BasketCookie extends Model
{
    /**
     * Get all older from cookie
     *
     * @return mixed
     */
    public function getAllOrders()
    {
        $all=[];
        $total=0;

        if(isset($_COOKIE['basket']))
        {
            $orders = $_COOKIE['basket'];
            $orders=json_decode($orders);
            foreach ($orders as $order){
                $ord = $this->product($order->item_id);
                $ord->preview = explode(';', $ord->preview)[0] ?? null;
                $ord->amount = $order->amount;
                $total += $ord->price*$ord->amount;
                $all[] = $ord;
            }
        }

        $all_orders[(string)$total]=$all;

        return $all_orders;
    }

    /**
     * get product from a table by id
     *
     * @param $id
     * @return null|\stdClass
     */
    public function product($id)
    {
        return $this->qb->query('SELECT * FROM products p WHERE p.id =' . $id)->first();
    }

}