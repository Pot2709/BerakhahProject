window.onload = function() {
    ListarUsuario();
}

function ListarUsuario() {
    $("#progress").fadeIn(500).prop('hidden', false);
    $("#progress").fadeOut(700);

    setTimeout(function() {
        $("#divContent").fadeIn(1000).prop('hidden', false);

        if ($.fn.DataTable.isDataTable('#tblUsuario')) {
            $('#tblUsuario').DataTable().ajax.reload(null, false);
        }
    }, 1000);
}

function NuevoUsuario() {
    LimpiarUsuario();
    document.getElementById("mdlUsuarioLabel").innerHTML = "Nuevo Usuario";
    inFocusName("name", 470);
}

function LimpiarUsuario() {
    document.getElementById('frmUsuario').reset();
    document.querySelector('[name="name"]').value = "";
    document.querySelector('[name="email"]').value = "";
    document.querySelector('[name="password"]').value = "";
    document.querySelector('[name="password_confirmation"]').value = "";
    document.getElementById("cboEstado").value = "";
}


// valida la contraseña sean iguales
function ValidarPassword() {

    let pass = document.getElementById("password").value;
    let confirm = document.getElementById("password_confirmation").value;
    let msg = document.getElementById("msgPassword");

    if (pass !== confirm) {
        msg.textContent = "Las contraseñas no coinciden";
        return false;
    } else {
        msg.textContent = "";
        return true;
    }
}

function GuardarUsuario(){
    if(!ValidarCamposUsuario()) return;
    if(!ValidarPassword()) return;

    var frm = new FormData(frmUsuario);
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    frm.append('_token', token);

    MessageConfirmation(undefined, '¿Desea guardar el Usuario?', function(){
        $('#progress').fadeIn(500).prop('hidden', false);

        fetch('/usuarios',{
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
                $('#mdlUsuario').modal('hide');
                ListarUsuario();
                LimpiarUsuario();
                MessageSuccess(data.message || "Usuario guardado correctamente.")
            }else{
                MessageError(data.message || "Error al guardar el Usuario.")
            }
        }).catch(error => {
            $("#progress").fadeOut(500);
            MessageError(error.message || "Error en la comunicación con el servidor.")
        })

    });

}


function EditarUsuario(codUsuario){
    document.getElementById('mdlUsuarioLabel').innerHTML='Editar Usuario';

    fetch(`/usuarios/${codUsuario}/obtener`)
        .then(res => res.json())
        .then(data => {
            document.querySelector('[name="id"]').value = data.id;
            document.querySelector('[name="name"]').value = data.name;
            document.querySelector('[name="email"]').value = data.email;
            document.getElementById("cboEstado").value = Number(data.estado);

            $('#mdlUsuario').modal('show');
        })
        .catch(err=>console.error('Error al obtener Usuario: ' , err));
    inFocusName("name", 470);
}












//abre la contraseña
function togglePassword(id, el) {

    let input = document.getElementById(id);
    let icon = el.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}


function ValidarCamposUsuario() {

    let id = getN("id");
    let name = getN("name");
    let email = getN("email");
    let password = getN("password");
    let confirm = getN("password_confirmation");
    let estado = getN("estado");

    if (!name) {
        MessageError("Ingrese su Nombre y Apellido.");
        return false;
    }

    if (!email) {
        MessageError("Ingrese su email.");
        return false;
    }

    // Solo exigir contraseña cuando es un usuario nuevo
    if (!id) {

        if (!password) {
            MessageError("Ingrese su contraseña.");
            return false;
        }

        if (password !== confirm) {
            MessageError("Las contraseñas no coinciden.");
            return false;
        }
    }
    // Si es edición y escribió una contraseña, validar que coincidan
    else if (password || confirm) {

        if (password !== confirm) {
            MessageError("Las contraseñas no coinciden.");
            return false;
        }

    }

    if (!estado) {
        MessageError("Seleccione el estado.");
        return false;
    }

    return true;
}
