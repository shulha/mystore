<?php

namespace Mystore\Controller;

use Mystore\Model\Orders;
use Shulha\Framework\Controller\Controller;

/**
 * Class OrderController
 * @package Mystore\Controller
 */
class OrderController extends Controller
{
    /**
     * Get all orders by desc date
     *
     * @param Orders $orders
     * @return mixed
     */
    public function orders(Orders $orders)
    {
        $all_orders = $orders->allorders();

        foreach ($all_orders as $order) {
                $order->date = $orders->getDate($order->order_id);
                $orders_time[] =$order;
        }

        return view('admin.orders.orders',['orders'=>$orders_time]);
    }

    /**
     * Show an order
     *
     * @param Orders $orders
     * @param $id
     * @return mixed
     */
    public function show(Orders $orders, $id)
    {
        $all_order = $orders->qb->table($orders->table)->where('order_id', '=', $id)
            ->asObject(get_class($orders), [$orders->dbo])->get();

        return view('admin.orders.show_order', ['orders'=>$all_order]);

    }
}
