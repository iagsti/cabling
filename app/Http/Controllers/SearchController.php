<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Return Search index view
 */
class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
}
