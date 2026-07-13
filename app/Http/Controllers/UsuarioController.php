<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
     public function index(){
        return view('Administrador.usuario.index');
    }

    public function listar(){
        $usuarios = Usuario::orderBy('created_at', 'asc')->get();
        return response()->json($usuarios);
    }

    public function guardarUsuario(Request $request){
        try {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'estado' => 'required'
            ]);

            if ($request->id) {

                $usuario = Usuario::find($request->id);

                if (!$usuario) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Usuario no encontrado.'
                    ], 404);
                }

                $usuario->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'estado' => $request->estado
                ]);

            } else {

                Usuario::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password), // hash
                    'estado' => $request->estado
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Usuario guardado correctamente.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

    public function obtenerUsuario($id){
        $usuario = Usuario::find($id);
        if(!$usuario){
            return response()->json(['Error' => 'Usuario no encontrado'], 404);
        }
        return response()->json([
            'id' => $usuario->id,
            'name' => $usuario->name,
            'email' => $usuario->email,
            'estado' => $usuario->estado
        ]);
    }


}
