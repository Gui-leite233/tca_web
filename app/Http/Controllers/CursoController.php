<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curso = Curso::all();
        //$permissions = session('user_permissions');
        //, compact('permissions') - colocar essa linha de código depois de 'curso.index'
        return view('curso.index', compact('curso')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::all();
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Curso();
        $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
        $obj->descricao = mb_strtoupper($request->descricao, 'UTF-8');
        $obj->duracao = mb_strtoupper($request->duracao, 'UTF-8');
        $obj->save();

        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('curso.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id 
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('curso.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response  // You can document that it can return subclasses of Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        if (!$curso) {
            return redirect()->route('curso.index')->with('error', 'Curso não encontrado.');
        }

        $curso->nome = mb_strtoupper($request->nome, 'UTF-8');
        $curso->descricao = mb_strtoupper($request->descricao, 'UTF-8');
        $curso->duracao = mb_strtoupper($request->duracao, 'UTF-8');
        $curso->save();

        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('curso.destroy');
    }
}
