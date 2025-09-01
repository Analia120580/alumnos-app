<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Invitado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        {{ $slot }}
    </div>
</body>
</html>

