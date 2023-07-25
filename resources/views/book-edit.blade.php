@extends('layouts.mainLayout')

@section('title', 'Edit Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <h1>Edit Book</h1>
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
        <form action="/book-edit/{{$book->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" name="book_code" id="book_code" class="form-control" placeholder="Book Code" 
                value="{{$book->book_code}}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Book title"
                value="{{$book->title}}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach($categories as $item)
                    
                    <option value="{{$item->id}}">{{$item->name}}</option>
                        
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="currentCategory">Current Category</label>
                <ul>
                    @foreach($book->categories as $category)
                    <li>{{$category->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div >
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="my-3">
                <label for="currentImage" style="dispa":block>Curent Image</label>
                <div class="my-3">
                
                @if($book->cover!='')
                    <img src="{{asset('storage/covers/'.$book->cover)}}" width="300px" alt="{{$book->title}}"> 
                @else
                <img src="{{asset('images/cover.png')}}" alt="">                   
                @endif
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"> </script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
       $(document).ready(function(){
           $('.select-multiple').select2();
       });</script>
@endsection
