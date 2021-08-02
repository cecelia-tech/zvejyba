@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Member</div>
                    <div class="card-body"> 
                        <form method="POST" action="{{route('member.store')}}">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" name="member_name" value="{{old('member_name')}}" placeholder="Member's name">
                            </div>
                            
                            <div class="form-group">
                                <label>Surname:</label>
                                <input type="text" class="form-control" name="member_surname" value="{{old('member_surname')}}" placeholder="Member's surname">
                            </div>

                            <div class="form-group">
                                <label>Lives in:</label>
                                <input type="text" class="form-control" name="member_live" value="{{old('member_live')}}" placeholder="Member's place of residence">
                            </div>

                            <div class="form-group">
                                <label>Experience:</label>
                                <input type="text" class="form-control" name="member_experience" value="{{old('member_experience')}}" placeholder="Members experience">
                            </div>

                            <div class="form-group">
                                <label>Registered:</label>
                                <input type="text" class="form-control" name="member_registered" value="{{old('member_registered')}}" placeholder="Registered member (in years)">
                            </div>

                            <label>Reservoir:</label>
                            <select name="reservoir_id">
                                @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}">
                                    {{$reservoir->title}}
                                </option> 
                                @endforeach
                            </select> 
                            {{-- <small class="form-text text-muted">
                                Choose the reservoir
                            </small> --}}
                            @csrf
                            <div class="buttons">
                            <button type="submit" class="light_blue_button">Add</button> 
                            </div>
                        </form>
                    </div> 
                </div>
            </div> 
        </div>
    </div> 
@endsection

