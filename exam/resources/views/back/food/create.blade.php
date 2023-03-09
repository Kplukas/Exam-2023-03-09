@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-secondary border border-5 border-white">
                <div class="card-header">
                    <h2>Add Food</h2>
                </div>
                <div class="card-body">
                    <form action={{route('food-store')}} method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">Food title</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label col-4 border-bottom border-white border-3 fs-3">Food description</label>
                            <input class="form-control" type="text" name="description">
                        </div>
                        <input type="hidden" value={{$foodlist}} name="list_id">
                        <button class="btn btn-dark btn-outline-light col-4 mt-2" type="submit">Save new</button>
                        @csrf
                        <form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
