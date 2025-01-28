<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardGame;
use App\Models\BgCategory;


class BoardGameController extends Controller
{
    public function index(){


        $boardGames = BoardGame::with('category')->get(); // eager load the 'category' relationship

    // Pass the data to the view
        return view('admin.BoardGames.index', compact('boardGames'));
    }

    public function showCategories(){


    $categories = BgCategory::withCount('boardGames')->get();


    return view('admin.BoardGames.categories',compact('categories'));
    }

    public function deleteCategory($id)
    {
        $category = BgCategory::findOrFail($id);
    
        // Delete related board games first
        $category->boardGames()->delete();
    
        // Then delete the category
        $category->delete();
    
        return redirect('/admin/boardgamemanager/categories')->with('success', 'Category deleted successfully.');
    }

    public function editBgView($id){

        $category = BgCategory::findOrFail($id);
        return view('admin.BoardGames.editBg', compact('category'));
    }
    
    public function updateCategory(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = BgCategory::findOrFail($id);
    $category->update([
        'name' => $request->name,
    ]);

    return redirect('/admin/boardgamemanager/categories')->with('success', 'Category updated successfully.');
}

public function createCat(){

    return view('admin.BoardGames.createCat');
}

public function storeCategory(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    BgCategory::create([
        'name' => $request->name,
    ]);

    return redirect('/admin/boardgamemanager/categories')->with('success', 'Category created successfully.');
}

public function createBoardGame(){
    $categories = BgCategory::all(); // Get all categories for dropdown
    return view('admin.BoardGames.createBg', compact('categories'));
}


public function storeBoardGame(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:bg_categories,id', // corrected field name
    ]);

    BoardGame::create([
        'name' => $request->name,
        'description' => $request->description,
        'bg_category_id' => $request->category_id, // corrected field name
    ]);

    return redirect('/admin/boardgamemanager')->with('success', 'Board game added successfully.');
}

public function editBoardGameView($id)
{
    $boardGame = BoardGame::findOrFail($id);
    $categories = BgCategory::all(); // To get all categories for selecting
    return view('admin.BoardGames.editBoardGame', compact('boardGame', 'categories'));
}

public function deleteBoardGame($id)
{
    $boardGame = BoardGame::findOrFail($id);
    $boardGame->delete();

    return redirect('/admin/boardgamemanager')->with('success', 'Board game deleted successfully.');
}

public function updateBoardGame(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:bg_categories,id',
    ]);

    // Find the board game by ID and update its details
    $boardGame = BoardGame::findOrFail($id);
    $boardGame->update([
        'name' => $request->name,
        'description' => $request->description,
        'bg_category_id' => $request->category_id,
    ]);

    // Redirect with a success message
    return redirect('/admin/boardgamemanager')->with('success', 'Board game updated successfully.');
}



}
