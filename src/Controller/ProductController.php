<?php

namespace Mystore\Controller;

use Mystore\Model\Cart;
use Mystore\Model\Category;
use Mystore\Model\Parameter;
use Mystore\Model\Parameter_value;
use Mystore\Model\Products;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Response\RedirectResponse;
use Shulha\Framework\Session\Session;
use Shulha\Framework\Validation\Validator;

/**
 * Class ProductController
 * @package Mystore\Controller
 */
class ProductController extends Controller
{
    /**
     * Show all product of category
     *
     * @param $id
     * @param $slug
     * @param Request $request
     * @param Products $model
     * @return mixed
     */
    public function index($id, $slug, Request $request, Products $model)
    {
        $limit = $request->numpos ?? 12;
        $order_field = ($request->sort) ? key($request->sort) : 'updated_at';
        $order_direct = $request->direction ?? 'DESC';

        $products = $model->qb->table($model->table)->where('category_id', '=', $id)->limit($limit)
            ->orderBy($order_field, $order_direct)->get();

        return view('categoryProduct', compact('products', 'slug', 'id', 'limit', 'order_field', 'order_direct'));
    }

    /**
     * Show next products aka pagination
     *
     * @param $id
     * @param $slug
     * @param $limit
     * @param Request $request
     * @param Products $model
     * @return mixed
     */
    public function next($id, $slug, $limit, Request $request, Products $model)
    {
        $limit = 2*(int)$limit;
        $order_field = $request->order_field;
        $order_direct = $request->order_direct;
        $products = $model->qb->table($model->table)->where('category_id', '=', $id)->limit($limit)
            ->orderBy($order_field, $order_direct)->get();

        return view('categoryProduct', compact('products', 'slug', 'id', 'limit', 'order_field', 'order_direct'));
    }

    /**
     * Search product by product_name, parameter_name
     *
     * @param Request $request
     * @param Products $model
     * @param Session $session
     * @return mixed|RedirectResponse
     */
    public function search(Request $request, Products $model, Session $session)
    {
        $validator = new Validator($request, [
            "search" => ["length_between:3,100"],
        ]);
        if (!$validator->validate()) {
            $session->flashErrorList($validator->getErrorList());

            if (!$request->id) {
                return $this->redirect('catalog');
            }

            return new RedirectResponse('/category/'.$request->slug.'/' . $request->id, 200);
        }

        $objects = $model->search($request->search);

        usort( $objects, function($a, $b)
        {
            return strcmp( $a->id, $b->id) ?:
                (($a->id == $b->id) ? 0 : (($a->id < $b->id) ? -1 : 1));
        });

        $results = array_filter( $objects, function ($x){
            static $id;
            if( $x->id === $id)
                return false;
            $id = $x->id;
            return true;
        });

        return view('search', compact('results'));
    }

    /**
     * Show product
     *
     * @param $id
     * @param Products $model
     * @param Cart $cart
     * @return mixed
     */
    public function show($id, Products $model, Cart $cart)
    {
        $product = $model->find($id);
        $parameters = $model->parameters($id);

        $input = [];
        foreach ($parameters as $item) {
            @$input[$item->title.' '.$item->unit][$item->id] .= $item->value ;
        }
        $input = ($parameters[0]->id) ? $input : null;

        $images = explode(';', $product->preview);

        return view('product', ['items' => $product, 'parameters' => $input, 'images' => $images]);
    }

    /**
     * Show create form
     *
     * @param Category $categories
     * @return mixed
     */
    public function create(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->select('id', 'name')->get();

        return view('admin.products.createProduct', compact('categories'));
    }

