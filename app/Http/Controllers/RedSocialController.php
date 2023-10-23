<?php

namespace App\Http\Controllers;

use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    //
    public function index(){
        $redes = RedSocial::get();
        return view('pages/redes/index', compact('redes'));
    }

    public function edit(){

    }

    public function update(){

    }

}
