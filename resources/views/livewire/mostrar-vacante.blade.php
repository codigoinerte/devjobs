<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">{{ $vacante->titulo }}</h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
            
            <p class="font-bold text-sm text-gray-900 my-3 uppercase">
                Empresa: 
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>
            <p class="font-bold text-sm text-gray-900 my-3 uppercase">
                &Uacute;ltimo d&iacute;a para postularse: 
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>
            <p class="font-bold text-sm text-gray-900 my-3 uppercase">
                Categoria: 
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>
            <p class="font-bold text-sm text-gray-900 my-3 uppercase">
                Salario: 
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>

        </div>

    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ 'Imagen vacante ' . $vacante->titulo }}" />
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción del puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest        
        <div class="mt-5 bg-gray-50 border border-dashed text-center p-5">
            <p>
                ¿Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obtener una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\models\Vacante::class)
        <livewire:postular-vacante />
    @endcannot

    {{-- @can('create', App\models\Vacante::class)
        <p>este es un reclutador</p>

    @else
        
        <livewire:postular-vacante />

    @endcan --}}

</div>
