<div class="row mb-3 justify-content-end">
    <div class="col-md-4">
        <div class="input-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
            <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</div>

<table id="tblCliente" class="display table table-hover align-middle w-100">
    <thead class="thead-degrad">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Empresa</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

<script>
$(document).ready(function () {
    $('#divContent').removeAttr('hidden');

    let tabladata = $('#tblCliente').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        responsive: true,
        lengthChange: false,

        //  ESTA LÍNEA ES LA CLAVE
        dom: 'rt<"row"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>',

        ajax: {
            url: "{{ route('clientes.listar') }}",
            type: "GET",
            dataSrc: json => Array.isArray(json) ? json : json.data ?? []
        },
        columns: [
            { data: null, render: (data, type, row, meta) => meta.row + 1, className: "text-center" },
            { data: "nombre_cliente" },
            { data: "correo_cliente" },
            { data: "empresa_cliente" },

            {
                data: "estado",
                render: d => d
                    ? '<span class="badge bg-success">Atendido</span>'
                    : '<span class="badge bg-danger">Pendiente</span>',
                className: "text-center"
            },
            //{ data: "created_at" },

            {
                data: null,
                render: r => `
                    <div class="btn-group">
                        <button class="btn btn-outline-warning btn-sm" onclick="EditarCliente(${r.id_cliente})">
                            <i class="fas fa-pen"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm" onclick="EliminarCliente(${r.id_cliente})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `,
                className: "text-center"
            }
        ]
    });

    // buscador personalizado
    $('#searchInput').on('keyup', function () {
        tabladata.search(this.value).draw();
    });

    //boton para limpiar la búsqueda
    $('#clearSearch').on('click', function() {
        $('#searchInput').val('');
        tabladata.search('').draw();
    });

    $("#progress").fadeIn(400).prop('hidden', false);
    setTimeout(() => {
        $("#progress").fadeOut(400);
        tabladata.ajax.reload();
    }, 1000);
});
</script>

