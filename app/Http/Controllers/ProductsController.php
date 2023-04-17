<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function index() {
        // how to pass data to view
        // $title = 'data';

        // return view('products.index', compact('title'));

        return 'product home';
    }

    public function about() {
        return 'this is about PAge';
    }
}
