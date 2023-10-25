<?php

namespace App\Http\Controllers;

use App\Models\RedSocial;
use Illuminate\Http\Request;

class RedSocialController extends Controller
{
    //
    public function index(){
        $redes = RedSocial::first();
        return view('pages/redes/index', compact('redes'));
    }

    public function update(Request $request){


        $request->validate([
            'link_twitter' => 'required',
            'link_facebook' => 'required',
            'link_instagram' => 'required',
            'link_whatsapp' => 'required',
        ]);

        $redes = RedSocial::first();

        $redes->link_twitter = $request->input('link_twitter');
        $redes->link_facebook = $request->input('link_facebook');
        $redes->link_instagram = $request->input('link_instagram');
        $redes->link_whatsapp = $request->input('link_whatsapp');
        $redes->save();

        return redirect()->back();

    }

}
