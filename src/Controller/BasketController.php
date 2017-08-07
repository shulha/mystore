<?php

namespace Mystore\Controller;

use Mystore\Model\BasketCookie;
use Mystore\Model\Orders;
use Mystore\Model\Products;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Session\Session;
use Shulha\Framework\Validation\Validator;

/**
 * Class BasketController
 * @package Mystore\Controller
 */
class BasketController extends Controller
{
    /**
     * Show basket with all ordered products
     *
     * @param BasketCookie $basket
     * @return mixed
     */
    function index(BasketCookie $basket)
    {
        $orders = $basket->getAllOrders();

        return view('basket',['orders'=>$orders]);
    }

    /**
     * Checkout an order
     *
     * @param Request $request
     * @param Orders $ord
     * @param Products $products
     * @param BasketCookie $basket
     * @param Session $session
     * @return mixed|\Shulha\Framework\Response\RedirectResponse
     */
    function checkout(Request $request, Orders $ord, Products $products, BasketCookie $basket, Session $session)
    {
        if(!$orders = $basket->getAllOrders())
        {
            return $this->redirect();
        }

        $total_cost=0;
        $latest_order = $ord->latest();
        $order_id=empty($latest_order->order_id)? 1 : $latest_order->order_id+1;

        $validator = new Validator($request, [
            "name" => ["required"],
            "address" => ["required"],
            "phone" => ["required", "numeric", "length_between:6,12"]
        ]);
        if (!$validator->validate())
        {
            $session->flashErrorList($validator->getErrorList());
            return $this->redirect('basket');
        }

        foreach($orders as $total => $value) {
            $products->qb->transaction(function ($qb) use ($value, $session, $products, $ord, $order_id, $request){
                foreach ($value as $order) {
                    $order_amount = (int)$order->amount;
                    $item = $products->qb->table($products->table)->where('id', '=', $order->id)->first();
                    $storage = (int)$item->storage;

                    if ($order_amount > $storage) {
                        $session->flashErrorList(['Amount'=>[$item->title .' available '. $storage . ' pieces']]);
                        $qb->rollback();
                        return $this->redirect('basket');
                    }

                    $products->update($item->id, ['storage'], [$storage-$order_amount]);
                    $ord->insert(['product_id', 'price', 'order_id', 'amount', 'name', 'address', 'phone'],
                        [$order->id, $order->price, $order_id, $order_amount, $request->name, $request->address, $request->phone]);
                }
                $qb->commit();
            });
            $total_cost = (float)$total;
        }

        setcookie('basket','');
        $new_order = $ord->qb->table($ord->table)->where('order_id','=', $order_id)
            ->asObject(get_class($ord), [$ord->dbo])->get();

        return view('finish_order',['orders'=>$new_order,'total'=>$total_cost]);
    }

}
