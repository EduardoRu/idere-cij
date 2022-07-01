<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clave_alumno;

class testController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $clave = Clave_alumno::where('clave', $request->clave)->first();

        return view('test.idereOne', compact('clave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idclave_alumno)
    {
        $clave = Clave_alumno::find($idclave_alumno);

        if($clave['nombre_alumno'] == NULL && $clave['sexo'] == NULL && $clave['estado_clave'] != 'inhabil'){
            $clave->nombre_alumno = $request->input('nombre');
            $clave->sexo = $request->input('sexo');
            $clave->save();

            $claveEdit = Clave_alumno::where('idclave_alumno', $clave['idclave_alumno'])->first();
            return redirect()->route('encuesta', $claveEdit['clave']);
        }elseif($clave['nombre_alumno'] != NULL && $clave['sexo'] != NULL && $clave['estado_clave'] != 'inhabil'){
            $claveEdit = Clave_alumno::where('idclave_alumno', $clave['idclave_alumno'])->first();
            return redirect()->route('encuesta', $claveEdit['clave']);
        }else{
            return redirect()->route('clave');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
