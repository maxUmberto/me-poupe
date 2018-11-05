<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormValidation;
use Illuminate\Http\Request;
use App\Models\Category;
use App\User;

class CategoryController extends Controller
{
    public function index(){

      $categories = auth()->user()->categories()->get();

      //dd($categories);

      return view('site.category.categories', compact('categories'));

    }

    public function addCategory(){

      return view('site.category.new-category');
    }

    public function categoryStore(Category $categories, CategoryFormValidation $request){
      $user = auth()->user();

      $formData = $request;

      //dd($user);

      $response = $categories->createCategory($formData);

      if($response['success'])
        return redirect()
          ->to('categories')
          ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    public function categoryEdit($id){
      $category = auth()->user()->categories()->where('id', $id)->first();

      //dd($category);

      return view('site.category.edit-category', compact('category'));
    }
}
