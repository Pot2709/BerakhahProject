window.onload = function() {
    ListarCliente();
}

function ListarCliente() {
    $("#progress").fadeIn(500).prop('hidden', false);
    $("#progress").fadeOut(700);

    setTimeout(function() {
        $("#divContent").fadeIn(1000).prop('hidden', false);

        if ($.fn.DataTable.isDataTable('#tblCliente')) {
            $('#tblCliente').DataTable().ajax.reload(null, false);
        }
    }, 1000);
}

function NuevoCliente() {
    LimpiarCliente();
    document.getElementById("mdlClienteLabel").innerHTML = "Nuevo Cliente";
    inFocusName("nombre_cliente", 470);
}

function LimpiarCliente() {
    document.getElementById('frmCliente').reset();
    document.querySelector('[name="nombre_cliente"]').value = "";
    document.querySelector('[name="correo_cliente"]').value = "";
    document.querySelector('[name="empresa_cliente"]').value = "";
    document.getElementById("cboEstadoCliente").value = "";
}

function GuardarCliente(){
    if(!ValidarCamposCliente()) return;

    var frm = new FormData(frmCliente);
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    frm.append('_token', token);

    MessageConfirmation(undefined, '¿Desea guardar el Cliente?', function(){
        $('#progress').fadeIn(500).prop('hidden', false);

        fetch('clientes',{
            method: 'POST',
            body: frm,
            headers: {
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json',
            }
        })

        .then(response=>{
            $("#progress").fadeOut(500);
            if(!response.ok){
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data=>{
            if(data.success){
                $('#mdlCliente').modal('hide');
                ListarCliente();
                LimpiarCliente();
                MessageSuccess(data.message || "Cliente guardado correctamente.")
            }else{
                MessageError(data.message || "Error al guardar el Cliente.")
            }
        }).catch(error => {
            $("#progress").fadeOut(500);
            MessageError(error.message || "Error en la comunicación con el servidor.")
        })

    });

}

function EditarCliente(codCliente){
    document.getElementById('mdlClienteLabel').innerHTML='Editar Cliente';

    fetch(`clientes/${codCliente}/obtener`)
        .then(res => res.json())
        .then(data => {
            document.querySelector('[name="id_cliente"]').value = data.id_cliente;
            document.querySelector('[name="nombre_cliente"]').value = data.nombre_cliente;
            document.querySelector('[name="correo_cliente"]').value = data.correo_cliente;
            document.querySelector('[name="empresa_cliente"]').value = data.empresa_cliente;
            document.getElementById("cboEstadoCliente").value = Number(data.estado_cliente);

            $('#mdlCliente').modal('show');
        })
        .catch(err=>console.error('Error al obtener Cliente: ' , err));
    inFocusName("nombre_cliente", 470);
}



function ValidarCamposCliente() {

    let nombre_cliente = getN("nombre_cliente");
    let correo_cliente = getN("correo_cliente");
    let empresa_cliente = getN("empresa_cliente");
    let estado_cliente = getN("estado_cliente");

    if (!nombre_cliente) {
        MessageError("Ingrese el Nombre.");
        return false;
    }

    if (!correo_cliente) {
        MessageError("Ingrese el correo.");
        return false;
    }

    if (!empresa_cliente) {
        MessageError("Ingrese la empresa.");
        return false;
    }

    if (!estado_cliente) {
        MessageError("Seleccione el estado.");
        return false;
    }

    return true;
}
