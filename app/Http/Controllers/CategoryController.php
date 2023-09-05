<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function AllCat()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function AddCat(Request $req)
    {
        $validated = $req->validate(
            [
                'category_name' => 'required|unique:categories|max:255',

            ],
            ['category_name.required' => 'Please input category name',]
        );
        // insert data using Eloquent QRM....    

        // Category::insert([
        //     'category_name' => $req->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);

        // Another way to insert data using Eloquent QRM.... This is a most professional way.In this way automatically add the value of created_at

        $category = new Category;
        $category->category_name = $req->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success', "Category Inserted Successfully");
    }
}
