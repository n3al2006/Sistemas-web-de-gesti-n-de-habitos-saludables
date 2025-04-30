@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Recetas para Subir de Peso</h1>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('habits.indexReceUp') }}" class="switch-recipes-link">
                <button class="tab-btn switch-btn">Ver Recetas para Bajar de Peso</button>
            </a>
        </div>

        <div class="tab-buttons">
            <button class="tab-btn active" data-target="desayuno">
                <i class="fas fa-sun"></i> Desayuno
            </button>
            <button class="tab-btn" data-target="almuerzo">
                <i class="fas fa-utensils"></i> Almuerzo
            </button>
            <button class="tab-btn" data-target="cena">
                <i class="fas fa-moon"></i> Cena
            </button>
        </div>

        <div class="tab-content" id="desayuno">
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/desayuno/batido-proteina.jpeg') }}" alt="Batido">
                <div class="recipe-info">
                    <h3>Batido de Avena y Proteínas</h3>
                    <ul>
                        <li>1 banana madura</li>
                        <li>1 cucharada de mantequilla de almendra o maní</li>
                        <li>1 taza de leche entera o leche de almendra</li>
                        <li>1/2 taza de avena</li>
                        <li>1 scoop de proteína en polvo (opcional)</li>
                        <li>Un poco de canela (opcional)</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
                
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/desayuno/pancake-avena.jpg') }}" alt="Pancakes">
                <div class="recipe-info">
                    <h3>Pancakes de Avena con Yogurt Griego</h3>
                    <ul>
                        <li>1 taza de harina de avena</li>
                        <li>1 huevo</li>
                        <li>1/2 taza de leche entera</li>
                        <li>1 cucharada de miel natural</li>
                        <li>1/2 taza de yogurt griego (rico en proteínas)</li>
                        <li>Frutas frescas (plátano, fresas o frutos rojos)</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/desayuno/omelette-aguacate.jpg') }}" alt="Omelette">
                <div class="recipe-info">
                    <h3>Omelette de Aguacate y Queso</h3>
                    <ul>
                        <li>3 huevos enteros (fuente de proteína de alta calidad)</li>
                        <li>1/2 aguacate (grasas saludables)</li>
                        <li>50 g de queso mozzarella (grasas y proteínas)</li>
                        <li>1 cucharada de aceite de coco o mantequilla clarificada</li>
                        <li>1 rebanada de pan integral</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="almuerzo" style="display: none;">
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/almuerzo/pasta-pollo-palta.jpg')}}" alt="Pasta">
                <div class="recipe-info">
                    <h3>Pasta Integral con Pollo y Aguacate</h3>
                    <ul>
                        <li>1 taza de pasta integral</li>
                        <li>200 g de pechuga de pollo cocida</li>
                        <li>1/2 aguacate</li>
                        <li>Verduras salteadas (espinacas, brócoli o zanahorias)</li>
                        <li>Aceite de oliva virgen extra</li>
                    </ul>

                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/almuerzo/arroz-frijoles-negros.jpg')}}" alt="Arroz y Frijoles">
                <div class="recipe-info">
                    <h3>Arroz Integral con Frijoles Negros</h3>
                    <ul>
                        <li>1 taza de arroz integral</li>
                        <li>1 taza de frijoles negros</li>
                        <li>1 huevo cocido o a la plancha</li>
                        <li>1/4 de aguacate</li>
                        <li>Aceite de oliva para cocinar</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/almuerzo/carne-verduras-salteadas.jpeg') }}" alt="Carne y Verduras">
                <div class="recipe-info">
                    <h3>Carne Magra con Verduras Salteadas</h3>
                    <ul>
                        <li>200 g de carne magra (ternera, cerdo o pavo)</li>
                        <li>Verduras variadas (calabacín, zanahorias, pimientos)</li>
                        <li>1/2 taza de quinoa o arroz integral</li>
                        <li>Aceite de oliva virgen extra</li>
                        <li>Especias al gusto (pimienta, cúrcuma, ajo en polvo)</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="cena" style="display: none;">
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/cena/omelette-espinacas.jpg') }}" alt="Omelette">
                <div class="recipe-info">
                    <h3>Omelette de Queso y Espinacas</h3>
                    <ul>
                        <li>3 huevos enteros</li>
                        <li>50 g de queso mozzarella</li>
                        <li>1 taza de espinacas frescas</li>
                        <li>1 cucharada de aceite de coco o ghee</li>
                        <li>1 rebanada de pan integral</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/cena/tostada-palta-huevo.jpg') }}" alt="Tostadas con Aguacate">
                <div class="recipe-info">
                    <h3>Tostadas Integrales con Aguacate y Huevo</h3>
                    <ul>
                        <li>2 rebanadas de pan integral</li>
                        <li>1 aguacate maduro</li>
                        <li>1 huevo frito o cocido</li>
                        <li>Sal y pimienta al gusto</li>
                        <li>Un toque de aceite de oliva</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="{{ asset('img/subir-peso/cena/ensalada-pollo.jpg') }}" alt="Ensalada de Pollo">
                <div class="recipe-info">
                    <h3>Ensalada de Pollo con Aceite de Oliva</h3>
                    <ul>
                        <li>200 g de pechuga de pollo a la parrilla</li>
                        <li>Ensalada de hojas verdes (espinaca, lechuga, rúcula)</li>
                        <li>1/2 aguacate</li>
                        <li>1 cucharada de aceite de oliva virgen extra</li>
                        <li>Semillas de girasol o calabaza</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(content => content.style.display = 'none');

                btn.classList.add('active');
                document.getElementById(btn.dataset.target).style.display = 'block';
            });
        });
    </script>

    <script>
        const likeBtns = document.querySelectorAll('.btn-like');

        likeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                btn.classList.toggle('active');
            });
        });
    </script>

@endsection
