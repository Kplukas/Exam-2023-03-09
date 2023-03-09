@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>My orders</h2>
                </div>
                <div class="card-body">
                    <ul class="card-group">
                        @forelse($orders as $order)
                        @if($order->user_id == Auth::user()->id)
                        <li class="col-5 list-group-item m-2 p-2 border border-white border-3 text-center">
                            @if($order->confirmed == '0')
                            <span class="badge bg-light text-black">Awaiting confirmation</span>
                            @elseif($order->confirmed == '1')
                            <span class="badge bg-success">Order confirmed</span>
                            @elseif($order->confirmed == '2')
                            <span class="badge bg-danger">Order cancelled</span>
                            @endif
                            @foreach($foods as $food)
                            @if($food->id == $order->food_id)
                            <h3>{{$food->title}}, {{$order->many}} portions</h3>
                            @foreach($foodlists as $foodlist)
                            @if($food->list_id == $foodlist->id)
                            <h5>From {{$foodlist->title}} list in
                                @foreach($canteens as $canteen)
                                @if($canteen->id == $foodlist->canteen_id)
                                {{$canteen->title}} </h5>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            </h3>
                            @endif
                            @endforeach
                        </li>
                        @endif
                        @empty
                        <li class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <h3>No orders yet</h3>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
