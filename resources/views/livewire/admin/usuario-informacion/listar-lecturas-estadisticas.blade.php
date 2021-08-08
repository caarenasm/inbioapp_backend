{{-- <table style="width:100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Calidad Sueño</th>
            <th>Hora inicio</th>
            <th>Hora fin</th>
            <th>Total de horas.</th>
        </tr>
    </thead>
    
        <div id='fila'></div>
    
</table>

@push('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <script>
            function filtro(valor) {
                $("#table").html('Cargando ...');
                $.post("", {
                    user_id: 6
                    tipo_lectura_id: valor,
                    _token: '{{ csrf_token() }}'
                }, function(data) {
                    $.each(data.results, function(i, f) {
                        $("#table").append();
                    });
                });
            };
        </script>
    <script>


        $("#tipo_lectura_id").change(function(){
            var lectura = document.getElementById("tipo_lectura_id").value;
            var usuario = {{ $user_id}};

            $("#fila").html('Cargando...');
            $.post("{{ route('estadisticas.lecturas') }}", { 
                lectura: lectura, 
                usuario: usuario,
                _token: '{{ csrf_token() }}' 
            }, function(data){
                $("#fila").html('<tbody>');
                $.each(data.data, function(i,f) {
                    $("#fila").append(
                    '<tr>'+
                        '<td class="px-6 py-4 whitespace-nowrap">'+
                            '<div class="flex items-center">'+
                                '<div class="ml-2">'+
                                    '<div class="text-sm font-medium text-gray-900">'+
                                        f.calidad_sueño +
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</td>'+
                    '<tr>'
                );
                });
                $("#fila").append('</tbody>');
            });

        });
    </script>
@endpush --}}

<div class="flex justify-center items-center h-screen">
	<!--actual component start-->
	<div x-data="setup()">
		<ul class="flex justify-center items-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
					:class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>

		<div class="w-auto bg-white p-16 text-center mx-auto border p-8">
			<div x-show="activeTab===0">
                @include('livewire/admin/usuario-informacion/sueño-estadisticas') 
            </div>
			<div x-show="activeTab===1">
                @include('livewire/admin/usuario-informacion/peso-estadisticas')
            </div>
			<div x-show="activeTab===2">
                @include('livewire/admin/usuario-informacion/actividad-estadisticas')
            </div>
			<div x-show="activeTab===3">
                @include('livewire/admin/usuario-informacion/comidas-estadisticas')
            </div>
            <div x-show="activeTab===4">
                @include('livewire/admin/usuario-informacion/agua-estadisticas')
            </div>
            <div x-show="activeTab===5">
                @include('livewire/admin/usuario-informacion/incomodidad-estadisticas')
            </div>
            <div x-show="activeTab===6">
                @include('livewire/admin/usuario-informacion/suplementos-estadisticas')
            </div>
		</div>

		<ul class="flex justify-center items-center my-4">
			<template x-for="(tab, index) in tabs" :key="index">
				<li class="cursor-pointer py-3 px-4 rounded transition"
					:class="activeTab===index ? 'bg-green-500 text-white' : ' text-gray-500'" @click="activeTab = index"
					x-text="tab"></li>
			</template>
		</ul>
		
		<div class="flex gap-4 justify-center border-t p-4">
			<button
				class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
				@click="activeTab--" x-show="activeTab>0"
				>Back</button>
			<button
				class="py-2 px-4 border rounded-md border-blue-600 text-blue-600 cursor-pointer uppercase text-sm font-bold hover:bg-blue-500 hover:text-white hover:shadow"
				@click="activeTab++" x-show="activeTab<tabs.length-1"
				>Next</button>
		</div>
	</div>
	<!--actual component end-->
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
	function setup() {
    return {
      activeTab: 0,
      tabs: [
          "Sueño",
          "Peso",
          "Actividad",
          "Comidas",
          "Vasos de agua",
          "Incomodidad",
          "Suplementos"
      ]
    };
  };
</script>

<!--
# Changelog:

## [1.1] - 2021-05-01
### Added
 - Back/Next buttons

## [1.0] - 2021-05-01
### Added
 - Nav bar with two styles
 - Set tabs title dynamically and render on page
-->
@endpush
