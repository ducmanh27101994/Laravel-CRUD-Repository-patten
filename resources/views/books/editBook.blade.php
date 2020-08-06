@extends('core.menu')
@section('tittle','Edit Book')

@section('table')
    <div class="container">

        <form method="post" enctype="multipart/form-data" action="{{route('books.update',$book->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Book Name</label>
                <input name="book_name" type="text" class="form-control" id="exampleInputEmail1"
                       aria-describedby="emailHelp" value="{{$book->book_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Author</label>
                <input name="author" type="text" class="form-control" id="exampleInputPassword1" value="{{$book->author}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <input name="status" type="text" class="form-control" id="exampleInputPassword1" value="{{$book->status}}">
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
