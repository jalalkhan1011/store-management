<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['store_name', 'tenant_id'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'category_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'tenant_id', 'id');
    }
}
