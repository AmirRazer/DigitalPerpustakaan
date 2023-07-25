@extends('layouts.mainLayout')

@section('title', 'Add Book')

@section('content')
    <h1>Add New Book</h1>
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
        <form action="book-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book Code" 
                value="{{old('book_code')}}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book title"
                value="{{old('title')}}">
            </div>
            <div >
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
