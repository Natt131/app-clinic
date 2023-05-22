<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogs() {
       // return view('medtest/administrator/admin');
        return view('medtest/blog1');
    }
}
