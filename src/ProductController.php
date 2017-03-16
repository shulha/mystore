<?php

namespace Mystore;


class ProductController
{
    /**
     * Single prod
     */
    public function getProduct($id){

        echo sprintf("Hi! You requested %s with color", $id);
    }
}