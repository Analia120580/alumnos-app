<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header ?? 'Panel principal' }}
            </div>
        </header>

        <!-- Contenido -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>

