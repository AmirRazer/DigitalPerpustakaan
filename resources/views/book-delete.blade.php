@extends('layouts.mainLayout')

@section('title', 'Delete Book ')

@section('content')
    <h2>Are You Sure To Delete Book {{$book->title}} ?</h2>
    <div class="mt-5">
        <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-5">Sure</a>
        <a href="/books" class="btn btn-info">Cencel</a>
    </div>
@endsection