    /**
     * Store product
     *
     * @param Request $request
     * @param Products $item
     * @param Parameter_value $pv
     * @param Session $session
     * @return RedirectResponse
     */
    public function store(Request $request, Products $item, Parameter_value $pv, Session $session)
    {
        $validator = new Validator($request, [
            "title" => ["required"],
            "price" => ["required", "numeric", "length_between:1,20"],
            "amount" => ["required", "numeric"]
        ]);
        if (!$validator->validate())
        {
            $session->flashErrorList($validator->getErrorList());
            return $this->redirect('create_product');
        }
        if ((int)$request->category_id == 0)
        {
            $session->flashErrorList(['Category' => ['Field category is required']]);
            return $this->redirect('create_product');
        }

        $item->category_id = (int)$request->category_id;
        $item->article = $request->article;
        $item->title = $request->title;
        $item->description = $request->description;
        $item->selected = $request->selected ? true : false;
        $item->price = $request->price;
        $item->storage = (int)$request->amount;

        $folder = "/images/";
        if ($request->hasFile('preview')) {
            $item->preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        $item->save();

        for($i = 0; $i < count($request->parameter); ++$i) {
            $pv->parameters_id = $request->parameter[$i];
            $pv->products_id = $item->id;
            $pv->value = $request->value[$i];
            $pv->save();
        }

        return new RedirectResponse('/product/show/' . $item->id, 200);
    }

    /**
     * Show last three products
     *
     * @param Products $item
     * @return mixed
     */
    public function last(Products $item)
    {
        $products = $item->qb->table($item->table)->orderBy('created_at', 'DESC')->limit(6)->get();

        return view('categoryProduct', compact('products'));
    }

    /**
     * Show edit product form
     * @param $id
     * @param Products $products
     * @param Parameter $param
     * @param Category $categories
     * @return mixed
     */
    public function edit($id, Products $products, Parameter $param, Category $categories)
    {
        $item = $products->qb->table($products->table)->find($id);
        $category = $categories->qb->table($categories->table)->where('id', '=', $item->category_id)->first();
        $all_categories = $categories->qb->table($categories->table)->whereNot('id', '=', $category->id)->get();;
        $parameters = $products->parameters($id);
        $parameters_all = $param->all();

        if (!empty($parameters) && strlen($item->preview) > 0) {
            $images = explode(';', $item->preview);
        } else {
            $images = [];
        }

        return view('admin.products.editProduct',
            compact('item', 'parameters', 'images', 'parameters_all', 'category', 'all_categories'));
    }

    /**
     * Delete image of product
     *
     * @param Request $request
     * @param Products $products
     * @return string
     */
    public function del_image(Request $request, Products $products)
    {
        $src = $request->src;
        $item_id = $request->item_id;
        $item = $products->find($item_id);
        $images = explode(";", $item->preview);
        $root = $_SERVER['DOCUMENT_ROOT'];
        if (($key = array_search($src, $images)) >= 0)
        {
            unset($images[$key]);
            if (file_exists($root . $src))
            {
                unlink($root . $src);
            }
        }
        $url = implode(";", $images);
        $item->update($item_id, ['preview'], [$url]);

        return "OK";
    }

    /**
     * Update product
     *
     * @param Request $request
     * @param Products $products
     * @param Parameter_value $pv
     * @param Session $session
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, Products $products, Parameter_value $pv, Session $session, $id)
    {
        $validator = new Validator($request, [
            "title" => ["required"],
            "price" => ["required", "numeric", "length_between:1,20"],
            "amount" => ["required", "numeric"]
        ]);
        if (!$validator->validate())
        {
            $session->flashErrorList($validator->getErrorList());
            return $this->redirect('create_product');
        }
        if ((int)$request->category_id == 0)
        {
            $session->flashErrorList(['Category' => ['Field category is required']]);
            return $this->redirect('create_product');
        }

        $old_product = $products->qb->table($products->table)->find($id);
        $old_preview = $old_product->preview;
        $selected = $request->selected ? true : false;
        $folder = "/images/";

        if ($request->hasFile('preview')) {
            $new_preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        if (strlen($old_preview) == 0) {
            $preview = $new_preview;
        } elseif (strlen($new_preview) == 0){
            $preview = $old_preview;
        } else {
            $preview = $old_preview.';'.$new_preview;
        }

        $products->update($id,
            ['title', 'description', 'category_id', 'storage', 'selected', 'price', 'preview', 'updated_at'],
            [$request->title, $request->description, $request->category_id, $request->amount, $selected, $request->price, $preview, date('Y-m-j H:i:s', time())]
            );

        $pv->qb->table($pv->table)->where('products_id', $id)->delete();

        for($i = 0; $i < count($request->parameter); ++$i) {
            $pv->parameters_id = $request->parameter[$i];
            $pv->products_id = $id;
            $pv->value = $request->value[$i];
            var_dump($request->parameter[$i]);
            var_dump($request->value[$i]);
            $pv->save();
        }

        return new RedirectResponse('/product/show/'.$id, 200);
    }

    /**
     * Delete product
     *
     * @param $id
     * @param Products $products
     * @return mixed
     */
    public function destroy($id, Products $products)
    {
        $product = $products->qb->table($products->table)->find($id);
        $products->delete($id);

        return $product->title;
    }

}