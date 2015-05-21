<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contracts\Repositories\CategoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller{
    public function __construct(CategoryInterface $categories){
        $this->middleware('auth');
        $this->categories = $categories;

        // This will set the active class for the side menu item
        Session::put('currentPage', 'categories');
    }

    public function getIndex(){
        $categories = $this->categories->all();
        return view('categories.index', compact('categories'));
    }

    public function getAdd(){
        return view('categories.add');
    }

    public function postAdd(StoreCategoryRequest $request){
        $input = Input::all();
        $this->categories->add($input);
        return redirect()->to('categories')->with('message', Lang::get('categories.success'));
    }

    public function postDelete(Category $category){
        if(!$category->delete()){
            return redirect()->to('categories')->with('error', Lang::get('categories.failure'));
        }

        return redirect()->to('categories')->with('message', Lang::get('categories.deleted'));
    }

    public function getEdit(Category $category){
        return view('categories.edit', compact('category'));
    }

    public function postEdit(StoreCategoryRequest $request, Category $category){
        $input = Input::all();
        $category->fill($input);
        if(!$category->save()){
            return redirect()->to('categories')->with('error', Lang::get('categories.failure'));
        }

        return redirect()->to('categories')->with('message', Lang::get('categories.updated'));
    }
} 