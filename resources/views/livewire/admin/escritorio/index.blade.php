<x-app-layout>

    @section('title', 'Escritorio')

    <div class="p-2 bg-white">
        <h2 class="text-2xl py-2 text-fondo-verde font-extrabold">Escritorio</h2>

        <div class="flex space-x-2">
            <x-tools.panel title="Administradores" body="{{$admins}}" titleClass="py-1 px-2" titleFontSize="2xl"
                           bodyClass="p-2 text-right" bodyFontSize="7xl" color="fondo-verde"/>

            <x-tools.panel title="Editores" body="{{$editors}}" titleClass="py-1 px-2" titleFontSize="2xl"
                           bodyClass="p-2 text-right" bodyFontSize="7xl" color="fondo-verde"/>

            <x-tools.panel title="Clientes" body="{{$clients}}" titleClass="py-1 px-2" titleFontSize="2xl"
                           bodyClass="p-2 text-right" bodyFontSize="7xl" color="fondo-verde"/>
        </div>

    </div>

</x-app-layout>
