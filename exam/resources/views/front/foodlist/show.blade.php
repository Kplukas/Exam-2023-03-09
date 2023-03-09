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
                        <h2 class="col-10 text-center">Food :</h2>
                        @foreach($foods as $food)
                        @if($food->list_id == $foodlist->id)
                        <li class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <h3>{{$food->title}}</h3>
                            <p>{{$food->description}}</p>
                            <form action="{{route('order-create')}}" method="post">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="food_id" value="{{$food->id}}">
                                <label for="many">Portions</label>
                                <input type="number" name="many">
                                <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Order</button>
                                @csrf
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
