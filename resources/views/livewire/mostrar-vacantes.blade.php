<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        
            
        @forelse ($vacantes as $vacante)

            <div class="p-6 bg-white border-b border-gray-200 md:flex md:items-center md:justify-between">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col items-stretch gap-3 mt-5 md:mt-0 md:flex-row">
                    <a href="#" class="bg-slate-800 py-2 px-4 rounded-lg text-white font-bold text-xs uppercase text-center">
                        Candidatos
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id ) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white font-bold text-xs uppercase text-center">
                        Editar
                    </a>
                    <button 
                        wire:click='$emit("mostrarAlerta", {{ $vacante->id }})'
                        class="bg-red-600 py-2 px-4 rounded-lg text-white font-bold text-xs uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>            
        
        @empty

            <p class="p-3 text-center text-sm text-gray-600">
                No hay vacantes
            </p>

        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    Livewire.on('mostrarAlerta', (vacante_id)=>{
                
        Swal.fire({
                title: 'Eliminar vacante?',
                text: "Una vacante eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText:'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {


                //Eliminar la vacante

                Livewire.emit('eliminarVacante', vacante_id);

                Swal.fire(
                'Se eliminó la vacante!',
                'Eliminado correctamente.',
                'success'
                )
            }
        });

    });

</script>
@endpush