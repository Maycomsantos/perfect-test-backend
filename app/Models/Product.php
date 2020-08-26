<?php

namespace App\Models;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    //Utilizando dessa forma em uma BaseModel, temos a facilidade de fazer consultas sem travar ou demorar demais pra trazer as informações

    protected $fillable = ['name','description','money'];

}
