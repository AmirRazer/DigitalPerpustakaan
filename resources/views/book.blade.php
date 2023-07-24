@extends('layouts.mainLayout')

@section('title', 'book')

@section('content')
        <h1>
            Books List   
        </h1>
        <div class="my-5 d-flex justify-content-end">
            <a href="book-add"class="btn btn-primary"> Add Data</a>
        </div>
        <div class="my-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->book_code}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->status}}</td>
                             <td>
                        <a href="#">Edit</a>
                        <a href="#">Delet</a>
                    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  
    @endsection