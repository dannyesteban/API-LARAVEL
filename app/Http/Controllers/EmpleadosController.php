<?php

namespace App\Http\Controllers;

use App\Models\empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Table = empleados::all();

        return $Table;
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
        $sError = null;
        try {

            $store = new empleados();
            $store->documento = $request->documento;
            $store->nombres = $request->nombres;
            $store->apellidos = $request->apellidos;
            $store->correo = $request->correo;
            $store->telefono = $request->telefono;
            $store->direccion = $request->direccion;
            $store->fecha_nacimiento = $request->fecha_nacimiento;
            $store->save();
        } catch (\Exception $e) {

            \Log::info('Error creating user: ' . $e);
            $message = $e->getMessage();
            return response()->json(['status' => 'Error', 'message' => $message]);
        }
        return response()->json(['status' => 'ok', 'message' => 'Se elimino el registro correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = empleados::findOrFail($id);

        return $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit(empleados $empleados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleados $empleados)
    {
        $update = empleados::findOrFail($request->id);
        $update->documento = $request->documento;
        $update->nombres = $request->nombres;
        $update->apellidos = $request->apellidos;
        $update->correo = $request->correo;
        $update->telefono = $request->telefono;
        $update->direccion = $request->direccion;
        $update->fecha_nacimiento = $request->fecha_nacimiento;
        $update->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy =  empleados::findOrFail($id)->delete();
    }
}
