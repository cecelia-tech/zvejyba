@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Reservoir</div>
                    <div class="card-body"> 
                        <form method="POST" action="{{route('reservoir.store')}}">

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title')}}" placeholder="Reservoir's title">
                            </div>

                            <div class="form-group">
                                <label>Area</label>
                                <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area')}}" placeholder="Reservoir's area">
                            </div>

                            <div class="form-group">
                                <label>About</label>
                                <textarea class="form-control"  name="reservoir_about" id="summernote">
                                {{old('reservoir_about')}}
                            </textarea>
                            {{-- <small class="form-text text-muted">Apie arkli</small> --}}
                                {{-- <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area')}}" placeholder="Reservoir's area"> --}}
                            </div>

                            {{-- Title: <input type="text" name="reservoir_title">  --}}
                            {{-- Area: <input type="text" name="reservoir_area">  --}}
                            {{-- About: <textarea name="reservoir_about"></textarea> --}}
                            <div class="buttons">
                            <button type="submit" class="light_blue_button">Add</button>
                            </div>
                            @csrf
                        </form>
                    </div> 
                </div>
            </div> 
        </div>
    </div> 
        <script> $(document).ready(function() {
$('#summernote').summernote(); });
</script>
@endsection

