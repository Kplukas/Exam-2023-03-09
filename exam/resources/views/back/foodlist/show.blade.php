@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>{{$foodlist->title}} ||
                        @foreach($canteens as $canteen)
                        @if($canteen->id == $foodlist->canteen_id)
                        {{$canteen->title}}
                        @endif
                        @endforeach
                    </h2>
                </div>
                <div class="card-body">
                    <ul class="card-group">
                        <h2>Food list:</h2>
                        <li class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <a class="btn btn-dark btn-outline-light col-sm-4 mt-2" href="{{route('food-create', $foodlist)}}">Add food</a>
                        </li>
                        @foreach($foods as $food)
                        @if($food->list_id == $foodlist->id)
                        <li class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <h3>{{$food->title}}</h3>
                            <p>{{$food->description}}</p>
                            <form action="{{route('food-delete', $food)}}" method="post">
                                <a class="btn btn-dark btn-outline-light col-sm-4 mt-2" href="{{route('food-edit', $foodlist)}}">Edit food</a>
                                <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Delete food</button>
                                @csrf
                                @method('delete')
                            </form>

                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
