<?php

namespace Mystore;

use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Response\JsonResponse;

/**
 * Class IndexController
 * @package Mystore
 */
class IndexController extends Controller
{
    /**
     * Index action
     */
    public function index()
    {
        return $this->render(__DIR__ . '/views/index.html.php', [], false);
    }

    /**
     * Single prod
     */
    public function getProduct($id)
    {
        return $this->render(__DIR__ . '/views/product.html.php', ["id" => $id]);
    }

    public function createProduct()
    {
        $request = Request::getInstance();

        $validator = new Validator($request, [
            "title" => ["required", "length_between:3,100"],
            "price" => ["required", "numeric", "min:0"]
        ]);

        if (!$validator->validate()) {
            return new JsonResponse([
                "success" => false,
                "error" => $validator->getErrors()
            ], 400);
        }

        //todo create new product and persist

        return new JsonResponse(
            [
                "success" => true,
                "data" => [
                    "title" => $request->title,
                    "price" => $request->price,
                    "description" => $request->description
                ]
            ]
        );
    }
}