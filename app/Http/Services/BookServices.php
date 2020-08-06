<?php


namespace App\Http\Services;


use App\Book;
use App\Http\Repositories\BookRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookServices
{
    protected $bookRepositories;

    function __construct(BookRepositories $bookRepositories)
    {
        $this->bookRepositories = $bookRepositories;
    }

    function getIndex(){
        return $this->bookRepositories->getAllBook();
    }

    function storeBook(Request $request){
        $book = new Book();
        $book->book_name = $request->input('book_name');
        $book->author = $request->input('author');
        $book->status = $request->input('status');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = $image->store('images','public');
            $book->image = $path;
        }
        $this->bookRepositories->saveDataBook($book);
        toastr()->success('Data has been saved successfully!');
    }

    function editBook($id){
        return $this->bookRepositories->findOrFail($id);

    }

    function updateBook(Request $request, $id){
        $book = $this->bookRepositories->findOrFail($id);
        $book->book_name = $request->input('book_name');
        $book->author = $request->input('author');
        $book->status = $request->input('status');

        if ($request->hasFile('image')){
            //xoa anh cu neu co
            $currentImg = $book->image;
            if ($currentImg){
                Storage::delete('/public'.$currentImg);
            }
            //cap nhat anh moi
            $image = $request->file('image');
            $path = $image->store('images','public');
            $book->image = $path;
        }
        $this->bookRepositories->saveDataBook($book);
        toastr()->success('Data has been saved successfully!');
    }

    function deleteBook($id){
        $book = $this->bookRepositories->findOrFail($id);
        $book->delete();
        toastr()->error('Data has been saved successfully!');
    }

    function searchBook(Request $request){
        return $this->bookRepositories->searchBook($request);
    }



}
