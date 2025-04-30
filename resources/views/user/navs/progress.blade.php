@extends('layouts.app')

@section('content')
<main class="progress-section">

        <section class="progress-summary">
            <article class="progress-card">
                <div class="icon">🔥</div>
                <h2>7 días seguidos</h2>
                <p>¡Buen ritmo!</p>
            </article>

            <article class="progress-card">
                <div class="icon">✅</div>
                <h2>15 hábitos completados</h2>
                <p>¡Perfecto!</p>
            </article>

            <article class="progress-card">
                <div class="icon">🏅</div>
                <h2>5 desafíos superados</h2>
                <p>¡Muy bien!</p>
            </article>
        </section>

        <section class="bar-progress-section">
            <h2 class="section-title">Metas del Mes</h2>

            <div class="bar-group">
                <span>Meditación diaria</span>
                <div class="bar">
                    <div class="bar-fill" style="--progress: 70%;"></div>
                </div>
            </div>

            <div class="bar-group">
                <span>Ejercicio físico</span>
                <div class="bar">
                    <div class="bar-fill" style="--progress: 50%;"></div>
                </div>
            </div>

            <div class="bar-group">
                <span>Comida saludable</span>
                <div class="bar">
                    <div class="bar-fill" style="--progress: 80%;"></div>
                </div>
            </div>

        </section>

    </main>
@endsection