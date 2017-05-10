<?php

namespace Mystore;


use Shulha\Framework\Controller\Controller;

class ProductController extends Controller
{
    /**
     * Single prod
     */
    public function getProduct($id){

        echo sprintf("Hi! You requested %s with color", $id);
    }

    public function getAllGoods()
    {

    }
}