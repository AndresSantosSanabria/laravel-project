<!doctype html>
<html lang="es">

<head>
  <!-- Configuración básica de la página -->
  <meta charset="utf-8"> <!-- Soporte para caracteres especiales (tildes, ñ, etc.) -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Hace la página responsive -->
  
  <title>Control usuarios</title> <!-- Título que aparece en la pestaña del navegador -->

  <!-- Importo Bootstrap 5 desde CDN para estilos prediseñados -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Barra de navegación superior -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <!-- Logo o nombre de la aplicación -->
        <a class="navbar-brand fw-bold text-white" href="#">
            <i class="bi bi-people-fill me-2"></i> Control de Usuarios
        </a>

        <!-- Botón hamburguesa que aparece en pantallas pequeñas -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Menú de navegación colapsable -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- ms-auto: alinea los elementos a la derecha -->
                <li class="nav-item">
                    <!-- Enlace a la vista de creación de usuarios -->
                    <!-- request()->is() se usa para marcar activo el enlace dependiendo de la URL actual -->
                    <a class="nav-link {{ request()->is('usuarios/crear') ? 'active fw-bold' : '' }}" href="/usuarios/crear">
                        <i class="bi bi-plus-circle me-1"></i> Crear nuevo usuario
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Enlace a la vista de listado de usuarios -->
                    <a class="nav-link {{ request()->is('usuarios/leer') ? 'active fw-bold' : '' }}" href="/usuarios/leer">
                        <i class="bi bi-list-ul me-1"></i> Visualizar listado de usuarios
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>

  <!-- Contenedor principal donde se cargará el contenido dinámico -->
  <div class="container">
    @yield('content') <!-- Aquí se inyecta el contenido de cada vista hija -->
  </div>

  <!-- Importo el bundle JS de Bootstrap (incluye Popper y funcionalidades interactivas) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
