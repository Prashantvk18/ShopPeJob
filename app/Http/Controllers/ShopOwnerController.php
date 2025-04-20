<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopOwnerController extends Controller
{
    public function home(){
        return view('shop_owner.home');
    }
}
