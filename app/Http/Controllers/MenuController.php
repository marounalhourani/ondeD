<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MenuController extends Controller
{
    public function show($slug)
    {
        // Get the main category based on the slug (Drinks, Food, etc.)
        $category = Category::where('name', $slug)->firstOrFail();
        //get the row of the category
        //access the category name, $category->name 



        // Get the subcategories and items for this category
        $subcategories = $category->subcategories;
        //subcategories, get the row of the main category, array of rows


        // $subcategoryItems = []; //will be like this ["Pizza" =>[array of many rows], same =>]
        // //dd($subcategory->items->first()->name); to return the name

        // foreach ($subcategories as $subcategory) {
         
        //     $subcategoryItems[$subcategory->name] = $subcategory->items;
        // }
        // dd($subcategoryItems);
        // foreach($subcategoryItems as $itemcat){

        // }
        // // dd($category->name,$subcategoryItems,$subcategoryItems->first()->name);
        // $items = $category->items;

        return view('menu.menu', compact('category', 'subcategories'));
    }
}
