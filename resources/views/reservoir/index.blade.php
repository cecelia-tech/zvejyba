@extends('layouts.app')
@section('content') 
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reservoirs</div>
                    <div class="card-body"> 
                        <div class="list-group">
                        @foreach ($reservoirs as $reservoir)
                        <div class="list-group-item ">
                            <div class="item_content">
                                <div class="left_align ">
                        <p class="main_name ">
                            {{$reservoir->title}}
                        </p>
                        <div class="smaller_letters">
                            <b> Area:</b> {{$reservoir->area}}
                        </div>
                                </div>
                        <div class="right_align">
                        <div class="buttons">
                        <a href="{{route('reservoir.edit',$reservoir)}}" class="light_blue_button">Edit</a>
                        <form method="POST" action="{{route('reservoir.destroy', $reservoir)}}" class="textarea"> 
                        <button type="submit" class="dark_blue_button">Delete</button>
                        @csrf
                        </form>
                        </div>
                        </div>

                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div> 
                </div>
            </div> 
        </div>
    </div> 
@endsection

