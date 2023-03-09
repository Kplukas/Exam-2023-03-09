@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>{{$canteen->title}}</h2>
                </div>
                <div class="card-body">
                    <p class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                        Adress: {{$canteen->adress}} </br>
                        Code: {{$canteen->code}}
                    </p>
                    <h3 class="text-center">Available menus:</h3>
                    @foreach($foodlists as $foodlist)
                    @if($foodlist->canteen_id == $canteen->id)
                    <div class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                        {{$foodlist->title}}
                        <form action="{{route('foodlist-delete', $foodlist)}}" method="post">
                            <a class="btn btn-dark btn-outline-light col-sm-4 mt-2" href="{{route('foodlist-edit', $foodlist)}}">Edit foodlist</a>
                            <a class="btn btn-dark btn-outline-light col-sm-4 mt-2" href="{{route('foodlist-show', $foodlist)}}">Show foodlist</a>
                            <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Delete foodlist</button>
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
