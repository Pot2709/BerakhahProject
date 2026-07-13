

function GuardarCliente() {

    if (!ValidarCamposCliente()) return;

    let frm = new FormData(frmCliente);
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');
        frm.append('_token', token);
        MessageConfirmation(
        undefined,
        "¿Desea enviar el mensaje?",
        function () {

            $("#progress").fadeIn(500).prop("hidden", false);

            fetch("/clientes", {
                method: "POST",
                body: frm,
                headers: {
                    "X-CSRF-TOKEN": token,
                    "Accept": "application/json"
                }
            })

            .then(response => {
                $("#progress").fadeOut(500);
                if (!response.ok) {
                    return response.json().then(err => {
                        throw err;
                    });
                }
                return response.json();
            })

            .then(data => {

                if (data.success) {
                    frmCliente.reset();
                    MessageSuccess(data.message);
                } else {
                    MessageError(data.message);
                }

            })

            .catch(error => {
                $("#progress").fadeOut(500);
                MessageError(
                    error.message ??
                    "Ocurrió un error al enviar el mensaje."
                );

            });

        }
    );
}


function ValidarCamposUsuario() {

    let nombre_cliente = getN("nombre_cliente");
    let correo_cliente = getN("correo_cliente");
    let empresa_cliente = getN("empresa_cliente");
    let estado = getN("estado");

    if (!nombre_cliente) {
        MessageError("Ingrese su Nombre y Apellido.");
        return false;
    }

    if (!correo_cliente) {
        MessageError("Ingrese su Correo.");
        return false;
    }

    if (!empresa_cliente) {
        MessageError("Ingrese su Empresa.");
        return false;
    }

    return true;
}
