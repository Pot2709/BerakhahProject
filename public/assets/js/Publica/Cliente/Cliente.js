

//interno
function GuardarContacto() {

    if (!ValidarCamposContacto()) return;

    let frm = new FormData(frmContacto);
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');
        frm.append('_token', token);
        MessageConfirmation(
        undefined,
        "¿Desea enviar el mensaje?",
        function () {

            //$("#progress").fadeIn(500).prop("hidden", false);

            fetch("/contacto", {
                method: "POST",
                body: frm,
                headers: {
                    "X-CSRF-TOKEN": token,
                    "Accept": "application/json"
                }
            })

            .then(response => {
                //$("#progress").fadeOut(500);
                if (!response.ok) {
                    return response.json().then(err => {
                        throw err;
                    });
                }
                return response.json();
            })

            .then(data => {
            console.log(data);
                if (data.success) {
                    frmContacto.reset();
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


function ValidarCamposContacto() {

    let nombre = getN("nombre_cliente").trim();
    let correo = getN("correo_cliente").trim();
    let empresa = getN("empresa_cliente").trim();
    let mensaje = getN("mensaje_cliente").trim();

    if (nombre == "") {
        MessageError("Ingrese su nombre.");
        return false;
    }

    if (correo == "") {
        MessageError("Ingrese su correo.");
        return false;
    }

    const regexCorreo =
        /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regexCorreo.test(correo)) {
        MessageError("Ingrese un correo válido.");
        return false;
    }

    if (empresa == "") {
        MessageError("Ingrese su empresa.");
        return false;
    }

    if (mensaje.length > 2000) {
        MessageError("El mensaje supera los 2000 caracteres.");
        return false;
    }

    return true;
}
