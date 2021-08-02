@foreach ($reservoirs as $reservoir)
    <a href="{{route('reservoir.edit',$reservoir)}}">
        {{$reservoir->title}} 
    </a>
<span>
    {{$reservoir->area}} 
    {{-- {{$reservoir->about}} --}}
</span>
<form method="POST" action="{{route('reservoir.destroy', $reservoir)}}"> 
    <button type="submit">Delete</button>
    @csrf
</form>
<br> 
@endforeach