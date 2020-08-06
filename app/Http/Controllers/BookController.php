<?php

namespace App\Http\Controllers;

use App\Http\Services\BookServices;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookServices;

    function __construct(BookServices $bookServices)
    {
        $this->bookServices = $bookServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $books = $this->bookServices->getIndex();
        return view('books.listBook',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.createBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->bookServices->storeBook($request);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = $this->bookServices->editBook($id);
       return view('books.editBook',compact('book',$book->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->bookServices->updateBook($request,$id);
        return redirect()->route('books.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->bookServices->deleteBook($id);
        return redirect()->route('books.index');
    }

    function searchBook(Request $request){
        $books = $this->bookServices->searchBook($request);

        return view('books.listBook',compact('books'));

    }
}
