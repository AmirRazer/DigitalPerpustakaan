@extends('layouts.mainLayout')

@section('title', 'Category-Add')

@section('content')
    <h1>Add New Category</h1>
    <div class="mt-5 w-25">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item )
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
            
        @endif
        <form action="category-add" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
