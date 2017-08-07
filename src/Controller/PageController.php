<?php

namespace Mystore\Controller;

use Shulha\Framework\Controller\Controller;

/**
 * Class PageController
 * @package Mystore\Controller
 */
class PageController extends Controller
{
    /**
     * Home page
     */
    public function index(){

        return view('home');
    }

    /**
     * Contact page
     */
    public function contact()
    {
        $address = "Al'tanka, Sumy, Sums'ka oblast, Ukraine";

        return view('contact', compact('address'));
    }
}
