<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{    


    protected $primaryKey = 'id';

    protected $fillable = [
        'product_code',
        'product_name',
        'product_price',
        'created_at',
        'updated_at',
        'product_location_num'];

    protected $guarded = ['id',];
}
