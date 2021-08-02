{{-- @foreach ($members as $member)
    <a href="{{route('member.edit',[$member])}}">
        {{$member->name}} {{$member->surname}}
    </a> 
    <form method="POST" action="{{route('member.destroy', [$member])}}">
        <button type="submit">Delete</button> 
        @csrf
</form>
<br>
@endforeach --}}

@foreach ($members as $member)
    <a href="{{route('member.edit',[$member])}}">
        {{$member->name}} {{$member->surname}}
    </a>
    <p>
        {{$member->memberReservoirs->title}} 
        {{$member->memberReservoirs->area}}
    </p>
    <form method="POST" action="{{route('member.destroy', [$member])}}"> 
        @csrf
        <button type="submit">Delete</button>
    </form> 
    <br>
@endforeach