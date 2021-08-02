@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit member's info</div>
                    <div class="card-body"> 
                        <form method="POST" action="{{route('member.update',[$member])}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="member_name" value="{{old('member_name',$member->name)}}">
                                <small class="form-text text-muted">Member's name</small>
                            </div>

                            {{-- Name: <input type="text" name="member_name" value="{{$member->name}}">  --}}
                            <div class="form-group">
                                <label>Surame</label>
                                <input type="text" class="form-control" name="member_surname" value="{{old('member_surname',$member->surname)}}">
                                <small class="form-text text-muted">Member's surname</small>
                            </div>

                            {{-- Surname: <input type="text" name="member_surname" value="{{$member->surname}}">  --}}
                            <div class="form-group">
                                <label>Lives in</label>
                                <input type="text" class="form-control" name="member_live" value="{{old('member_live',$member->live)}}">
                                <small class="form-text text-muted">Member's place of residence</small>
                            </div>

                            {{-- Lives in: <input type="text" name="member_live" value="{{$member->live}}">  --}}
                            <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="member_experience" value="{{old('member_experience',$member->experience)}}">
                                <small class="form-text text-muted">Member's experience</small>
                            </div>
                            {{-- Experience: <input type="text" name="member_experience" value="{{$member->experience}}"> --}}

                            <div class="form-group">
                                <label>Registered member</label>
                                <input type="text" class="form-control" name="member_registered" value="{{old('member_registered',$member->registered)}}">
                                <small class="form-text text-muted">Registered member (in years)</small>
                            </div>

                            {{-- Registered member in years: <input type="text" name="member_registered" value="{{$member->registered}}">  --}}
                            <div class="form-group">
                            <select name="reservoir_id">
                            @foreach ($reservoirs as $reservoir)
                                <option value="{{$reservoir->id}}" 
                                    @if($reservoir->id == $member->reservoir_id) selected 
                                    @endif> 
                                    {{$reservoir->title}} 
                                </option>
                            @endforeach
                            </select> 
                            <small class="form-text text-muted">Reservoir of the choice</small>
                        </div>
                            <div class="buttons">
                            <button type="submit" class="light_blue_button">Edit</button> 
                            </div>
                            @csrf
                        </form>
                    </div> 
                </div>
            </div> 
        </div>
    </div> 
@endsection

