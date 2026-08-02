// NAV

const slides = document.querySelectorAll(".hero-slide");

const heroTitle = document.querySelector(".hero-title");
const heroDescription = document.querySelector(".hero-description");
const heroButtons = document.querySelector(".hero-buttons");

let currentSlide = 0;

//text images
const heroContent = [

    {
        title: "CONTABILIDAD Y EFICIENCIA EMPRESARIAL",
        description: "La gestión contable permite conocer la situación de la empresa, optimizar costos y favorecer su crecimiento."
    },

    {
        title: "INVENTARIO",
         description: "La gestión de almacenes e inventarios optimiza el control de bienes, mejora el flujo financiero y reduce riesgos."
    },

    {
        title: "TASACIONES",
        description: "La tasación determina el valor comercial de un bien mueble o inmueble mediante el análisis de sus características, estado de conservación y condiciones del mercado."
    },

     {
        title: "ESTUDIO DE MERMAS",
        description: "El estudio técnico de mermas identifica pérdidas, optimiza procesos, reduce costos y facilita el cumplimiento tributario para una mejor gestión empresarial."
    }

];


/*=========================================
        ACTUALIZAR CONTENIDO
=========================================*/

function updateHeroContent(){

    heroTitle.style.opacity = 0;
    heroDescription.style.opacity = 0;

    setTimeout(() => {

        heroTitle.textContent = heroContent[currentSlide].title;

        heroDescription.textContent = heroContent[currentSlide].description;

        heroTitle.style.opacity = 1;
        heroDescription.style.opacity = 1;

    },300);

}


/*=========================================
        ANIMACIONES
=========================================*/

function animateHero(){

    heroTitle.classList.remove("animate-left");
    heroDescription.classList.remove("animate-left");
    heroButtons.classList.remove("animate-bottom");

    void heroTitle.offsetWidth;

    heroTitle.classList.add("animate-left");
    heroDescription.classList.add("animate-left");
    heroButtons.classList.add("animate-bottom");

}


/*=========================================
        CAMBIAR IMAGEN
=========================================*/

function changeHeroSlide(){

    slides[currentSlide].classList.remove("active");

    currentSlide++;

    if(currentSlide >= slides.length){

        currentSlide = 0;

    }

    slides[currentSlide].classList.add("active");

    updateHeroContent();

    animateHero();

}


/*=========================================
        INICIO
=========================================*/

updateHeroContent();

animateHero();

setInterval(changeHeroSlide,6000);


// TERMINA NAV





// scrol osucro
const navbar = document.querySelector(".custom-navbar");

window.addEventListener("scroll", function () {

    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }

});



// silider con 3 lineas abajo

const swiper = new Swiper(".servicesSwiper", {

    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,

    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    breakpoints: {
        0: {
            slidesPerView: 1
        },
        768: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 3
        }
    }

});



// ofrecemos

const reveals = document.querySelectorAll('.reveal-right, .reveal-up');

const observer = new IntersectionObserver((entries)=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.classList.add('active');

        }

    });

},{
    threshold:0.2
});

reveals.forEach(item=>{

    observer.observe(item);

});

// animacion equipo

/*=========================================
ANIMACIÓN EQUIPO
=========================================*/

/*=========================================
ANIMACIÓN EQUIPO
=========================================*/
/*=========================================
ANIMACIÓN SECCIÓN EQUIPO
=========================================*/

const teamSection = document.querySelector(".team-section");
const teamHeader = document.querySelector(".team-header");
const teamItems = document.querySelectorAll(".team-item");

const teamAnimation = new IntersectionObserver((entries) => {

    entries.forEach((entry) => {

        if (entry.isIntersecting) {

            // Aparece el encabezado
            teamHeader.classList.add("show");

            // Luego aparecen las tarjetas una por una
            teamItems.forEach((item, index) => {

                setTimeout(() => {

                    item.classList.add("show");

                }, 500 + (index * 300));

            });

            // Solo se ejecuta una vez
            teamAnimation.unobserve(teamSection);

        }

    });

}, {
    threshold: 0.2
});

if (teamSection) {
    teamAnimation.observe(teamSection);
}


document.getElementById("frmContacto").addEventListener("submit", function(e){

    e.preventDefault(); // Evita que se envíe el formulario

   Swal.fire({
        icon: 'success',
        title: '¡Mensaje enviado!',
        text: 'Su mensaje se ha enviado correctamente.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#003463' // Azul
    });

});



//fomulario



//interno
function GuardarContacto() {

    if (!ValidarCamposConctacto()) return;

    let frm = new FormData(frmContacto);
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content');
        frm.append('_token', token);
        MessageConfirmation(
        undefined,
        "¿Desea enviar el mensaje?",
        function () {

            $("#progress").fadeIn(500).prop("hidden", false);

            fetch("/contacto", {
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


function ValidarCamposConctacto() {

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
