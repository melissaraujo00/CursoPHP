<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtener los datos de la tabla contactos de la bd
        $contactos= Contacto::all() ;//metodo para recuperar los datos bd

        //codigo para utilizar la confirmacion al eliminar
        $title = 'Eliminar Contacto!';
        $text = "Esta seguro que desea eliminar el contacto?";
        confirmDelete($title, $text);

        return view('contacto.index', compact('contactos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar con laravel
        $request->validate([
            'nombre' => 'required|max:60',
            'telefono' => 'digits:8',
            'correo'=> 'required|max:60|email|unique:contactos,correo'
        ]);

        //Crear un objeto de la clase contacto
        $contactos= new Contacto;
        //Asignar a las propiedades la clase los datos del formulario
        $contactos->Nombre = $request ->nombre;
        $contactos->Telefono = $request ->telefono;
        $contactos->Correo = $request ->correo;
        $contactos->save();
        //session()->flash('exito', 'El contacto fue registrado');
        //Alert::success('Contacto', 'Datos Almacenados Correctamente');
        toast('Datos Almacenados Correctamente!','success');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre' => 'required|max:60',
            'telefono' => 'digits:8',
            'correo'=> 'required|max:60|email|unique:contactos,correo,'.$id,
        ]);

        //Crear un objeto conlos datos de la clase contacto
        $contactos= Contacto::find($id);
        //Asignar a las propiedades la clase los datos del formulario
        $contactos->Nombre = $request ->nombre;
        $contactos->Telefono = $request ->telefono;
        $contactos->Correo = $request ->correo;
        $contactos->update();
        session()->flash('exito', 'El contacto fue actualizado');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $contactos= Contacto::find($id);
        //Asignar a las propiedades la clase los datos del formulario
        $contactos->delete();
        session()->flash('exito', 'El contacto fue Eliminado');
        return redirect()->back();
    }
}
