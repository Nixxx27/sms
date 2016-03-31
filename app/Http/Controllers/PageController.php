<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\item;
use App\borrow;
use App\reserve_item;
use App\lost_item;

class PageController extends Controller
{
    public function home(){
        $item_count = item::count();
        $borrow_count = borrow::count();
        $reserve_count = reserve_item::count();
        $lost_count = lost_item::count();
        return view('home',compact( 'item_count','borrow_count','reserve_count','lost_count' ) );
    }
}
