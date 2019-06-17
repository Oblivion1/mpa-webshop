<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    public function overview()
    {
        $user = Auth::user();

        $orders = $user->orders;

        return view('order.overview', compact('order'));
    }


    public function user(){

    	return $this->belongsTo('App\User');
    }


}
  