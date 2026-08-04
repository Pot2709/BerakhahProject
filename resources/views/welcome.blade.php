<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BERAKHAH S.A.C</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/b.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/Site.public.css') }}">

</head>

<body>


<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top custom-navbar">
    <div class="container">
        <a class="navbar-brand logo" href="{{ url('/') }}">
            <span class="logo-icon">
                <img src="{{ asset('assets/images/LogoBerak-sin.png') }}" alt="Logo" class="misma-clase">
            </span>
        </a>

        <button class="navbar-toggler bg-white" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a href="#inicio"class="nav-link">INICIO </a>
                </li>

                <li class="nav-item">
                    <a href="#nosotros" class="nav-link">NOSOTROS</a>
                </li>

                <li class="nav-item">
                    <a href="#servicios"class="nav-link">SERVICIOS</a>
                </li>

                 <li class="nav-item">
                    <a href="#equipo"class="nav-link">NUESTRO EQUIPO</a>
                </li>

                <li class="nav-item">
                    <a href="#contacto"class="nav-link">CONTACTO</a>
                </li>
            </ul>
        </div>

    </div>

</nav>


<!-- HERO -->
<section class="hero animating" id="inicio">

    <!-- SLIDER DE FONDO -->
    <div class="hero-slider">
        <img src="{{ asset('assets/images/im.jpg') }}" class="hero-slide active" alt="Auditoría">
        <img src="{{ asset('assets/images/PortadaInventario.jpg') }}" class="hero-slide" alt="Contabilidad">
        <img src="{{ asset('assets/images/im1.2.jpg') }}" class="hero-slide" alt="Consultoría">
        <img src="{{ asset('assets/images/ban4.jpg') }}" class="hero-slide" alt="">
    </div>

    <!-- OVERLAY OSCURO -->
    <div class="hero-overlay"></div>

    <!-- CÍRCULOS DECORATIVOS -->
    <div class="hero-circle hero-circle-1"></div>
    <div class="hero-circle hero-circle-2"></div>
    <div class="hero-circle hero-circle-3"></div>

    <!-- content -->

    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7">
                <h1 class="hero-title animate-left">
                    Contabilidad y Eficiencia Empresarial
                </h1>

                <p class="hero-description animate-left">
                    Ayudamos a empresas de todos los tamaños a optimizar su gestión financiera,
                    cumplir con las obligaciones tributarias y tomar mejores decisiones mediante
                    servicios profesionales de auditoría, contabilidad y consultoría.
                </p>

               <div class="hero-buttons animate-bottom">

                    <a href="#contacto" class="btn btn-primary btn-lg rounded-pill btn-asesoria">
                        Solicitar Asesoría
                    </a>

                    <a href="#servicios" class="btn btn-light btn-lg rounded-pill">
                        Ver Servicios
                    </a>

                </div>

                <div class="hero-features mt-5 animate-left">

                    <div class="hero-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        ÉTICA
                    </div>

                    <div class="hero-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        MEJORA CONTINUA
                    </div>

                    <div class="hero-feature">
                        <i class="bi bi-check-circle-fill"></i>
                        INNOVACIÓN
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="scroll-down">
        <span>SCROLL</span>
        <i class="bi bi-chevron-double-down"></i>
    </div>

</section>

