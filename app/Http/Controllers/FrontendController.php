<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function shopDetails($shop)
    {
        $shopeDetail = Store::where('store_name', 'like', '%' . $shop . '%')->first();
        $shopeCategories = Category::where('store_id', $shopeDetail->id)->get();

        return view('welcome', compact('shopeDetail', 'shopeCategories'));
    }
}
