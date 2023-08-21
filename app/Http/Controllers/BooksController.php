<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    //
    public function index(){
        return view('books');
    }

    public function editForm($id){
        $dataBooks = new Books();

        $dataBooks = Books::findOrFail($id);

        return view('edit', compact('dataBooks'));
    }

    public function seeBooks(){
        $dataBooks = new Books();

        $dataBooks = Books::all();

        return view('seeBooks', compact('dataBooks'));
    }


    public function store(){

        $data = request()->validate([
            'bookName' => 'required|max:25|unique:books,bookName',
            'bookAuthor' => 'required|max:25',
            'price' => 'required',
            'stock' => 'required'
        ]);

        if ($data['price'] < 0) {
            return redirect()->back()->withErrors(['price' => 'Price cannot be negative.']);
        }

        $DataSave = new Books();

        $DataSave->bookName = $data['bookName'];
        $DataSave->bookAuthor = $data['bookAuthor'];
        $DataSave->price = $data['price'];
        $DataSave->stock = $data['stock'];

        $DataSave->save();

        return redirect()->route('books.see')->with('success', 'Data saved successfully');
    }

    public function updateBooks($id){

        $data = request()->validate([
            'bookName' => 'required|max:25|unique:books,bookName',
            'bookAuthor' => 'required|max:25',
            'price' => 'required',
            'stock' => 'required'
        ]);

        if ($data['price'] < 0) {
            return redirect()->back()->withErrors(['price' => 'Price cannot be negative.']);
        }
        
        $updateBook = Books::findOrFail($id);

        $updateBook->update($data);

        return redirect()->route('books.see')->with('success', 'Data Updated Successfully');
    }

    public function destroy($id){

        $destroyBook = Books::findOrFail($id);

        $destroyBook->delete();

        return redirect()->route('books.see')->with('success', 'Student deleted successfully!');
    }
}


