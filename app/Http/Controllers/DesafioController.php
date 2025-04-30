<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesafioController extends Controller
{
    public function index(){
        return view('user.navs.challenge');
    }

    public function indexRece(){
        return view('user.navs.receta');
    }

    public function indexReceUp(){
        return view('user.navs.receta2');
    }
}
