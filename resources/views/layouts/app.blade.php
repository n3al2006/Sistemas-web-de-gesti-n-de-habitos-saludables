<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HabitHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/desafios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progreso.css') }}">
    <link rel="stylesheet" href="{{ asset('css/recetas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/habits-form.css') }}">
</head>
<body style="background:#212121; padding: 0;">
    <div class="flex min-h-screen">
        @include('user.partials.sidebar')
        
        <main  style="padding: 8px; id="main-content" class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>