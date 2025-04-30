<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - HabitHub</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <nav class="header">
        <div class="nav-container">
            <h1><i class="fas fa-seedling"></i> HabitHub</h1>
            <div class="nav-links">
                <a href="{{ route('admin.habits.index') }}" class="nav-link">Habits</a>
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link logout">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="main">
        @if(session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
    <script>
        const pageButtons = document.querySelectorAll('.pagination .page-btn');
        let currentPage = 1;
        const totalPages = 3; 

        function updateActivePage(newPage) {
            currentPage = newPage;
            pageButtons.forEach(btn => btn.classList.remove('active'));

            pageButtons.forEach(btn => {
                if (parseInt(btn.textContent) === currentPage) {
                    btn.classList.add('active');
                }
            });
            console.log("Página actual:", currentPage); 
        }

        pageButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                if (btn.textContent.includes('Prev')) {
                    if (currentPage > 1) {
                        updateActivePage(currentPage - 1);
                    }
                } else if (btn.textContent.includes('Next')) {
                    if (currentPage < totalPages) {
                        updateActivePage(currentPage + 1);
                    }
                } else {
                    const page = parseInt(btn.textContent);
                    if (!isNaN(page)) {
                        updateActivePage(page);
                    }
                }
            });
        });
    </script>

<script>
    const toggle = document.querySelector('.menu-toggle');
    const links = document.querySelector('.nav-links');

    toggle.addEventListener('click', () => {
        links.classList.toggle('open');
        toggle.classList.toggle('open');
    });
</script>
</body>
</html>