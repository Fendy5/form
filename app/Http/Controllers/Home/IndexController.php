<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class IndexController extends Controller
{
    //首页
    public function index()
    {
        return view('home.index');
    }
}
