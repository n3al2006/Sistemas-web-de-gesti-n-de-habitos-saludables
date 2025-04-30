@extends('layouts.app')

@section('content')
<main class="contenedor">
  
  <section class="intro">
    <h2>Supera tus límites cada día</h2>
    <p>Participa en desafíos diarios que te motivarán a crear nuevas rutinas y mejorar tu bienestar de forma divertida.</p>
  </section>

  <section class="desafios-grid">

    <div class="desafio-card">
      <div class="icono"><i class="fa-solid fa-droplet"></i></div>
      <h3>Beber 2L de Agua</h3>
      <p>Mantente hidratado durante toda la semana.</p>
      <button class="btn-unirse">Unirse</button>
    </div>

    <div class="desafio-card">
      <div class="icono"><i class="fa-solid fa-person-walking"></i></div>
      <h3>8,000 pasos diarios</h3>
      <p>Sal a caminar y mantente activo cada día.</p>
      <button class="btn-unirse">Unirse</button>
    </div>

    <div class="desafio-card">
      <div class="icono"><i class="fa-solid fa-bed"></i></div>
      <h3>Dormir 8 horas</h3>
      <p>Prioriza tu descanso para rendir mejor.</p>
      <button class="btn-unirse">Unirse</button>
    </div>

    <div class="desafio-card">
      <div class="icono"><i class="fa-solid fa-apple-whole"></i></div>
      <h3>Fruta diaria</h3>
      <p>Incluye una fruta fresca en tu alimentación.</p>
      <button class="btn-unirse">Unirse</button>
    </div>

  </section>

</main>
@endsection