<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view()
    {
        $categories = Category::all();
        return view('dashboard.pages.categories',compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required'
        ]);
        Category::create([
            "name" => $request->name,
        ]);
        // $msg = "Adding New Category Done!";
        return redirect()->route('cat.view');
    }
    public function update(Request $request , $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        $msg = "Updating Category Done!";
        return redirect()->route('cat.view')->with($msg);
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $msg = "Deleting This Category Done!";
        return redirect()->route('cat.view')->with($msg);
    }

}
