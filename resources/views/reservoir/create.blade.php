<form method="POST" action="{{route('reservoir.store')}}">
Title: <input type="text" name="reservoir_title"> 
Area: <input type="text" name="reservoir_area"> 
About: <textarea name="reservoir_about"></textarea>
<button type="submit">ADD</button>
@csrf
</form>