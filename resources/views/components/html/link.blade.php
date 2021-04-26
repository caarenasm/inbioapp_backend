<a href="{{$href}}"
   @if ($isButton)
    class="{{$class}} justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-{{$color}} hover:bg-{{$color}}-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-{{$color}}-300"
   @else
    class="{{$class}}"
   @endif
   id="{{$id}}">
    {{$text}}
</a>
