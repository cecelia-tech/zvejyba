@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Reservoir's info</div>
                    <div class="card-body"> 
                        <form method="POST" action="{{route('reservoir.update',$reservoir)}}">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="reservoir_title" value="{{old('reservoir_title',$reservoir->title)}}">
                                <small class="form-text text-muted">Reservoir title</small>
                            </div>

                            {{-- Title: <input type="text" name="reservoir_title" value="{{$reservoir->title}}"> --}}
                            <div class="form-group">
                                <label>Area</label>
                                <input type="text" class="form-control" name="reservoir_area" value="{{old('reservoir_area',$reservoir->area)}}">
                                <small class="form-text text-muted">Reservoir area</small>
                            </div>
                            {{-- Area: <input type="text" name="reservoir_area" value="{{$reservoir->area}}">  --}}
                            <div class="form-group">
                            <label>About</label>
                            <textarea class="form-control"  name="reservoir_about" id="summernote">
                                {{old('reservoir_about',$reservoir->about)}}
                            </textarea>
                            <small class="form-text text-muted">About the reservoir</small>
                            </div>
                            {{-- About: <textarea name="reservoir_about">{{$reservoir->about}}</textarea> --}}

                            @csrf
                            <div class="buttons">
                            <button type="submit" class="light_blue_button">Edit</button>
                            </div>
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

