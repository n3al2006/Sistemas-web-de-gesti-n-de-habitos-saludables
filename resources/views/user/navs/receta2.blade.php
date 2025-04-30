@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Recetas para Bajar de Peso</h1>

        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('habits.indexRece') }}" class="switch-recipes-link">
                <button class="tab-btn switch-btn">Ver Recetas para Subir de Peso</button>
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
                <img src="https://source.unsplash.com/400x400/?smoothie,healthy" alt="Batido">
                <div class="recipe-info">
                    <h3>Batido Verde Energizante</h3>
                    <ul>
                        <li>1 taza de espinacas frescas</li>
                        <li>1/2 pepino</li>
                        <li>1 manzana verde</li>
                        <li>Jugo de 1 limón</li>
                        <li>1/2 taza de agua de coco</li>
                        <li>Un puñado de semillas de chía</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?avocado,toast" alt="Tostadas con Aguacate">
                <div class="recipe-info">
                    <h3>Tostadas de Aguacate y Huevo</h3>
                    <ul>
                        <li>2 rebanadas de pan integral</li>
                        <li>1 aguacate maduro</li>
                        <li>1 huevo cocido o a la plancha</li>
                        <li>Sal y pimienta al gusto</li>
                        <li>Un toque de aceite de oliva virgen extra</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?oatmeal,fruit" alt="Avena">
                <div class="recipe-info">
                    <h3>Avena con Frutas y Almendras</h3>
                    <ul>
                        <li>1/2 taza de avena integral</li>
                        <li>1/2 taza de leche de almendras</li>
                        <li>Frutas frescas (fresas, arándanos, plátano)</li>
                        <li>Un puñado de almendras picadas</li>
                        <li>Un toque de miel (opcional)</li>
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
                <img src="https://source.unsplash.com/400x400/?chicken,salad" alt="Pollo con Ensalada">
                <div class="recipe-info">
                    <h3>Pollo a la Parrilla con Ensalada</h3>
                    <ul>
                        <li>200 g de pechuga de pollo</li>
                        <li>Ensalada de hojas verdes (espinaca, lechuga, rúcula)</li>
                        <li>Tomates cherry</li>
                        <li>1/4 de aguacate</li>
                        <li>Vinagreta ligera (aceite de oliva, vinagre balsámico, mostaza)</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?vegetables,salad" alt="Ensalada">
                <div class="recipe-info">
                    <h3>Ensalada de Quinoa y Verduras</h3>
                    <ul>
                        <li>1/2 taza de quinoa cocida</li>
                        <li>1 zanahoria rallada</li>
                        <li>1/2 pepino en rodajas</li>
                        <li>1/4 de pimiento rojo</li>
                        <li>1 cucharada de semillas de girasol</li>
                        <li>Aderezo de aceite de oliva y limón</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?salmon,fish" alt="Salmón con Verduras">
                <div class="recipe-info">
                    <h3>Salmón a la Parrilla con Verduras al Vapor</h3>
                    <ul>
                        <li>150 g de filete de salmón</li>
                        <li>Brócoli y zanahorias al vapor</li>
                        <li>1 cucharada de aceite de oliva</li>
                        <li>Jugo de limón</li>
                        <li>Sal y pimienta al gusto</li>
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
                <img src="https://source.unsplash.com/400x400/?omelette,vegetables" alt="Omelette de Verduras">
                <div class="recipe-info">
                    <h3>Omelette de Claras con Verduras</h3>
                    <ul>
                        <li>4 claras de huevo</li>
                        <li>1/2 taza de espinacas</li>
                        <li>Champiñones, pimientos y cebolla</li>
                        <li>Un toque de sal y pimienta</li>
                        <li>1 cucharadita de aceite de oliva</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?chicken,bowl" alt="Pollo con Arroz Integral">
                <div class="recipe-info">
                    <h3>Pollo a la Parrilla con Arroz Integral</h3>
                    <ul>
                        <li>150 g de pechuga de pollo a la parrilla</li>
                        <li>1/2 taza de arroz integral cocido</li>
                        <li>Brócoli al vapor</li>
                        <li>1 cucharada de aceite de oliva</li>
                        <li>Sal y pimienta al gusto</li>
                    </ul>
                    <div class="action-buttons">
                        <button class="btn-like">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="https://source.unsplash.com/400x400/?soup,vegetables" alt="Sopa de Verduras">
                <div class="recipe-info">
                    <h3>Sopa de Verduras Light</h3>
                    <ul>
                        <li>Calabacín, zanahoria y apio</li>
                        <li>1 litro de caldo de pollo bajo en sal</li>
                        <li>Ajo picado al gusto</li>
                        <li>Un toque de sal y pimienta</li>
                        <li>Hojas de albahaca fresca para decorar</li>
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