@extends('layouts.admin_sidebar')

@section('content')

<input type="hidden" id="hdfOculto" value="/" />

<div class="cuerpo shadow rounded-4 p-3">
    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
        <li class="nav-item">
            <a class="nav-link active a-style" data-bs-toggle="tab" href="#tabsRol" role="tab">
                <i class="fa fa-cogs"></i>&nbsp; Clientes
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active fade show" id="tabsCliente" role="tabpanel">

            {{-- bOTONES --}}
            <div class="row align-items-center pt-3">
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#mdlCliente" onclick="NuevoCliente()">
                        Nuevo Cliente
                    </button>
                </div>

                <div class="col-md-7"></div>

                <div class="col-md-2 d-flex justify-content-end">
                    <button type="button" title="Reporte - Excel" class="btn btn-outline-success me-2" onclick="DescargarExcelCliente()">
                        <i class="fas fa-file-excel"></i>
                    </button>
                </div>
            </div>

            {{-- TABLA DE ROLES --}}
            <div class="row pt-3">
                <div id="divRol">
                    @include('Administrador.cliente.listar')
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODAL CLIENTE -->
<div class="modal fade" id="mdlCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlClienteLabel">Registro De Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmCliente" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="row">
                            <div class="col-md-4">
                                <label>*</label>
                                <input type="text" name="id_cliente" id="id_cliente" class="form-control" placeholder="Autogenerado" readonly />
                            </div>

                            <div class="col-md-4">
                                <label>Nombre</label>
                                <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control"/>
                            </div>

                            <div class="col-md-4">
                                <label>Correo</label>
                                <input type="email" name="correo_cliente" id="correo_cliente" class="form-control"/>
                            </div>
                        </div>

                        <div class="row">

                             <div class="col-md-6 mt-2">
                                <label>Empresa</label>
                                <input type="text" name="empresa_cliente" id="empresa_cliente" class="form-control"/>
                            </div>

                            <div class="col-md-6 mt-2">
                                <label>Estado</label>&nbsp;<label style="color:red">*</label>
                                <select name="estado_cliente" class="form-control" id="cboEstadoCliente">
                                    <option value="">-- Seleccione --</option>
                                    <option value="1">Atendido</option>
                                    <option value="0">Pendiente</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" id="btnCerrarCliente" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardarCliente" class="btn btn-primary" onclick="GuardarCliente()">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/Generic/Generic.js') }}"></script>
<script src="{{ asset('assets/js/Privado/Cliente/Cliente.js') }}" asp-append-version="true"></script>

@endsection

