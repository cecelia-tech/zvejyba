<form method="POST" action="{{route('member.update',[$member])}}">
    Name: <input type="text" name="member_name" value="{{$member->name}}"> 
    Surname: <input type="text" name="member_surname" value="{{$member->surname}}"> 
    Lives in: <input type="text" name="member_live" value="{{$member->live}}"> 
    Experience: <input type="text" name="member_experience" value="{{$member->experience}}">
    Registered member in years: <input type="text" name="member_registered" value="{{$member->registered}}"> 
    <select name="reservoir_id">
    @foreach ($reservoirs as $reservoir)
        <option value="{{$reservoir->id}}" 
            @if($reservoir->id == $member->reservoir_id) selected 
            @endif> 
            {{$reservoir->title}} 
        </option>
    @endforeach
    </select> 
    <button type="submit">Edit</button> 
    @csrf
</form>