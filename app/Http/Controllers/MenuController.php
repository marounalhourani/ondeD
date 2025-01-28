<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class MenuController extends Controller
{
    public function show($slug)
    {
        // Get the main category based on the slug (Drinks, Food, etc.)
        $category = Category::where('name', $slug)->firstOrFail();
        $subcategories = $category->subcategories;
        $mainCategories = Category::whereNull('parent_id')->pluck('name')->toArray();

        return view('menu.menu', compact('category', 'subcategories', 'mainCategories'));
    }

    public function index(){
       
        $Items = Item::with('category.parent')->get();
        return view('admin.Menu.admin',compact('Items'));
    }

    public function createCategory(){
        // Retrieve all main categories (without parent)
        $categories = Category::whereNull('parent_id')->get();
        return view('admin.menu.createCat', compact('categories'));
    }



// Handle the category creation form submission
public function storeCategory(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'parent_id' => 'nullable|exists:categories,id',  // Validates the parent ID if provided
    ]);

    // Create the new category
    Category::create([
        'name' => $request->name,
        'parent_id' => $request->parent_id,
    ]);

    // Redirect to a success page or back to the menu list with a success message
    return redirect('/admin/menu')->with('success', 'Category created successfully!');
}

public function showAllCategories()
{
    // Retrieve all categories that do not have a parent (main categories)
    $mainCategories = Category::with(['subcategories', 'subcategories.items'])->whereNull('parent_id')->get();

    // Loop through each main category to get subcategories and their items
    foreach ($mainCategories as $category) {
        // Count total items in subcategories
        $category->total_items = $category->subcategories->flatMap(function ($subcategory) {
            return $subcategory->items;
        })->count();

        // Count items directly in the main category
        $category->direct_items_count = $category->items->count();
    }

    return view('admin.menu.category', compact('mainCategories'));
}

public function showCategory($id)
{
    // Find the category by ID
    $category = Category::with('subcategories.items')->findOrFail($id);

    // Count items in subcategories (for main categories)
    $totalItemsInSubcategories = $category->subcategories->sum(function ($sub) {
        return $sub->items->count();
    });

    // Count items directly in the category
    $directItemsCount = $category->items->count();

    return view('admin.menu.single-category', compact('category', 'totalItemsInSubcategories', 'directItemsCount'));
}

public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    if ($category->parent_id === null) {
        // It's a main category, delete all subcategories and their items
        $subcategoryIds = Category::where('parent_id', $category->id)->pluck('id');
        
        // Delete items in subcategories
        Item::whereIn('category_id', $subcategoryIds)->delete();
        
        // Delete subcategories
        Category::where('parent_id', $category->id)->delete();
    }

    // Delete items directly in the category
    Item::where('category_id', $category->id)->delete();
    
    // Delete the category itself
    $category->delete();

    return redirect('/admin/menu/allcategories')->with('success', 'Category deleted successfully.');
}

public function updateCategory(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Find the category by ID
    $category = Category::findOrFail($id);

    // Update category name
    $category->name = $request->input('name');
    $category->save();

    // Redirect back with success message
    return redirect('/admin/menu/allcategories')->with('success', 'Category updated successfully.');
}

public function createItem(){

    $subcategories = Category::whereNotNull('parent_id')->get();
    return view('admin.menu.createItem', compact('subcategories'));}


public function storeItem(Request $request)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'is_special' => 'nullable|boolean',
    ]);

    // Create and store the item
    Item::create([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'category_id' => $request->input('category_id'),
        'is_special' => $request->has('is_special') ? 1 : 0,
    ]);

    // Redirect with success message
    return redirect('/admin/menu')->with('success', 'Item added successfully.');
}

public function showItem($id)
{
    
    // Get all subcategories
    $subcategories = Category::whereNotNull('parent_id')->get(); 


    $item = Item::with('category.parent')->findOrFail($id);
    
    return view('admin.menu.show-item', compact('item','subcategories'));
}

public function deleteItem($id)
{
    $item = Item::findOrFail($id);
    $item->delete();

    return redirect('/admin/menu')->with('success', 'Item deleted successfully.');
}



public function updateItem(Request $request, $id)
{
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'subcategory_id' => 'required|exists:categories,id',
        'is_special' => 'nullable|boolean',
    ]);

    // Find the item and update its properties
    $item = Item::findOrFail($id);
    $item->name = $validated['name'];
    $item->description = $validated['description'];
    $item->price = $validated['price'];
    $item->category_id = $validated['subcategory_id'];
    $item->is_special = $validated['is_special'] ?? false;
    $item->save();

    // Redirect back to the menu items list with a success message
    return redirect('/admin/menu')->with('success', 'Item updated successfully.');
}

}


