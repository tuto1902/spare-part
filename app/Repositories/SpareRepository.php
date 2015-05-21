<?php namespace App\Repositories;


use App\Contracts\Repositories\SpareInterface;

class SpareRepository extends Repository implements SpareInterface{
    public function all(){
        return $this->model->with(['category', 'brand', 'transmission', 'fuel'])->get();
    }
}