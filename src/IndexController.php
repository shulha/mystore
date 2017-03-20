<?php

namespace Mystore;

use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
//use Shulha\Framework\Validation\Validator;

/**
 * Class IndexController
 * @package Mystore
 */
class IndexController extends Controller
{
    /**
     * Index action
     */
    public function index(Request $request)
    {
//        debug($request);
//
//        return $this->render('error.404');
    }

    /**
     * Single prod
     */
    public function getProduct($id, Request $request)
    {
        debug($request);
        return $this->render('sample', ['second' => 'TV', 'id' => $id]);
//        return $this->render('hello');
    }

//    public function getProduct(Request $request, $id, $name)
//    {
//        return $this->render('sample', ['name' => $name, 'second' => 'TV', 'id' => $id]);
////        return $this->render('hello');
//    }

    public function createProduct()
    {
        $request = Request::getInstance();


//        debug ($_POST);
//        echo $_REQUEST['title'];

        $validator = new Validator($request, [
            "title" => ["numeric"],
//            "price" => ["required", "numeric", "min:0"]
        ]);

        if (!$validator->validate()) {
            return new JsonResponse([
                "success" => false,
                "error" => $validator->getErrorList()
            ], 400);
        }

        //todo create new product and persist

        return new JsonResponse(
            [
                "success" => true,
                "data" => [
                    "title" => $request->title,
//                    "price" => $request->price,
//                    "description" => $request->description
                ]
            ]
        );
    }

//    public function createProduct()
//    {
//        $request = Request::getInstance();
//
//        $validator = new Validator($request, [
//            "title" => ["required", "length_between:3,100"],
//            "price" => ["required", "numeric", "min:0"]
//        ]);
//
//        if (!$validator->validate()) {
//            return new JsonResponse([
//                "success" => false,
//                "error" => $validator->getErrors()
//            ], 400);
//        }
//
//        //todo create new product and persist
//
//        return new JsonResponse(
//            [
//                "success" => true,
//                "data" => [
//                    "title" => $request->title,
//                    "price" => $request->price,
//                    "description" => $request->description
//                ]
//            ]
//        );
//    }
}