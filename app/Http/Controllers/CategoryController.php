<?php


namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Item;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('items')->get()->sortByDesc(function($categories)
        {
            return $categories->items->count();
        });

        return view('category_items', [
            'categories' => $categories,
        ]);
    }

    public function treeView()
    {
        $categories = Category::with('parents','childrenRecursive','children.items')->doesnthave('parents')->get();
        return view('category_tree_items', [
            'categories' => $categories,
        ]);
        //dd($categories[0]);
    }
}