<!-- NOSOTROS -->
<section class="about-section py-5" id="nosotros" mb-4 mt-4>

    <div class="container">
        <div class="text-center mb-5">
            <h1 class="section-tag quienes" style="font-weight: 700;">¿QUIÉNES SOMOS?</h1>
            <div class="line"></div>

        </div>

        <div class="row align-items-center gy-5">

            <!-- Imagen -->
            <div class="col-lg-6 about-left">

                <div class="about-image position-relative">

                    <img src="{{ asset('assets/images/im3.jpg') }}" class="img-fluid rounded-5 shadow-lg w-100" alt="Nosotros">

                    <!-- Tarjeta 1 -->
                    <div class="floating-card card-one">
                        <i class="bi bi-graph-up-arrow"></i>
                        <h5>+100</h5>
                        <span>Empresas asesoradas</span>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="floating-card card-two">
                        <i class="bi bi-shield-check"></i>
                        <h5>100%</h5>
                        <span>Confidencialidad</span>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="floating-card card-three">
                        <i class="bi bi-award"></i>
                        <h5>15+</h5>
                        <span>Años de experiencia</span>
                    </div>

                </div>

            </div>

            <!-- Texto -->
            <div class="col-lg-6 about-right">

                <h2 class="section-title">
                    EXPERIENCIA, METODOLOGÍA Y TECNOLOGÍA AL SERVICIO DE SU EMPRESA.
                </h2>

                <p class="section-description">
                   Somos una empresa peruana conformada por un staff de profesionales altamente preparados y motivados,
                    con amplia experiencia en los sectores minero, industrial, pesquero, comercial, retail y educación.
                     Nuestra propuesta de valor se basa en la experiencia, profesionales especializados, metodología y tecnología,
                    brindando soluciones precisas en inventarios y tasaciones que impulsan el crecimiento, la eficiencia y la competitividad
                     de las organizaciones.
                </p>

                <p class="section-description">
                   respaldadas por un equipo de trabajo estable que garantiza continuidad en los servicios recurrente
                    y una atención más ágil y eficiente.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- ofrecemos -->
<section class="companies">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="companies-title reveal-right" style="font-weight: 700;">
                    ¿QUE OFRECEMOS?
                </h1>
                <div class="line"></div>
            </div>
        </div>

        <div class="row mt-5 g-4">

            <!-- Servicio 1 -->
           <div class="col-md-3 reveal-up">
                <div class="service-card">
                    <img src="{{ asset('assets/images/o.inv.jpg') }}" alt="Auditoría">

                    <div class="service-overlay">
                        <div class="service-content">
                            <h3>GESTIÓN DE ALMACENES E INVENTARIOS</h3>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Servicio 2 -->
            <div class="col-md-3 reveal-up">
                <div class="service-card">
                    <img src="{{ asset('assets/images/o.tasa.jpg') }}" alt="Auditoría">

                    <div class="service-overlay">
                        <div class="service-content">
                            <h3>TASACIONES</h3>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Servicio 3 -->
             <div class="col-md-3 reveal-up">
                <div class="service-card">
                    <img src="{{ asset('assets/images/o.outso.jpg') }}" alt="Auditoría">

                    <div class="service-overlay">
                        <div class="service-content">
                            <h3>OUTSOURCING</h3>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Servicio 4 -->
             <div class="col-md-3 reveal-up">
                <div class="service-card">
                    <img src="{{ asset('assets/images/o.conta.jpg') }}" alt="Auditoría">

                    <div class="service-overlay">
                        <div class="service-content">
                            <h3>CONTABILIDAD Y EFICIENCIA EPRESARIAL</h3>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</section>



<!-- MISIÓN -->
<section class="mission-section">
    <div class="container">

        <div class="section-title">
            <span>NUESTRA EMPRESA</span>
            <h2>MISIÓN Y VISIÓN</h2>
            <div class="line"></div>
        </div>

        <div class="mission-grid">

            <!-- MISIÓN -->
            <div class="mission-card">

                <div class="mission-icon">
                    <i class="bi bi-bullseye"></i>
                </div>

                <div class="mission-content">
                    <h3>NUESTAR MISIÓN</h3>

                    <p>
                        Asesorar en forma integral a nuestros clientes
                        con soluciones innovadoras, responsables,
                        eficientes y de calidad que coadyuven a
                        nuestros clientes a fortalecer sus sistemas de
                        gestión de negocios y fortalecer sus
                        crecimientos de sus negocios.
                    </p>
                </div>

            </div>

            <!-- VISIÓN -->
            <div class="mission-card">

                <div class="mission-icon">
                    <i class="bi bi-eye"></i>
                </div>

                <div class="mission-content">
                    <h3>NUESTRA VISIÓN</h3>

                    <p>
                       Asesorar en forma integral a nuestros clientes
                        con soluciones innovadoras, responsables,
                        eficientes y de calidad que coadyuven a
                        nuestros clientes a fortalecer sus sistemas de
                        gestión de negocios y fortalecer sus
                        crecimientos de sus negocios.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- NUESTRO EQUIPO -->
