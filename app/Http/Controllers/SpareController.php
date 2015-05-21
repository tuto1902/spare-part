<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\BrandInterface;
use App\Contracts\Repositories\CategoryInterface;
use App\Contracts\Repositories\FuelInterface;
use App\Contracts\Repositories\SpareInterface;
use App\Contracts\Repositories\TransmissionInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpareRequest;
use App\Spare;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

class SpareController extends Controller{

    public function __construct(CategoryInterface $categories, BrandInterface $brands, TransmissionInterface $transmissions, FuelInterface $fuels, SpareInterface $spares){
        $this->middleware('auth');
        $this->spares = $spares;
        $this->categories = $categories;
        $this->brands = $brands;
        $this->transmissions = $transmissions;
        $this->fuels = $fuels;
    }

    public function getIndex(){
        $spares = $this->spares->all();
        return view('spares.index', compact('spares'));
    }

    public function getAdd(){
        $categories = $this->categories->all();
        $brands = $this->brands->all();
        $transmissions = $this->transmissions->all();
        $fuels = $this->fuels->all();
        return view('spares.add', compact('categories', 'brands', 'transmissions', 'fuels'));
    }

    public function postAdd(StoreSpareRequest $request){
        $input = Input::all();
        $this->spares->add($input);
        return redirect()->to('spares')->with('message', Lang::get('spares.success'));
    }

    public function postDelete(Spare $spare){
        if(!$spare->delete()){
            return redirect()->to('spares')->with('error', Lang::get('spares.failure'));
        }

        return redirect()->to('spares')->with('message', Lang::get('spares.deleted'));
    }

    public function getEdit(Spare $spare){
        $categories = $this->categories->all();
        $brands = $this->brands->all();
        $transmissions = $this->transmissions->all();
        $fuels = $this->fuels->all();
        return view('spares.edit', compact('spare', 'categories', 'brands', 'transmissions', 'fuels'));
    }

    public function postEdit(StoreSpareRequest $request, Spare $spare){
        $input = Input::all();
        $spare->fill($input);
        if(!$spare->save()){
            return redirect()->to('spares')->with('error', Lang::get('spares.failure'));
        }

        return redirect()->to('spares')->with('message', Lang::get('spares.updated'));
    }

} 