<button type="{{$type}}"
        class="{{$width}} justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-{{$color}} hover:bg-{{$color}}-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{$color}}-700" @if($id!=='') id="{{$id}}" @endif>
    {{$text}}
</button>
