<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;


class DashboardController extends Controller
{

    public function index(){
    $totalClientes = Cliente::count();
    $clientesAtendidos = Cliente::where('estado_cliente', 1)->count();
    $clientesNoAtendidos = Cliente::where('estado_cliente', 0)->count();
    $usuarios = User::count();
    $ultimosClientes = Cliente::latest()->take(3)->get();

    return view('dashboard', compact(
        'totalClientes',
        'clientesAtendidos',
        'clientesNoAtendidos',
        'usuarios',
        'ultimosClientes'
    ));
    }

}
