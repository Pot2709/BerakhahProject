@extends('layouts.admin_sidebar')

@section('title', 'Panel Administracion')

@section('content')
<div class="dashboard-container">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">Panel Contable</h2>
            <p class="text-muted mb-0">
                Resumen general de la gestión contable y tributaria
            </p>
        </div>

        <button class="btn btn-outline-dark rounded-pill px-4 shadow-sm">
            <i class="fa-regular fa-bell me-2"></i> Notificaciones
        </button>
    </div>

    <!-- Tarjetas -->
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-sm-6">
            <div class="card stat-card">
                <i class="fa-solid fa-building fa-2x mb-2 text-primary"></i>
                <h6 class="fw-semibold mb-1">Clientes Activos</h6>
                <h3 class="fw-bold mb-0">120</h3>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card stat-card">
                <i class="fa-solid fa-file-invoice fa-2x mb-2 text-success"></i>
                <h6 class="fw-semibold mb-1">Comprobantes Emitidos</h6>
                <h3 class="fw-bold mb-0">856</h3>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card stat-card">
                <i class="fa-solid fa-triangle-exclamation fa-2x mb-2 text-warning"></i>
                <h6 class="fw-semibold mb-1">Declaraciones Pendientes</h6>
                <h3 class="fw-bold mb-0">14</h3>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card stat-card">
                <i class="fa-solid fa-coins fa-2x mb-2 text-info"></i>
                <h6 class="fw-semibold mb-1">Honorarios del Mes</h6>
                <h3 class="fw-bold mb-0">S/ 32,500</h3>
            </div>
        </div>

    </div>

    <!-- Gráfico -->
    <div class="row g-4 mb-4">

        <div class="col-lg-8">

            <div class="card chart-card">

                <div class="d-flex justify-content-between align-items-center mb-2">

                    <h6 class="fw-bold">
                        <i class="fa-solid fa-chart-line me-2 text-primary"></i>
                        Ingresos Mensuales
                    </h6>

                    <span class="text-muted small">
                        Últimos 10 meses
                    </span>

                </div>

                <canvas id="chartVentas" height="120"></canvas>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card p-3 rounded-4 shadow-sm border-0">

                <h6 class="fw-bold mb-3">
                    <i class="fa-solid fa-calendar-check me-2 text-success"></i>
                    Estado de Obligaciones
                </h6>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item d-flex justify-content-between border-0 px-0">
                        Presentadas
                        <span class="fw-bold text-success">72%</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between border-0 px-0">
                        En proceso
                        <span class="fw-bold text-warning">18%</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between border-0 px-0">
                        Pendientes
                        <span class="fw-bold text-danger">10%</span>
                    </li>

                </ul>

            </div>

        </div>

    </div>

    <!-- Tabla -->
    <div class="card border-0 shadow-sm rounded-4 p-3">

        <h6 class="fw-bold mb-3">
            <i class="fa-solid fa-clock-rotate-left me-2 text-primary"></i>
            Últimas Actividades
        </h6>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Actividad</th>
                        <th>Responsable</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td>001</td>
                        <td>Empresa ABC SAC</td>
                        <td>Declaración IGV</td>
                        <td>Juan Pérez</td>
                        <td>02/07/2026</td>
                        <td><span class="badge bg-success">Finalizado</span></td>
                    </tr>

                    <tr>
                        <td>002</td>
                        <td>Importadora Perú</td>
                        <td>Auditoría Financiera</td>
                        <td>María Torres</td>
                        <td>03/07/2026</td>
                        <td><span class="badge bg-warning text-dark">En Proceso</span></td>
                    </tr>

                    <tr>
                        <td>003</td>
                        <td>Comercial SAC</td>
                        <td>Consultoría Tributaria</td>
                        <td>Carlos Díaz</td>
                        <td>03/07/2026</td>
                        <td><span class="badge bg-primary">Programado</span></td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const ctx = document.getElementById('chartVentas').getContext('2d');

    new Chart(ctx, {

        type: 'line',

        data: {

            labels: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct'],

            datasets: [{

                data: [15000,17000,18000,22000,25000,26000,29000,31000,33500,36000],

                borderColor: '#007aff',

                backgroundColor: 'rgba(0,122,255,0.15)',

                fill: true,

                tension: 0.4

            }]

        },

        options: {

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }

        }

    });

});
</script>

<script src="{{ asset('assets/js/Generic/Generic.js') }}"></script>

@endsection
