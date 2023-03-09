@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>Edit {{$foodlist->title}}</h2>
                </div>
                <div class="card-body">
                    <form action={{route('foodlist-edit', $foodlist)}} method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">List title</label>
                            <input class="form-control" type="text" name="title" value="{{$foodlist->title}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">Canteen</label>
                            <select name="canteen_id" class="form-select">
                                @foreach($canteens as $canteen)
                                <option name="canteen_id" @if($foodlist->canteen_id == $canteen->id) selected @endif value="{{$canteen->id}}">{{$canteen->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Update list info</button>
                        @csrf
                        @method('put')
                        <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