<section class="team-section" id="equipo">

    <div class="container">

       <div class="text-center mb-5 team-header">

            <span class="section-tag team-tag" style="font-weight: 600;letter-spacing: 2px;font-size: 0.9rem;">
                NUESTRO EQUIPO
            </span>

            <h1 class="section-title" style="font-weight: 700;">
                COMPROMETIDOS CON EL ÉXITO EMPRESARIAL.
            </h1>
            <div class="line"></div>


        </div>

        <div class="row g-4">

            <!-- Integrante 1 -->
            <div class="col-lg-4 col-md-6 team-item">

                <div class="team-card">
                    <img src="{{ asset('assets/images/consultor.jpg') }}" alt="Juan Pérez">
                    <div class="team-overlay">
                        <h4>Juan Pérez</h4>
                        <span>Auditor Senior</span>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Integrante 2 -->
            <div class="col-lg-4 col-md-6 team-item">
                <div class="team-card">
                    <img src="{{ asset('assets/images/consultor.jpg') }}" alt="María Torres">
                    <div class="team-overlay">
                        <h4>María Torres</h4>
                        <span>Consultora Financiera</span>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Integrante 3 -->
            <div class="col-lg-4 col-md-6 team-item">
                <div class="team-card">
                    <img src="{{ asset('assets/images/consultor.jpg') }}" alt="Andrea López">
                    <div class="team-overlay">
                        <h4>Andrea López</h4>
                        <span>Asesora Tributaria</span>
                        <div class="team-social">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- servicios -->
<section class="services-section py-5" id="servicios" mt-4>
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-tag nuestros" style="font-weight: 600;letter-spacing: 2px;font-size: 0.9rem;">NUESTROS SERVICIOS</span>
            <h2 class="section-title" style="font-weight: 700;">SOLUCIONES EMPRESARIALES PARA  CADA NECESIDAD</h2>
            <div class="line"></div>

        </div>

        <div class="swiper servicesSwiper mt-4">
            <div class="swiper-wrapper mt-4">

                <!-- Servicio 1 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-calculator-fill"></i>
                        </div>
                        <h4>CONTABILIDAD</h4>
                        <p>Proceso y emisión de libros contables.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Presentación de estados financieros.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Análisis financiero.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Análisis financiero.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Presentación de la declaración del impuesto a la renta (mensual o anual).</p>
                    </div>
                </div>

                <!-- Servicio 2 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <h4>INVENTARIOS</h4>
                        <p>Control y gestión eficiente de inventarios.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Inventario de Insumos y Artículos.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Inventario de Activo Fijo.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Outsourcing de Inventarios.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Inventario de Productos en proceso.</p>
                    </div>
                </div>

                <!-- Servicio 3 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <h4>TASACIÓN</h4>
                        <p>Valoración precisa de bienes muebles e inmuebles.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> REVISIÓN INTEGRAL.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> GENERAR PLANES DE CONTINGENCIA.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> IDENTIFICAR LOS MAYORES RIESGOS.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> IDENTIFICANDO LAS NORMAS LEGALES.</p>
                    </div>
                </div>

                <!-- Servicio 4 -->
                <div class="swiper-slide">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-clipboard-data-fill"></i>
                        </div>
                        <h4>ESTUDIO DE MERMAS</h4>
                        <p>Análisis técnico para identificar y controlar mermas.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Identifica y cuantifica.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Reduccón de costos.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Optimización de procesos.</p>
                        <p><i class="bi bi-check-circle-fill service-check"></i> Toma de decisiones.</p>
                    </div>
                </div>

            </div>

            <!-- puntitos -->
            <div class="swiper-pagination"></div>

        </div>

    </div>

</section>


