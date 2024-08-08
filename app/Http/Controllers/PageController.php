<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function satu(){
        // return "Data pertama";
        $arrBuah = ["Pisang", "Rambutan", "Duku", "Jambu"];
        return view('pasarBuah')->with('pasarBuah', $arrBuah);
    }
}
