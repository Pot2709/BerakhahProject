@extends('layouts.admin_sidebar')

@section('content')

<input type="hidden" id="hdfOculto" value="/" />

<div class="cuerpo shadow rounded-4 p-3">
    <ul class="nav nav-tabs nav-tabs-line" role="tablist">
        <li class="nav-item">
            <a class="nav-link active a-style" data-bs-toggle="tab" href="#tabsRol" role="tab">
                <i class="fa fa-cogs"></i>&nbsp; Usuarios
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active fade show" id="tabsRol" role="tabpanel">

            {{-- bOTONES --}}
            <div class="row align-items-center pt-3">
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-primary d-block w-100" data-bs-toggle="modal" data-bs-target="#mdlUsuario" onclick="NuevoUsuario()">
                        Nuevo Usuario
                    </button>
                </div>

                <div class="col-md-7"></div>

                <div class="col-md-2 d-flex justify-content-end">
                    <button type="button" title="Reporte - Excel" class="btn btn-outline-success me-2" onclick="DescargarExcelUsuario()">
                        <i class="fas fa-file-excel"></i>
                    </button>
                </div>
            </div>

            {{-- TABLA DE ROLES --}}
            <div class="row pt-3">
                <div id="divRol">
                    @include('Administrador.usuario.listar')
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODAL USUARIO -->
<div class="modal fade" id="mdlUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mdlUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlUsuarioLabel">Registro De Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="frmUsuario" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label>Id</label>
                            <input type="text" name="id" id="id" class="form-control" placeholder="Autogenerado" readonly />
                        </div>

                        <div class="col-md-4">
                            <label>Nombre y Apellido</label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Email</label>&nbsp;<label style="color:red">*</label>
                            <input type="text" name="email" id="email" class="form-control" />
                            <small id="msgPassword" class="text-danger"></small>
                        </div>

                        <div class="row">

                           <div class="col-md-4 mt-2">
                                <label>Contraseña</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <small id="msgPassword" class="text-danger"></small>
                                    <span class="input-group-text bg-white" style="cursor:pointer"
                                        onclick="togglePassword('password', this)">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                           <div class="col-md-4 mt-2">
                                <label>Confirmar contraseña<label>&nbsp;</label></label>

                                <div class="input-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                    <span class="input-group-text bg-white" style="cursor:pointer"
                                        onclick="togglePassword('password_confirmation', this)">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-4 mt-2">
                                <label>Estado</label>&nbsp;<label style="color:red">*</label>
                                <select name="estado" class="form-control" id="cboEstado">
                                    <option value="">-- Seleccione --</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </form>

            </div>

            <div class="modal-footer">
                <button type="button" id="btnCerrarUsuario" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnGuardarUsuario" class="btn btn-primary" onclick="GuardarUsuario()">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/js/Generic/Generic.js') }}"></script>
<script src="{{ asset('assets/js/Privado/Usuario/Usuario.js') }}" asp-append-version="true"></script>

@endsection

