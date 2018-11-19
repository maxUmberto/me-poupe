<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryFormValidation;
use App\Http\Requests\MoneyFormValidation;
use Illuminate\Http\Request;
use App\Models\Category;
use App\User;

class CategoryController extends Controller
{
    public function index(){

      $categories = auth()->user()->categories()->orderByRaw('created_at DESC')->get();

      //dd($categories);

      return view('site.category.categories', compact('categories'));

    }

    public function categoryDetail($id){
      $category = auth()->user()->categories()->where('id', $id)->first();
      $balance = auth()->user()->balance;

      //dd($category);

      return view('site.category.category-detail', compact('category', 'id', 'balance'));
    }

    public function addCategory(){

      return view('site.category.new-category');
    }

    public function categoryStore(Category $categories, CategoryFormValidation $request){
      //$user = auth()->user();

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

      return view('site.category.edit-category', compact('category', 'id'));
    }

    public function editStore(Category $categories, CategoryFormValidation $request, $id){
      $formData = $request;

      //dd($formData);

      $response = $categories->editCategory($formData, $id);

      if($response['success'])
        return redirect()
          ->to("categories/detail/$id")
          ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    public function categoryDeposit($id){
      $category = auth()->user()->categories()->where('id', $id)->first();
      $balance = auth()->user()->balance;
      return view('site.category.category-deposit', compact('category', 'balance', 'id'));
    }

    public function categoryDepositStore(Category $categories, MoneyFormValidation $request, $id){
      //$category = auth()->user()->categories()->where('id', $id)->first();

      $response = $categories->deposit($request->value, $id);

      if($response['success']){
        return redirect()
          ->route('category-detail', ['id' => $id])
          ->with('success', $response['message']);
      }

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    public function categoryWithdraw($id){
      $category = auth()->user()->categories()->where('id', $id)->first();

      return view('site.category.category-withdraw', compact('category', 'id'));
    }

    public function categoryWithdrawStore(Category $categories, $id, MoneyFormValidation $request){
      $response = $categories->withdraw($request->value, $id);

      if($response['success']){
        return redirect()
          ->route('category-detail', ['id' => $id])
          ->with('success', $response['message']);
      }

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }

    public function categoryDelete(Request $request, $id){
      echo 'ainda não implementada';
    }
}
