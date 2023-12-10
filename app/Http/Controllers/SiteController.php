<?php

namespace App\Http\Controllers;
//importar a model da classe:
//use App\Models\Info;
use Illuminate\Http\Request;
use App\Models\Curso;

class SiteController extends Controller {
    
    //exemplo do que fazer nessa controller:
    public function getCurso() {

        $created_at = Curso::orderBy('created_at')->get();
        return view('site.curso', compact('created_at'));
    }

}
