<?php

namespace Mystore\Controller;

use Mystore\Model\Category;
use Shulha\Framework\Controller\Controller;
use Shulha\Framework\Request\Request;
use Shulha\Framework\Response\RedirectResponse;
use Shulha\Framework\Session\Session;
use Shulha\Framework\Validation\Validator;

/**
 * Class CategoriesController
 * @package Mystore\Controller
 */
class CategoriesController extends Controller
{
    /**
     * Show all root categories
     *
     * @param Category $categories
     * @return mixed
     */
    public function index(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->whereNull('parent_id')->get();

        return view('categories', compact('categories'));
    }

    /**
     * Create a category
     *
     * @param Category $categories
     * @return mixed
     */
    public function create(Category $categories)
    {
        $categories = $categories->qb->table($categories->table)->select('id', 'name')->get();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a category
     *
     * @param Request $request
     * @param Category $categories
     * @param Session $session
     * @return RedirectResponse
     */
    public function store(Request $request, Category $categories, Session $session)
    {
        $validator = new Validator($request, [
            "name" => ["required"],
        ]);
        if (!$validator->validate())
        {
            $session->flashErrorList($validator->getErrorList());
            return $this->redirect('create_category');
        }

        $parent_id = $request->parent_id ? $request->parent_id : null;

        $preview = null;
        $folder = "/images/";
        if ($request->hasFile('preview')) {
            $preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        $categories->insert(['name', 'parent_id', 'url', 'preview'],
            [$request->name, $parent_id, url_slug($request->name), $preview]);

        return $this->redirect('all_categories');
    }

    /**
     * Delete a category
     *
     * @param $id
     * @param Category $categories
     * @return mixed
     */
    public function destroy($id, Category $categories)
    {
        $category=$categories->qb->table($categories->table)->find($id);
        $categories->delete($id);

        return $category->name;
    }

    /**
     * Edit a category
     *
     * @param $id
     * @param Category $categories
     * @return mixed
     */
    public function edit($id, Category $categories)
    {
        $category=$categories->qb->table($categories->table)->find($id);
        $parent = $categories->qb->table($categories->table)->where('id', '=', $category->parent_id)->first();
        if($category->parent_id === null)
            $categories = $categories->qb->table($categories->table)->select('id', 'name', 'preview')->get();
        else
            $categories = $categories->qb->table($categories->table)->whereNot('id', '=', $category->parent_id)
                ->whereNot('id', '=', $category->id)->select('id', 'name', 'preview')->get();

        return view('admin.categories.edit', compact('category', 'parent', 'categories'));
    }

    /**
     * Delete image from category
     *
     * @param Request $request
     * @param Category $category
     * @return string
     */
    public function del_image_category(Request $request, Category $category)
    {
        $src = $request->src;
        $item_id = $request->item_id;
        $item = $category->find($item_id);
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
     * Update a category
     *
     * @param Request $request
     * @param Category $categories
     * @param Session $session
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, Category $categories, Session $session, $id)
    {
//        $validator = new Validator($request, [
//            "name" => ["required"],
//        ]);
////dd($request->name);
////dd($validator->getErrorList());
//        if (!$validator->validate())
//        {
//            $session->flashErrorList($validator->getErrorList());
//            return new RedirectResponse('/adminzone/categories/edit/' . $id);
//        }

        $old_category = $categories->qb->table($categories->table)->find($id);
        $name = $request->name ? $request->name : $old_category->name;
        $parent_id = $request->parent_id ? $request->parent_id : $old_category->parent_id;
        $url = $request->name ? url_slug($request->name) : $old_category->url;
        $preview = $old_category->preview;
        $folder = "/images/";
        if ($request->hasFile('preview')) {
            $preview = $request->uploadFiles('preview', $folder) ? implode(';', $request->uploaded_array) : '';
        }

        $categories->update($id, ['name', 'parent_id', 'url', 'preview'],
            [$name, $parent_id, $url, $preview]);

        return $this->redirect('all_categories');
    }

    /**
     * Show subcategories or products of category
     *
     * @param $slug
     * @param Category $categories
     * @return mixed|RedirectResponse
     */
    public function menu($slug, Category $categories)
    {
        $id = $categories->qb->table($categories->table)->select('id')->where('url', '=', $slug)->first()->id;
        $categories = $categories->qb->table($categories->table)->where('parent_id', '=', $id)->get();

        if ($categories)
            return view('categories', compact('categories', 'slug'));
        else
            return new RedirectResponse('/category/'.$slug.'/', 200);
    }

    /**
     * Show all categories
     *
     * @param Category $categories
     * @return mixed
     */
    public function allmenu(Category $categories)
    {

//        $categories = $categories->qb->query(" WITH RECURSIVE r AS (
//            SELECT id, parent_id, name
//            FROM categories
//            WHERE parent_id =" . $id . "
//
//            UNION
//
//            SELECT categories.id, categories.parent_id, categories.name
//            FROM categories
//            JOIN r
//            ON categories.parent_id = r.id
//        ) SELECT * FROM r;")->get();

        $categories = $categories->qb->table($categories->table)->get();
//debug($categories);
        $childs = array();

        foreach ($categories as $category)
            $childs[$category->parent_id][] = $category;

        foreach ($categories as $category)
            if (isset($childs[$category->id]))
                $category->childs = $childs[$category->id];
//debug($childs);
        $tree = $childs[null];

//        debug($tree);
//        dd($this->tree_print($tree));
//        ob_end_flush();
//        debug($tree->childs[0][0]);
        return view('admin.categories.categories', compact('categories'));

    }

    public static function tree_print(&$tree)
    {
        ob_start();

        echo (view('admin.categories.tree_print', compact('tree')));

        return ob_get_contents();
    }

}
