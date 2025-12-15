<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(4);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Book::all(); 
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'genre' => 'required|max:50',
            'publication_year' => 'required|digits:4',
            'isbn' => 'required|max:50',
            'cover_image_url' => 'nullable|url|max:255',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Sách đã được thêm thành công!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $authors = Book::all(); 
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:50',
            'genre' => 'required|max:50',
            'publication_year' => 'required|digits:4',
            'isbn' => 'required|max:50',
            'cover_image_url' => 'nullable|url|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Sách đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Sách đã được xóa thành công!');
    }
}
