@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>Orders</h2>
                </div>
                <div class="card-body">
                    <ul class="card-group">
                        @forelse($orders as $order)

                        <li class="col-5 list-group-item m-2 p-2 border border-white border-3 text-center">
                            @foreach($users as $user)
                            @if($order->user_id == $user->id)
                            <h2>User: {{$user->name}}</h2>
                            @endif
                            @endforeach
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
                            <form action="{{route('order-edit', $order)}}" method="post">
                                <div class="mb-3">
                                    <label class="form-label col-4 border-bottom border-white border-3 fs-3">Canteen</label>
                                    <select name="confirmed" class="form-select">
                                        <option name="confirmed" value="0">Awaiting</option>
                                        <option name="confirmed" value="1">Confirm</option>
                                        <option name="confirmed" value="2">Cancell</option>
                                    </select>
                                </div>
                                <button class="btn btn-dark btn-outline-light col-12 mt-2" type="submit">Update order</button>
                                @csrf
                                @method('put')
                            </form>

                        </li>
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
