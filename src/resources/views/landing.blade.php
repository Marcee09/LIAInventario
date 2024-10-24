{{-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIA</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')

</head>

<body class="font-sans bg-gray-200 text-gray-900 min-h-screen flex flex-col">
    <header>
    <!-- Navegación -->
    @if (Route::has('login')) 
    <nav class="flex items-center justify-between mx-4 ml-0 mr-0 bg-gray-900 text-gray-200">
        <!-- Imagen en la parte izquierda -->
        <div class="flex items-center">
            <img src="images/Kairos-EXACTAS-corel.svg" alt="Logo" class="h-14 w-auto mb-3 ml-8 mt-3">   
        </div>

        <!-- Enlaces de navegación a la derecha -->
        <div class="flex flex-1 justify-end mr-8">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-ingresar">Panel</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-ingresar">Ingresar</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-registrar ml-4">Registrarse</a>
                @endif
            @endauth
        </div>
    </nav>
    @endif
    </header>

    <main class="flex-grow flex items-center justify-between">
        <section class="text-left max-w-3xl px-4 absolute welcome-section ml-12">
            <h2 class="text-3xl font-semibold mb-4 orange-logo max-w-xxl relative z-10">Bienvenido a Kairos</h2>
            <h3 class="text-xl font-semibold mb-2 relative z-10">Sistema de control de inventario del LIA</h3>
            <div class="flex items-start mb-8">
                <div class="max-w-xxl text-left relative z-10">
                    <p class="mb-4">
                        Este sitio web ha sido desarrollado para facilitar la gestión y control de los recursos del departamento. 
                        Nuestro sistema te permitirá llevar un registro preciso de los equipos, materiales y suministros disponibles, 
                        asegurando que cada recurso esté adecuadamente contabilizado y accesible.
                    </p>
                    <p class="mb-4">
                        Con una interfaz amigable y herramientas eficaces, podrás monitorear la entrada y salida de artículos, 
                        así como generar informes que ayuden en la toma de decisiones informadas. Este sistema está diseñado 
                        para mejorar la organización y eficiencia en la administración de los recursos del departamento, 
                        contribuyendo al óptimo funcionamiento de nuestras actividades académicas y administrativas.
                    </p>
                </div>
            </div>
        </section>

        <aside class="mr-12 grid grid-cols-2 gap-4">
            <h4 class="col-span-2 text-xl text-center font-semibold mb-4">Algunas funcionalidades</h4>
            <div class="bg-gray-200 p-4 rounded-lg text-center">
                <i class="fas fa-user-plus text-4xl"></i>
                <h4 class="mt-2 text-xl">ABM de Usuarios</h4>
                <p class="mt-1 text-sm">Gestiona usuarios del sistema.</p>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg text-center">
                <i class="fas fa-boxes text-4xl"></i>
                <h4 class="mt-2 text-xl">Gestión de Inventario</h4>
                <p class="mt-1 text-sm">Monitorea el inventario.</p>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg text-center">
                <i class="fas fa-chart-pie text-4xl"></i>
                <h4 class="mt-2 text-xl">Gestión de Informes</h4>
                <p class="mt-1 text-sm">Crea y visualiza informes.</p>
            </div>
            <div class="bg-gray-200 p-4 rounded-lg text-center">
                <i class="fas fa-ticket-alt text-4xl"></i>
                <h4 class="mt-2 text-xl">Tickets</h4>
                <p class="mt-1 text-sm">Ver, comentar y gestionar tickets.</p>
            </div>
        </aside>
    </main>

    <footer class="bg-gray-900 text-white py-4 w-full">
    <div class="container mx-auto px-4 flex flex-col items-center">
        <!-- Texto centrado -->
        <div class="text-center text-sm text-white opacity-70 mb-2">
            <p>&copy; 2024 Software para Personal de LIA autorizado.</p>
            <p>Universidad Nacional de San Juan | Facultad de Ciencias Exactas, Físicas y Naturales</p>
        </div>
    </div>
</footer>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kairos - Gestión de Inventario IT</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    @vite('resources/css/app.css')
    @vite('resources/css/style.css')
</head>

<body>
    <nav>
        <div class="logo">
            <img src="images/Kairos-EXACTAS-corel.svg" alt="Logo" class="h-14 w-auto mb-3 ml-8 mt-3">  
        </div>
        <div class="nav-buttons">
            <a href="/login" class="btn btn-ingresar">Ingresar</a>
            <a href="/register" class="btn btn-registrar">Registrarse</a>
        </div>
    </nav>

    <main>
        <section class="hero-section">
            <div class="hero-content">
                <h1>Control total de tu inventario IT</h1>
                <h2>
                    Gestiona de manera eficiente todos los recursos informáticos del LIA. 
                    Mantén el control de equipos, software y recursos tecnológicos en un solo lugar.
                </h2>
                <div class="nav-buttons">
                    <a href="/register" class="btn btn-registrar">Comenzar ahora</a>
                    <a href="/about" class="btn btn-ingresar">Conocer más</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('images/LIA.webp') }}" alt="Dashboard visualization">
            </div>
        </section>

        <section class="features-section">
            <div class="feature-list">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Control de Equipos</h3>
                        <p>Gestiona todo el equipamiento informático: computadoras, servidores, periféricos y componentes. 
                           Mantén un registro detallado de especificaciones, ubicación y estado de cada dispositivo.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-code-branch"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Gestión de Software</h3>
                        <p>Administra licencias, versiones y distribución de software. 
                           Mantén un control preciso de las instalaciones y actualizaciones en cada equipo.</p>
                    </div>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Seguimiento y Reportes</h3>
                        <p>Genera informes detallados sobre el uso y estado de los recursos. 
                           Analiza tendencias y toma decisiones informadas sobre actualizaciones y mantenimiento.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-content">
                <h2>¿Listo para optimizar tu gestión IT?</h2>
                <p>Únete a Kairos y transforma la manera en que administras tus recursos tecnológicos</p>
                <div class="cta-buttons">
                    <a href="/register" class="btn btn-white">Crear cuenta</a>
                    <a href="/demo" class="btn btn-registrar">Solicitar demo</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Software para Personal de LIA autorizado.</p>
        <p>Universidad Nacional de San Juan | Facultad de Ciencias Exactas, Físicas y Naturales</p>
    </footer>

    <script>
        // Animaciones con GSAP
        gsap.from(".hero-content", {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: "power3.out"
        });

        gsap.from(".hero-image", {
            duration: 1,
            x: 50,
            opacity: 0,
            ease: "power3.out",
            delay: 0.3
        });

        gsap.from(".feature-item", {
            duration: 0.8,
            y: 50,
            opacity: 0,
            stagger: 0.2,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".features-section",
                start: "top center"
            }
        });

        // Animación del nav al hacer scroll
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            const nav = document.querySelector('nav');
            
            if (currentScroll > lastScroll) {
                nav.style.transform = 'translateY(-100%)';
            } else {
                nav.style.transform = 'translateY(0)';
            }
            lastScroll = currentScroll;
        });
    </script>
</body>
</html>












