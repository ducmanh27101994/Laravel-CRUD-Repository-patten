<?php


namespace App\Http\Repositories;


use App\Book;
use Illuminate\Http\Request;

class BookRepositories
{
    protected $books;

    function __construct(Book $books)
    {
        $this->books = $books;
    }

    function getAllBook()
    {
        return $this->books->select('*')
            ->orderBy('id', 'desc')
            ->get();
    }

    function saveDataBook($books){
        $books->save();
    }

    function findOrFail($id){
        return $this->books->findOrFail($id);
    }

    function searchBook(Request $request){
        return $this->books->where('book_name','like','%'.$request->keyword.'%')->get();

    }


}
