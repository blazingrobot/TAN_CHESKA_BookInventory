<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     */
    public function index(Request $request)
    {
        $query = Book::query();
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%")
                  ->orWhere('isbn', 'LIKE', "%{$search}%")
                  ->orWhere('genre', 'LIKE', "%{$search}%");
            });
        }
        
        $books = $query->paginate(10);
        
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(BookRequest $request)  // Changed to BookRequest
    {
        Book::create($request->validated());
        
        return redirect()->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(BookRequest $request, Book $book)  // Changed to BookRequest
    {
        $book->update($request->validated());
        
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete(); // Soft delete

        return redirect()->route('books.index')
            ->with('success', 'Book moved to trash!');
    }

    /**
     * Display trashed books.
     */
    public function trashed()
    {
        $books = Book::onlyTrashed()->paginate(10);
        return view('books.trashed', compact('books'));
    }

    /**
     * Restore a soft-deleted book.
     */
    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();

        return redirect()->route('books.trashed')
            ->with('success', 'Book restored successfully!');
    }

    /**
     * Permanently delete a book.
     */
    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();

        return redirect()->route('books.trashed')
            ->with('success', 'Book permanently deleted!');
    }
}