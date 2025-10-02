<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;

class usuariosController extends Controller
{
    // Método para mostrar el formulario de creación de usuarios
    public function crear()
    {
        return view('usuarios.crear');
    }

    // Método para guardar un nuevo usuario en la base de datos
    public function guardar(Request $request)
    {
        // Validar los datos recibidos desde el formulario
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'telefono' => 'required|string|max:11',
            'email' => 'required|email|max:100|unique:usuarios,email',
        ], [
            // Mensajes de error personalizados
            'email.unique' => 'Este correo ya está registrado en el sistema.',
            'email.email' => 'Por favor ingrese un correo válido.',
        ]
    );

        // Crear el nuevo usuario con los datos validados
        $usuario = new Usuarios();
        $usuario->nombres = $validatedData['nombres'];
        $usuario->apellidos = $validatedData['apellidos'];
        $usuario->telefono = $validatedData['telefono'];
        $usuario->email = $validatedData['email'];
        $usuario->fechaRegistro = now();
        $usuario->fechaModificacion = now();
        $usuario->isDelete = 0; // Por defecto, el usuario no está eliminado
        $usuario->save();

        // Redirigir nuevamente al formulario con un mensaje de éxito
        return redirect()->route('usuarios.crear')->with('success', 'Usuario creado exitosamente.');
    }

    // Método para listar usuarios activos (isDelete = 0)
    public function leer()
    {
        // Solo traigo los usuarios que no están eliminados lógicamente
        $usuarios = Usuarios::where('isDelete', 0)
            ->orderBy('nombres', 'asc') // ordenados alfabéticamente
            ->get();

        // Paso la lista de usuarios a la vista
        return view('usuarios.leer', compact('usuarios'));
    }

    // Método para actualizar un usuario existente
    public function actualizar(Request $request, $id)
    {
        // Valido los datos básicos, no dejo modificar correo ni ID
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:50',
            'apellidos' => 'required|string|max:50',
            'telefono' => 'required|string|max:11',
        ]);

        // Busco el usuario por su id
        $usuario = Usuarios::find($id);

        if ($usuario) {
            // Si existe, actualizo sus datos
            $usuario->nombres = $validatedData['nombres'];
            $usuario->apellidos = $validatedData['apellidos'];
            $usuario->telefono = $validatedData['telefono'];
            $usuario->fechaModificacion = now();
            $usuario->save();

            // Redirijo con mensaje de éxito
            return redirect()->route('usuarios.leer')->with('success', 'Usuario actualizado exitosamente.');
        } else {
            // Si no existe, muestro mensaje de error
            return redirect()->route('usuarios.leer')->with('error', 'Usuario no encontrado.');
        }
    }

    // Método para eliminar un usuario (borrado lógico)
    public function eliminar($id)
    {
        // Busco el usuario y si no existe lanza 404
        $usuario = Usuarios::findOrFail($id);

        // En vez de borrarlo, marco el campo isDelete en 1
        $usuario->isDelete = 1;
        // También actualizo la fecha de modificación
        $usuario->fechaModificacion = now();
        $usuario->save();

        // Redirijo con mensaje de confirmación
        return redirect()->route('usuarios.leer')->with('success', 'Usuario eliminado correctamente.');
    }
}
