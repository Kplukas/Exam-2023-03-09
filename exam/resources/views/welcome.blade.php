@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-body" style="min-height: 70vh;">
                    <h2 class="text-center m-2 border-bottom border-white border-3">Welcome to Canteen for You!</h2>
                    <p class="text-center mt-5">Find and order food from the variety of canteens.</p>
                    <p class="text-center mt-2">New canteens, food lists and deals are being added often!</p>
                    @guest
                    <h3 class="mt-5 p-5 text-center border-top border-bottom border-white border-3">
                        <a class="btn btn-dark btn-outline-light col-3 fs-2" href="{{ route('login') }}">Log in</a>
                        or
                        <a class="btn btn-dark btn-outline-light col-3 fs-2" href="{{ route('register') }}">Sign up</a>
                        to get started!
                    </h3>
                    @else
                    <h3 class="mt-5 p-5 text-center border-top border-bottom border-white border-3">Browse Our: <br>
                        <a class="btn btn-dark btn-outline-light col-sm-12 m-2" href="{{route('canteen-index2')}}">Canteens</a>
                    </h3>
                    @endguest
                    <h4 class="text-center mt-5">We are missing something? Please let us know and we will add it in no time!</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
