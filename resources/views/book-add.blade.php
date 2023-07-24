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
                <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book Code">
            </div>
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book title">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection