<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Mail\ClientMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Bus;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
        //dd($request->all());
        try {

            $request->validate([
                'nombre_cliente' => 'required',
                'correo_cliente' => 'required',
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
                    'estado_cliente' => $request->estado_cliente
                ]);

            } else {

                Cliente::create([
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

    public function eliminarCliente($id){
        try {
            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cliente no encontrado'
                ], 404);
            }

            $cliente->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cliente eliminado correctamente'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el cliente'
            ], 500);
        }
    }


    // controlador para el fornulario del welcome
    // public function guardarClienteForm(Request $request){
    //     try {

    //         $request->validate([
    //             'nombre_cliente'  => 'required|string|max:100',
    //             'correo_cliente'  => 'required|email|max:100',
    //             'empresa_cliente' => 'required|string|max:150',
    //             'mensaje_cliente' => 'string|max:2000',
    //         ]);

    //         // guardar lo necesario
    //        Cliente::create([
    //         'nombre_cliente'  => mb_strtoupper($request->nombre_cliente, 'UTF-8'),
    //         'correo_cliente'  => strtolower($request->correo_cliente),
    //         'empresa_cliente' => mb_strtoupper($request->empresa_cliente, 'UTF-8'),
    //         'estado_cliente'  => false
    //     ]);

    //         // envia el correo
    //        Mail::to('contacto@berakhah.pe')
    //         ->send(new ClientMail([
    //             'nombre_cliente'  => mb_strtoupper($request->nombre_cliente, 'UTF-8'),

    //             'correo_cliente'  => strtolower($request->correo_cliente),
    //             'empresa_cliente' => mb_strtoupper($request->empresa_cliente, 'UTF-8'),
    //             'mensaje_cliente' => mb_strtoupper($request->mensaje_cliente, 'UTF-8'),
    //         ]));

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Mensaje enviado correctamente.'
    //         ]);

    //     } catch (\Exception $e) {

    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ], 500);

    //     }
    // }

    public function guardarClienteForm(Request $request){
        try {
            $datos = $request->validate([
                'nombre_cliente' => [
                    'required',
                    'string',
                    'max:100',
                    'not_regex:/<\s*\/?\s*[a-z][^>]*>/i',
                ],

                'correo_cliente' => [
                    'required',
                    'string',
                    'email:rfc',
                    'max:100',
                ],

                'empresa_cliente' => [
                    'required',
                    'string',
                    'max:150',
                    'not_regex:/<\s*\/?\s*[a-z][^>]*>/i',
                ],

                'mensaje_cliente' => [
                    'required',
                    'string',
                    'max:2000',
                    'not_regex:/<\s*\/?\s*[a-z][^>]*>/i',
                ],
            ], [
                'nombre_cliente.not_regex' =>
                    'El nombre no debe contener etiquetas HTML.',

                'empresa_cliente.not_regex' =>
                    'La empresa no debe contener etiquetas HTML.',

                'mensaje_cliente.not_regex' =>
                    'El mensaje no debe contener etiquetas HTML.',
            ]);

            $nombre = mb_strtoupper(trim($datos['nombre_cliente']), 'UTF-8');
            $correo = strtolower(trim($datos['correo_cliente']));
            $empresa = mb_strtoupper(trim($datos['empresa_cliente']), 'UTF-8');
            $mensaje = mb_strtoupper(trim($datos['mensaje_cliente']), 'UTF-8');

            Cliente::create([
                'nombre_cliente'  => $nombre,
                'correo_cliente'  => $correo,
                'empresa_cliente' => $empresa,
                'estado_cliente'  => false,
            ]);

            Mail::to('contacto@berakhah.pe')->send(
                new ClientMail([
                    'nombre_cliente'  => $nombre,
                    'correo_cliente'  => $correo,
                    'empresa_cliente' => $empresa,
                    'mensaje_cliente' => $mensaje,
                ])
            );

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente.',
            ]);

        } catch (ValidationException $e) {
            // Laravel gestiona la respuesta de validación automáticamente.
            throw $e;

        } catch (Throwable $e) {
            Log::error('Error al procesar el formulario de contacto.', [
                'exception' => $e,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'No fue posible enviar el mensaje. Inténtalo más tarde.',
            ], 500);
        }
    }

    public function exportarExcel(){
        $clientes = Cliente::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Encabezados
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Nombre Cliente');
        $sheet->setCellValue('C1', 'Correo Cliente');
        $sheet->setCellValue('D1', 'Empresa Cliente');
        $sheet->setCellValue('E1', 'Estado');

        $row = 2;

        foreach ($clientes as $cliente) {
            $sheet->setCellValue('A' . $row, $cliente->id_cliente);
            $sheet->setCellValue('B' . $row, $cliente->nombre_cliente);
            $sheet->setCellValue('C' . $row, $cliente->correo_cliente);
            $sheet->setCellValue('D' . $row, $cliente->empresa_cliente);
            $sheet->setCellValue(
                'E' . $row,
                $cliente->estado_cliente ? 'Activo' : 'Inactivo'
            );

            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, 'clientes.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }







}
