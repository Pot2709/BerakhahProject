<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Mail\ClientMail;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    public function index(){
        return view('Administrador.cliente.index');
    }

    public function listar(){
        $clientes = Cliente::orderBy('created_at', 'asc')->get();
        return response()->json($clientes);
    }

     public function guardarCliente(Request $request){
        try {

            $request->validate([
                'nombre_cliente' => 'required',
                'correo_cliente' => 'required|email',
                'empresa_cliente' => 'required',
                'estado_cliente' => 'required',
            ]);

            if ($request->id_cliente) {

                $cliente = Cliente::find($request->id_cliente);

                if (!$cliente) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Cliente no encontrado.'
                    ], 404);
                }

                $cliente->update([
                    'nombre_cliente' => $request->nombre_cliente,
                    'correo_cliente' => $request->correo_cliente,
                    'empresa_cliente' => $request->empresa_cliente,
                    'estado' => $request->estado
                ]);

            } else {

                Usuario::create([
                    'nombre_cliente' => $request->nombre_cliente,
                    'correo_cliente' => $request->correo_cliente,
                    'empresa_cliente' => $request->empresa_cliente,
                    'estado_cliente' => $request->estado_cliente
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cliente guardado correctamente.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al guardar: ' . $e->getMessage()
            ], 500);
        }
    }

     public function obtenerCliente($id){
        $cliente = Cliente::find($id);
        if(!$cliente){
            return response()->json(['Error' => 'Cliente no encontrado'], 404);
        }
        return response()->json([
            'id_cliente' => $cliente->id_cliente,
            'nombre_cliente' => $cliente->nombre_cliente,
            'correo_cliente' => $cliente->correo_cliente,
            'empresa_cliente' => $cliente->empresa_cliente,
            'estado_cliente' => $cliente->estado_cliente
        ]);
    }



    // controlador para el fornulario del welcome
    public function guardarClienteForm(Request $request){
        try {

            $request->validate([
                'nombre_cliente'  => 'required|string|max:100',
                'correo_cliente'  => 'required|email|max:100',
                'empresa_cliente' => 'required|string|max:150',
                'mensaje_cliente' => 'string|max:2000',
            ]);

            // guardar lo necesario
            Cliente::create([
                'nombre_cliente'  => $request->nombre_cliente,
                'correo_cliente'  => $request->correo_cliente,
                'empresa_cliente' => $request->empresa_cliente,
                'estado_cliente'  => false
            ]);

            // envia el correo
            Mail::to('pruebas@berakhah.pe')
            ->send(new ClientMail([
                'nombre_cliente'  => $request->nombre_cliente,
                'correo_cliente'  => $request->correo_cliente,
                'empresa_cliente' => $request->empresa_cliente,
                'mensaje_cliente' => $request->mensaje_cliente,
            ]));

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente.'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);

        }
    }
}
