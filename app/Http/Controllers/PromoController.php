<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoController extends Controller
{
    public function promosPage(){
        $promos = Promo::with('user')->get();
        return view('Office.Screens.Users.Promos', get_defined_vars());
    }
}
