<form method="POST" action="{{route('member.store')}}">
    Name: <input type="text" name="member_name"> 
    Surname: <input type="text" name="member_surname"> 
    Lives in: <input type="text" name="member_live"> 
    Experience: <input type="text" name="member_experience"> 
    Registered member in years: <input type="text" name="member_registered"> 
    <select name="reservoir_id">
        @foreach ($reservoirs as $reservoir)
        <option value="{{$reservoir->id}}">
            {{$reservoir->title}}
        </option> 
        @endforeach
    </select> 
    @csrf
    <button type="submit">Add</button> 
</form>