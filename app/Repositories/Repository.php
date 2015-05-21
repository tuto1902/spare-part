<?php namespace App\Repositories;


abstract class Repository {
    protected $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function all(){
        return $this->model->get();
    }

    public function add($input){
        $this->model->create($input);
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function delete($id){
        $record = $this->model->find($id);
        $record->delete($id);
    }
} 