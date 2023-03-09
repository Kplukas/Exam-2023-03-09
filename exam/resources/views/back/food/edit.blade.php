@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>Edit {{$food->title}}</h2>
                </div>
                <div class="card-body">
                    <form action={{route('food-edit', $food)}} method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">Food title</label>
                            <input class="form-control" type="text" name="title" value="{{$food->title}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">Food description</label>
                            <input class="form-control" type="text" name="description" value="{{$food->description}}">
                        </div>
                        <input type="hidden" value={{$food->list_id}} name="list_id">
                        <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Update</button>
                        @csrf
                        @method('put')
                        <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
