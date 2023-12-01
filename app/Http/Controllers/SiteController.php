<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class SiteController extends Controller {
    
    public function getInfo() {

        $data = Info::orderBy('data')->get();
        return view('site.info', compact('data'));
    }

    public function getMamb() {

        $data = Info::orderBy('data')->get();
        return view('site.mamb', compact('data'));
    }

    public function getMec() {

        $data = Info::orderBy('data')->get();
        return view('site.mec', compact('data'));
    }

}
