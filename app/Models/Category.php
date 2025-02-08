<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name', 'store_id', 'tenant_id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    } 

    public function user()
    {
        return $this->belongsTo(User::class, 'tenant_id','id');
    }
}
