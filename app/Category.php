<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getCategory()
    {
    	return $this->hasMany(Product::class);
    }
}
  
