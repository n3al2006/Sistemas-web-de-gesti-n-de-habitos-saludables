<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HabitHub - Sistema de Hábitos Saludables</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C5CE7;
            --secondary: #00B894;
            --dark: #2D3436;
            --light: #F5F6FA;
            --accent: #FD79A8;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: url("{{ asset('img/1401.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            color: var(--light);
            min-height: 100vh;
        }
        
        .overlay {
            background: rgba(45, 52, 54, 0.85);
            min-height: 100vh;
            width: 100%;
        }
        
        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem;
            background: rgba(45, 52, 54, 0.5);
            backdrop-filter: blur(10px);
            z-index: 100;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
        }
        
        .logo span {
            color: var(--secondary);
            margin-left: 0.5rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-left: 1rem;
        }
        
        .btn-primary {
            background: var(--secondary);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            background: #00A884;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
        }
        
        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }
        
        .hero {
            padding: 15rem 2rem 6rem;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.25rem;
            max-width: 700px;
            margin: 0 auto 3rem;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--secondary);
        }
        
        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .feature-card p {
            opacity: 0.8;
            line-height: 1.6;
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                width: 100%;
                justify-content: center;
            }
            
            .hero {
                padding: 10rem 1rem 4rem;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .features {
                grid-template-columns: 1fr;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="overlay">
        <div class="header">
            <div class="logo">HABIT<span>HUB</span></div>
            <div class="nav-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        
        <div class="hero">
            <h1>Transforma tu salud con hábitos inteligentes</h1>
            <p>HabitHub es el sistema diseñado especialmente para adultos mayores en Pucallpa que buscan mejorar su bienestar a través del seguimiento de hábitos saludables.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Comienza tu viaje saludable</a>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">📅</div>
                <h3>Seguimiento Personalizado</h3>
                <p>Registra y monitorea tus hábitos diarios con recordatorios inteligentes adaptados a tu rutina.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">❤️</div>
                <h3>Salud Integral</h3>
                <p>Controla actividad física, hidratación, medicación y más en un solo lugar.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Reportes Detallados</h3>
                <p>Visualiza tu progreso con gráficos claros y recibe recomendaciones personalizadas.</p>
            </div>
        </div>
    </div>
</body>
</html>