<!-- BENEFICIOS -->
<section class="benefits-section" id="beneficios">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">

                <h1 class="section-title beneficios ">
                    Trabajamos para que tu empresa crezca con seguridad.
                </h1>

                <div class="benefit-item beneficios">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h5>Equipo Profesional</h5>
                        <p>Especialistas certificados en auditoría y consultoría.</p>
                    </div>
                </div>

                <div class="benefit-item beneficios">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h5>Confidencialidad</h5>
                        <p>Manejo responsable y seguro de toda la información.</p>
                    </div>
                </div>

                <div class="benefit-item beneficios">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>
                        <h5>Atención Personalizada</h5>
                        <p>Soluciones adaptadas a cada tipo de empresa.</p>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <img src="{{ asset('assets/images/map.webp') }}" class="img-fluid rounded-5 shadow-lg" alt="">
            </div>
        </div>

    </div>

</section>


<!-- llamada de accion -->
<section class="cta-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>¿Necesitas asesoría especializada?</h2>
                <p>Nuestro equipo está listo para ayudarte a mejorar la gestión financiera de tu empresa.</p>
            </div>

            <div class="col-lg-4 text-lg-end">
                <a href="#contacto"
                    class="btn btn-light btn-lg rounded-pill">
                    Solicitar Asesoría
                </a>
            </div>
        </div>
    </div>

</section>

<!-- contacto -->

<section id="contacto" class="contact-section py-5">

    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <h2 class="section-title">
                    Conversemos sobre tu empresa
                </h2>

                <p>
                    Escríbenos y un asesor se comunicará contigo en el menor tiempo posible.
                </p>

                <div class="contact-info">
                    <p><i class="bi bi-geo-alt-fill"></i> Lima - Perú</p>
                    <p><i class="bi bi-envelope-fill"></i> contacto@berakhah.com</p>
                    <p><i class="bi bi-telephone-fill"></i> +51 948 865 506</p>
                </div>
            </div>

            <div class="col-lg-7">

                <form id="frmContacto">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <input type="text" id="nombre_cliente" name="nombre_cliente" class="form-control" placeholder="Nombre" style="text-transform: uppercase";>
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="email" id="correo_cliente" name="correo_cliente" class="form-control" placeholder="CORREO">
                        </div>

                        <div class="col-md-12 mb-3">
                            <input type="text" id="empresa_cliente" name="empresa_cliente" class="form-control" placeholder="Empresa" style="text-transform: uppercase";>
                        </div>

                        <div class="col-md-12 mb-3">
                            <textarea id="mensaje_cliente" name="mensaje_cliente" rows="6" class="form-control" placeholder="Mensaje" style="text-transform: uppercase;"></textarea>
                        </div>

                        <div class="col-md-12">
                            <button type="button"
                                    class="btn-contacto"
                                    onclick="GuardarContacto()">
                                Enviar Mensaje
                            </button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

</section>

<!-- footer -->

<footer class="footer mt-3">

    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4">
                <h3>BERAKHAH S.A.C</h3>
                <p>CALLE MADRID 171 - LA PERLA</p>
            </div>

            <div class="col-lg-2">
                <h5>Empresa</h5>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Nuestro Equipo</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>

            </div>

            <div class="col-lg-3">
                <h5>Servicios</h5>
                <ul>
                    <li>Auditoría</li>
                    <li>Consultoría</li>
                    <li>Tributación</li>
                    <li>Contabilidad</li>

                </ul>
            </div>

            <div class="col-lg-3">
                <h5>Contacto</h5>
                <p>+51 948 865 506</p>
                <p>contacto@berakhah.com</p>
                <div class="social-links">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-whatsapp"></i></a>
                </div>

            </div>

        </div>

        <hr>

        <div class="text-center">
            © 2026 Consultoría Empresarial & Auditoría Berakhah S.A.C | Todos los derechos reservados.
        </div>

    </div>

</footer>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="{{ asset('assets/js/Generic/Generic.js') }}"></script>
<script src="{{ asset('assets/js/Publica/Scrips.js') }}"></script>


</body>

</html>
