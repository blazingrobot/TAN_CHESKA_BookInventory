@extends('books.layout')

@section('content')

<h2 class="mb-3">Book Inventory</h2>

<div class="d-flex justify-content-between mb-3">
    <form method="GET" action="{{ route('books.index') }}" class="d-flex">
        <input 
            type="text" 
            name="search" 
            class="form-control me-2" 
            placeholder="Search by title or author..."
            value="{{ request('search') }}"
        >
        <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
    
    <div>
        <a href="{{ route('books.trashed') }}" class="btn btn-warning me-2">
            Trash
        </a>
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            Add Book
        </a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped">

<thead class="table-dark">
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>ISBN</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Status</th>
        <th width="200">Actions</th>
    </tr>
</thead>

<tbody>

@forelse($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->genre }}</td>
        <td>{{ $book->published_year }}</td>
        <td>
            @if($book->status == 'available')
                <span class="badge bg-success">Available</span>
            @elseif($book->status == 'checked_out')
                <span class="badge bg-warning text-dark">Checked Out</span>
            @else
                <span class="badge bg-danger">Archived</span>
            @endif
        </td>
        <td>
            <a href="{{ route('books.show', $book->id) }}" 
                class="btn btn-info btn-sm">
                View
            </a>

            <a href="{{ route('books.edit', $book->id) }}" 
                class="btn btn-warning btn-sm">
                Edit
            </a>

            <form 
                action="{{ route('books.destroy', $book->id) }}" 
                method="POST" 
                style="display:inline"
            >
                @csrf
                @method('DELETE')
                <button 
                    type="submit" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Delete this book?')"
                >
                    Delete
                </button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">
            No books found.
        </td>
    </tr>
@endforelse

</tbody>

</table>

<div class="mt-3">
    {{ $books->withQueryString()->links() }}
</div>

@endsection