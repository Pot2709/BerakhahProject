<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PruebaController extends Controller
{


    public function enviarCorreo()
    {
        Mail::raw('Hola, este es un correo de prueba.', function ($message) {
            $message->to('amancayjesus136@gmail.com')
                    ->subject('Correo de prueba');
        });

        return 'Correo enviado';
    }



}
