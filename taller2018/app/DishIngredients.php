<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishIngredients extends Model
{
    protected $table      = 'dish_ingredients';
    protected $primaryKey = 'id_dish_ingredients';
    public $timestamps    = false;
    protected $fillable = [

        'quantity',
        'date_created',
        'id_ingredients',
        'id_dish',

    ];
    protected $guarded = [
    ];
}
