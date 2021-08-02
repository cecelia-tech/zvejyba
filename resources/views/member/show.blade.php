@extends('layouts.app')
@section('content') <div class="container">
<div class="row justify-content-center"> <div class="col-md-8">
<div class="card">
<div class="card-header">Info about member</div>
<div class="card-body">

<form method="POST" action="{{route('member.update',[$member])}}">

                            <div class="form-group">
                                <p class="form-text "><b> Member's name: </b>{{$member->name}}</p>
                            </div>
                            <div class="form-group">
                                <p class="form-text ">Member Surname: {{$member->surname}}</p>
                            </div>

                            <div class="form-group">
                                <p class="form-text ">Member's Place of Residence: {{$member->live}}</p>
                            </div>

                            <div class="form-group">
                                <p class="form-text ">Member's Experience: {{$member->experience}}</p>
                            </div>

                            <div class="form-group">
                                <p class="form-text ">Registrated as member: {{$member->registered}}</p>
                            </div>

                            {{-- <div class="form-group">
                                <p class="form-text ">Member photo: </p>
                                <img src="{{$member->photo}}">
                            </div> --}}

                            {{-- <div class="form-group">
                                <p class="form-text ">About member: {!!$member->about!!}</p>
                            </div> --}}

                            <div class="form-group">
                                <p class="form-text ">Reservoir: 
                                    {{$member->memberReservoirs->title}} 
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="form-text ">Reservoir Area: 
                                    {{$member->memberReservoirs->area}} 
                                </p>
                            </div>
                            <div class="form-group">
                                <p class="form-text ">About Reservoir: 
                                    {{$member->memberReservoirs->about}} 
                                </p>
                            </div>
@csrf
<div class="buttons">
<a href="{{route('member.edit', [$member])}}" class="light_blue_button">Edit</a>
<a href="{{route('member.pdf', [$member])}}" class="dark_blue_button">Download pdf</a>
</div>
</form>

</div> </div>
</div> </div>
</div> 
<script> 
$(document).ready(function() {
$('#summernote').summernote(); });
</script>
@endsection