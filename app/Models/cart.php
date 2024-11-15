<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\Models\product;


class cart extends Model
{
    use HasFactory;

        public function product(){
        return $this->hasOne('App\Models\product','id','product_id');
       }
        public function user(){
            return $this->hasOne('App\Models\User','id','user_id');
        }



}
