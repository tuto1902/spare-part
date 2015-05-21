<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Spare extends Model {

	public $fillable = ['name', 'price', 'category_id', 'brand_id', 'model', 'set', 'year', 'transmission_id', 'fuel_id'];

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Brand', 'brand_id');
    }

    public function transmission(){
        return $this->belongsTo('App\Transmission', 'transmission_id');
    }

    public function fuel(){
        return $this->belongsTo('App\Fuel', 'fuel_id');
    }

}
