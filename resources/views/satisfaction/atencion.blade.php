<x-layout>
<div class="container mt-5">
        <h1 class="text-center">Formulario de Satisfacción del Cliente</h1>
        <p class="text-center mb-4">Por favor, tómese un momento para calificar nuestra atención y servicios.</p>

        <form action="{{ route('satisfaction.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
            @csrf
            <div class="question mb-3">
                <label for="atencion_cliente" class="form-label">1. ¿Cómo calificaría nuestra atención al cliente?</label>
                <select name="atencion" id="atencion_cliente" class="form-select" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="question mb-3">
                <label for="calidad_producto" class="form-label">2. ¿Qué tan satisfecho está con la calidad del producto?</label>
                <select name="calidad" id="calidad_producto" class="form-select" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="question mb-3">
                <label for="recomendacion" class="form-label">3. ¿Recomendaría nuestros servicios a otros?</label>
                <select name="recomendacion" id="recomendacion" class="form-select" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="question mb-3">
                <label for="experiencia_web" class="form-label">4. ¿Cómo calificaría la experiencia de compra en nuestra web?</label>
                <select name="experiencia" id="experiencia_web" class="form-select" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="question mb-3">
                <label for="facilidad_busqueda" class="form-label">5. ¿Qué tan fácil fue encontrar lo que buscaba?</label>
                <select name="facilidad" id="facilidad_busqueda" class="form-select" required>
                    <option value="" disabled selected>Seleccione una opción</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="comments mb-3">
                <label for="comentarios" class="form-label">6. Comentarios adicionales (Máximo 200 caracteres):</label>
                <textarea name="comentarios" id="comentarios" rows="4" class="form-control" maxlength="200"></textarea>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

</x-layout>
