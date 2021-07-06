@extends('layouts.app')
@section('content')
    <div class="box box-primary">
        <div class="cox-header with-border">
            <h3 class="box-title">edit post</h3>
        </div>
        <form method="post" enctype="multipart/form-data" action="{{route('update', $product->id)}}">
            @method('PUT')
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">პროდუქტის დასახელება</label>
                    <input type="text" class="form-control" placeholder="name" name="name" value="{{old('name', $product->name)}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">პროდუქტის ღირებულება</label>
                    <input type="number" class="form-control" placeholder="price" name="price" value="{{old('text', $product->price)}}">
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
