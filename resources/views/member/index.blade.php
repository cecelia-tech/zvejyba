@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Members</div>
                    <div class="card-body"> 
                        <div class="list-group">
                            <div class="list-group-item filter">
                            {{-- filtravimas --}}
            <form action="{{route('member.index')}}" method="get" class="sort-form">
                <div class="left_align">
                <fieldset>
                <legend class="main_name">Filter by reservoir:</legend>
                {{-- <small class="form-text text-muted">Select reservoir from the list</small> --}}
                <div class="form-group">
        <select name="reservoir_id"  class="form-control">
    @foreach ($reservoirs as $reservoir)
        <option value="{{$reservoir->id}}" @if ($defaultReservoir == $reservoir->id) selected
        @endif>
            {{$reservoir->title}}
        </option> 
        @endforeach
            </select> 
            </div>
                </fieldset>
                </div>
                <div class="right_align">
                <div class="buttons">
                <button type="submit" class="light_blue_button">Filter</button>
                <a href="{{route('member.index')}}" class="dark_blue_button" >Clear</a>
                </div>
            </div>
              </form>
                        </div>
                        @foreach ($members as $member)
                            <div class="list-group-item">
                                <div class="item_content">
                                    <div class="left_aligh">
                                        <p class="main_name">
                                            {{$member->name}} 
                                            {{$member->surname}} 
                                        </p>
                        <div class="smaller_letters">
                            Reservoir of the choice:  
                            {{$member->memberReservoirs->title}}
                        </div>
                        <a href="{{route('member.show',[$member])}}" class=" pdf_link">
                            More info
                        </a>
                    </div>
                    <div class="right_aligh">
                        <div class="buttons">
                        <a href="{{route('member.edit',[$member])}}" class=" light_blue_button">
                            Edit
                        </a>
                    <form method="POST" action="{{route('member.destroy', [$member])}}"> 
                        <button type="submit" class=" dark_blue_button">Delete</button>
                        @csrf
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>



                            {{-- <a href="{{route('member.edit',[$member])}}">
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
                            <br> --}}
                        @endforeach
                    </div> 
                    </div>
                </div>
            </div> 
        </div>
    </div> 
@endsection

