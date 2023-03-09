@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>Canteens</h2>
                </div>
                <div class="card-body">
                    <ul class="card-group">
                        @forelse($canteens as $canteen)
                        <li class="col-5 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <h3>Name: {{$canteen->title}}</h3>
                            <p>Adress: {{$canteen->adress}}</p>
                            <p>code: {{$canteen->code}}</p>
                            <a class="btn btn-dark btn-outline-light col-sm-12 mt-2" href="{{route('canteen-show2', $canteen)}}">Show canteen</a>
                        </li>
                        @empty
                        <li class="col-10 list-group-item m-2 p-2 border border-white border-3 text-center">
                            <h3>No canteens open yet</h3>
                        </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
